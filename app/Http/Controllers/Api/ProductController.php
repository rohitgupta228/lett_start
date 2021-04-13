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
                $product = Product::find($request->product_id);
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
            'name' => $request->product_name,
            'packageName' => $request->package_name,
            'rating' => 4,
            'oneLinerDesc' => $request->one_line_desc,
            'detailLink' => $request->detail_link,
            'internalLink' => $request->internal_link,
            'externalLink' => $request->external_link,
            'gumroadLink' => $request->gumroad_link,
            'price' => $request->product_price,
            'mainCat' => $request->main_category,
            'catLink' => $request->category_link,
            'demolink' => $request->demo_link,
            'docLink' => $request->doc_link,
            'screenshot' => $request->screenshot_name,
            'category' => json_encode($request->categories),
            'added' => json_encode($request->added),
            'screenshotDir' => $request->screenshot_dir,
            'liveDemoBaseStr' => $request->live_demo_base_str,
            'overviewHTML' => $request->overview_html,
            'highlight1' => json_encode($request->highlight1),
            'highlight2' => json_encode($request->highlight2),
            'techUsed' => json_encode($request->tech_used),
            'themeFacts' => json_encode($request->theme_facts),
            'screenshots' => json_encode($request->screenshots),
            'initialLog' => json_encode($request->initial_log),
            'changeLog' => json_encode($request->change_log),
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
            if ($this->checkAdmin()) {
                $product = Product::find($request->product_id)->delete();
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

    public function productsList()
    {
        try {
            if ($this->checkAdmin()) {
                $products = Product::select('id', 'name', 'packageName')->paginate(10);
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
