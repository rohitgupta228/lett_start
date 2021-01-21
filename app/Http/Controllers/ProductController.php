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
    public function homeProductsList()
    {
        // print_r(Auth::user());
        // print_r(empty(Auth::user()));
        // die;
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
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage()
            ];
        }

        return view('home', compact('bestSelling', 'angular', 'latest'));
    }

    public function getMetaData() {
        $path = storage_path() . "/meta.json";
        return json_decode(file_get_contents($path), true);
    }

    public function lists($category = null)
    {
        $metaData = $this->getMetaData();
        try {
            $category = strtolower($category);
            $result = Product::query();
            $search = null;
            if ($category !== 'freebies') {
                $result = $result->where('price', '!=', 0);
            }
            switch($category) {
                case 'admin-dashboard-template': 
                    $search = 'admin';
                    $pageTitle = "Admin Dashboard Templates";
                    $pageDescription = 'Bootstrap and Angular admin templates that are ready to use, customize and publish - a perfect starting point for your next web application';
                    break;
                case 'bootstrap-templates':
                    $search = 'bootstrap';
                    $pageTitle = "Bootstrap Themes & Templates";
                    $pageDescription = 'Bootstrap themes that are ready to customize and publish - a perfect starting point for your next web application';
                    break;
                case 'landing-pages-templates':
                    $search = 'landing';
                    $pageTitle = "Bootstrap Landing Page Templates";
                    $pageDescription = "Bootstrap landing page themes that are ready to customize and publish. It's complete website with other supportive pages that increase your business.";
                    break;
                case 'business-corporate-templates':
                    $search = 'business';
                    $pageTitle = "Business & Corporate Templates";
                    $pageDescription = "Bootstrap business and corporate website themes that are ready to customize and publish - perfect for creating business websites for clients, or any other type of project.";
                    break;
                case 'portfolio-resume-templates':
                    $search = 'portfolio';
                    $pageTitle = "Portfolio CV/Resume Website Templates";
                    $pageDescription = "Bootstrap portfolio & resume themes that are ready to customize and publish. It is perfect to show case your work, create resume and make your impression.";
                    break;
                case 'angular-templates':
                    $search = 'angular';
                    $pageTitle = "Angular Admin Templates";
                    $pageDescription = "Bootstrap angular templates & themes that are ready to use, customize and publish. Make all around planned dashboard interfaces with our Admin Templates and Themes.";
                    break;
                default:
                    $search = '';
                    $pageTitle = "All Themes, Templates & Landing Pages";
                    $pageDescription = "20+ Free and Premium Templates. Choose, combine and match the combination of components you want from the several 100 styles we provide!";
            }
            if($search === ''){
                $title = "All Themes, Templates & Landing Pages | Admin Dashboard | Angular Templates";
                $description = "Affordable 20+ Premium & Free Bootstrap Themes, Templates, Landing pages, Admin Dashboard, Potfolio Templates and Angular Dashboad & Landing Page Templates";
            }
            else {
                $title = $metaData[$search]['title'];
                $description = $metaData[$search]['description'];
            }
            $result = $result->where('category', 'LIKE', "%{$search}%");
            $products = $result->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->paginate(10);
            return view('product_category', compact('products', 'pageTitle', 'pageDescription', 'title', 'description'));
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage()
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
            $metaData = $this->getMetaData();
            $product = Product::where('detailLink', $detailLink)->first();
            $response = [
                'code' => 404,
                'message' => 'Product not found'
            ];
            if ($product) {
                $title = $metaData[$product->detailLink]['title'];
                $description = $metaData[$product->detailLink]['description'];
                $categoryArray = explode(' ', $product->mainCat);
                $category = strtolower($categoryArray[0]);
                $relatedProducts = Product::where('category', 'LIKE', "%{$category}%")->where('id', '!=', $product->id)->where('price', '!=', 0)->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->get()->toArray();
                if (count($relatedProducts))
                    $relatedProducts = array_slice($relatedProducts, 0, 3);
                
                return view('product_detail', compact('product', 'relatedProducts', 'title', 'description'));
                
        // $response = [
        //     'code' => 200,
        //     'data' => [
        //         'product' => $product,
        //         'relatedProducts' => $relatedProducts
        //     ],
        //     'message' => 'Product details fetch successfully'
        // ];
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'error' => $exc->getMessage(),
            ];
        }
        return response()->json($response, 200);
    }

    public function search(Request $request)
    {
        try {
            $query = $request->all()['s'];
            $result = Product::query();
            if (isset($query) && $query != '') {
                $categoryArray = explode(' ', $query);
                $category = strtolower($categoryArray[0]);
                $result = $result->where('category', 'LIKE', "%{$category}%")->orWhere('name', 'LIKE', '%' . $category . '%');
                if (count($categoryArray) >= 2) {
                    $category = strtolower($categoryArray[1]);
                    $result = $result->orWhere('category', 'LIKE', "%{$category}%")->orWhere('name', 'LIKE', '%' . $category . '%');
                }
            }
            $products = $result->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->paginate(10);
            $productCount = count($products);
            if ($productCount == 0) {
                $products = Product::where('added', 'LIKE', "%popular%")->where('price', '!=', 0)->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->get()->toArray();
                if (count($bestSelling))
                    $products = array_slice($bestSelling, 0, 4);
            }
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage()
            ];
        }

        return view('search_products', compact('products', 'query', 'productCount'));
    }

}
