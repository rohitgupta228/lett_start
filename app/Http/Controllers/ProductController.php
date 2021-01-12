<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth:api', ['except' => ['details', 'lists', 'homeProductsList', 'search']]);
    }

    public function checkAdmin()
    {
        $user = $this->guard()->user();
        if ($user->email !== env('ADMIN_EMAIL')) {
            $response = [
                'code' => 401,
                'error' => 'Unauthorized',
            ];
            return response()->json($response);
        }

        return true;
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
            if ($this->checkAdmin()) {
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
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'error' => $exc->getMessage(),
            ];
        }
        return response()->json($response);
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
        try {
            if ($this->checkAdmin()) {
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
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'error' => $exc->getMessage(),
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
    public function update(Request $request)
    {
        try {
            if ($this->checkAdmin()) {
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
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'error' => $exc->getMessage(),
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
        try {
            if ($this->checkAdmin()) {
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
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'error' => $exc->getMessage(),
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
        try {
            $product = Product::where('detailLink', $detailLink)->first();
            $response = [
                'code' => 404,
                'message' => 'Product not found'
            ];
            if ($product) {
                $categoryArray = explode(' ', $product->mainCat);
                $category = strtolower($categoryArray[0]);
                $realtedProducts = Product::where('category', 'LIKE', "%{$category}%")->where('id', '!=', $product->id)->where('price', '!=', 0)->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->get()->toArray();
                if (count($realtedProducts))
                    $realtedProducts = array_slice($realtedProducts, 0, 3);
                $response = [
                    'code' => 200,
                    'data' => [
                        'product' => $product,
                        'realtedProducts' => $realtedProducts
                    ],
                    'message' => 'Product details fetch successfully'
                ];
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'error' => $exc->getMessage(),
            ];
        }
        return response()->json($response, 200);
    }

    public function lists(Request $request)
    {
        try {
            $query = $request->all();
            $category = strtolower($query['category']);
            $result = Product::query();
            if ($category !== 'freebies') {
                $result = $result->where('price', '!=', 0);
            }
            $result = $result->where('category', 'LIKE', "%{$category}%");
            $products = $result->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->paginate(10);
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

    public function search(Request $request)
    {
        try {
            $query = $request->all();
            $result = Product::query();
            if (isset($query['category']) && $query['category'] != '') {
                $categoryArray = explode(' ', $query['category']);
                $category = strtolower($categoryArray[0]);
                $result = $result->where('category', 'LIKE', "%{$category}%")->orWhere('name', 'LIKE', '%' . $category . '%');
                if (count($categoryArray) >= 2) {
                    $category = strtolower($categoryArray[1]);
                    $result = $result->orWhere('category', 'LIKE', "%{$category}%")->orWhere('name', 'LIKE', '%' . $category . '%');
                }
            }
            $products = $result->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->paginate(10);
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
//        echo "coming"; die;
        try {
            $query = [
                'added' => 'popular',
                'angular' => 'angular',
                'recently' => 'recently'
            ];
            $bestSelling = Product::where('added', 'LIKE', "%{$query['added']}%")->where('price', '!=', 0)->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->get()->toArray();
            if (count($bestSelling))
                $bestSelling = array_slice($bestSelling, 0, 4);
            $angular = Product::where('added', 'LIKE', "%{$query['angular']}%")->where('price', '!=', 0)->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->get()->toArray();
            if (count($angular))
                $angular = array_slice($angular, 0, 4);

            $latest = Product::where('added', 'LIKE', "%{$query['recently']}%")->where('price', '!=', 0)->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->get()->toArray();
            if (count($latest))
                $latest = array_slice($latest, 0, 4);
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

        return view('home', compact('bestSelling', 'angular', 'latest'));
    }

}
