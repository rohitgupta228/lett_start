<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
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
        $this->middleware('auth:api');
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
        $product = Product::orderBy('id', 'desc')->first();
        try {
            if ($this->checkAdmin()) {
                $data = $this->mapData($request);
                $data['productId'] = Crypt::encryptString($product->id + 1);
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
                $product = Product::find($request->id);
                $response = [
                    'code' => 404,
                    'message' => 'Product not found'
                ];
                if ($product) {
                    $updatedData = $this->mapData($request);
                    $updatedProduct = $product->update($updatedData);
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

    public function edit($productId)
    {
        try {
            if ($this->checkAdmin()) {
                $product = Product::find($productId);
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
                        'message' => 'Product fetched successfully'
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

    public function mapData($request)
    {
        $data = [
            'name' => $request->name,
            'packageName' => $request->packageName,
            'rating' => $request->rating,
            'oneLinerDesc' => $request->oneLinerDesc,
            'detailLink' => $request->detailLink,
            'internalLink' => $request->internalLink ?? null,
            'externalLink' => $request->externalLink ?? null,
            'gumroadLink' => $request->gumroadLink ??  null,
            'price' => $request->price,
            'mainCat' => $request->mainCat,
            'catLink' => $request->catLink,
            'demolink' => $request->demolink ?? null,
            'docLink' => $request->docLink ?? null,
            'screenshot' => $request->screenshot,
            'category' => json_encode($request->category),
            'added' => json_encode($request->added),
            'screenshotDir' => $request->screenshotDir,
            'liveDemoBaseStr' => $request->liveDemoBaseStr,
            'overviewHTML' => $request->overviewHTML,
            'highlight1' => json_encode($request->highlight1),
            'highlight2' => json_encode($request->highlight2),
            'techUsed' => json_encode($request->techUsed),
            'themeFacts' => json_encode($request->themeFacts),
            'screenshots' => json_encode($request->screenshots),
            'initialLog' => json_encode($request->initialLog),
            'changeLog' => json_encode($request->changeLog),
        ];
        return $data;
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
            $productIds = $request->product_id;
            if ($this->checkAdmin()) {
                if (count($productIds)) {
                    foreach ($productIds as $id) {
                        $product = Product::find($id);
                        if ($product)
                            $product->delete();
                    }
                }
                $response = [
                    'code' => 200,
                    'message' => 'Product deleted successfully'
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

    public function productsList()
    {
        try {
            if ($this->checkAdmin()) {
                $products = Product::select('id', 'name', 'packageName')->orderBy('id', 'desc')->paginate(10);
                $response = [
                    'code' => 200,
                    'data' => [
                        'product' => $products,
                    ],
                    'message' => 'Product fetched successfully'
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

}
