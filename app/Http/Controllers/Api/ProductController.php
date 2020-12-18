<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['details', 'lists', 'homeProductsList']]);
        $user = $this->guard()->user();
        if ($user->email !== env('ADMIN_EMAIL')) {
            $response = [
                'code' => 401,
                'error' => 'Unauthorized',
            ];
            return response()->json($response, 401);
        }
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    public function bulkUpload()
    {
        try {
            $json = file_get_contents(storage_path('themes-list.json'));
            $fileContent = json_decode($json, true);
            $data = [];
            if (count($fileContent)) {
                Product::truncate();
                foreach ($fileContent as $key => $content) {
                    $content['productId'] = Crypt::encryptString($key + 1);
                    foreach ($content as $key => $data) {
                        if (gettype($data) == 'array') {
                            $content[$key] = json_encode($data);
                        }
                    }
                    $product = Product::create($content);
                }
            }
            $response = [
                'code' => 200,
                'message' => 'Products added successfully'
            ];
            return response()->json($response, 200);
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    /**
     * Create Product
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $data = $request->request->all();
        $data['product_id'] = str_random(50);
        $data['demo_link'] = env('DEMO_LINK');
        $product = Product::create($data);
        $response = [
            'code' => 200,
            'data' => [
                'product' => $product,
            ],
            'message' => 'Product added successfully'
        ];
        return response()->json($response, 200);
    }

    /**
     * Update Product
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $product = Product::where('product_id', $request->product_id)->first();
        $response = [
            'code' => 404,
            'message' => 'Product not found'
        ];
        if ($product) {
            $updatedProduct = $product->update($request->request->all());
            $response = [
                'code' => 200,
                'data' => [
                    'product' => $product,
                ],
                'message' => 'Product updated successfully'
            ];
        }

        return response()->json($response, 200);
    }

    /**
     * Update Product
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details($detailLink)
    {
        $product = Product::where('detailLink', $detailLink)->first();
        $response = [
            'code' => 404,
            'message' => 'Product not found'
        ];
        if ($product) {
            $response = [
                'code' => 200,
                'data' => [
                    'product' => $product,
                ],
                'message' => 'Product details fetch successfully'
            ];
        }

        return response()->json($response, 200);
    }

    /**
     * Delete Product
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $product = Product::where('product_id', $request->product_id)->first()->delete();
        $response = [
            'code' => 404,
            'message' => 'Product not found'
        ];
        if ($product) {
            $response = [
                'code' => 200,
                'message' => 'Product deleted successfully'
            ];
        }

        return response()->json($response, 200);
    }

    public function lists(Request $request)
    {
        try {
            $query = $request->all();
            $result = Product::query();
            if (count($query)) {
                if (isset($query['category']) && $query['category'] != '') {
                    $result = $result->where('name', 'LIKE', '%' . $query['category'] . '%');
                }
                if (isset($query['category']) && $query['category'] != '') {
                    $categoryArary = explode(' ', $query['category']);
                    $result = $result->where('category', 'LIKE', "%{$categoryArary[0]}%");
                    if (count($categoryArary) >= 2) {
                        $result = $result->orwhere('name', 'LIKE', '%' . $categoryArary[1] . '%');
                    }
                }
            }
            $products = $result->paginate(10);
            $response = [
                'code' => 200,
                'data' => [
                    'products' => $products,
                ],
                'message' => 'Products fetched successfully'
            ];
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage()
            ];
        }

        return response()->json($response, 200);
    }

    public function homeProductsList()
    {
        try {
            $query = [
                'added' => 'popular',
                'angular' => 'angular',
                'recently' => 'recently'
            ];
            $bestSelling = Product::where('added', 'LIKE', "%{$query['added']}%")->paginate(4);
            $angular = Product::where('added', 'LIKE', "%{$query['angular']}%")->paginate(4);
            $latest = Product::where('added', 'LIKE', "%{$query['recently']}%")->paginate(4);
            $response = [
                'code' => 200,
                'data' => [
                    'bestSelling' => $bestSelling,
                    'angular' => $angular,
                    'latest' => $latest
                ],
                'message' => 'Products fetched successfully'
            ];
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage()
            ];
        }

        return response()->json($response, 200);
    }

}
