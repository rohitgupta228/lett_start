<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Transaction;
use Illuminate\Support\Facades\Crypt;
use Flash;

// echo Crypt::decryptString('eyJpdiI6InFweEVcL3ZoSmd5elVIRFIrZ1JMazVRPT0iLCJ2YWx1ZSI6IkZlYUNUV2hWXC9ZZmFKQVdxWHFNXC9pdz09IiwibWFjIjoiMjZiOTdmNmNmMzhiZWFlMTBlOWRlNTg3NTAzZjFhZjAyMDQzODAyM2Y3MmEzMDljYjExNmY3NjUzNDljYjFkZCJ9');die;
// echo Crypt::encryptString(25);die;
class ProductController extends Controller
{

    public function homeProductsList()
    {
        try {
            $query = [
                'added' => 'popular',
                'bootstrap' => 'bootstrap',
                'angular' => 'angular',
                'freebies' => 'freebies'
            ];
            $bestSelling = Product::leftJoin('downloads', 'products.id', '=', 'downloads.product_id')->where('added', 'LIKE', "%{$query['added']}%")->where('price', '!=', 0)->select('products.id', 'products.name', 'products.price', 'products.detailLink', 'products.screenshot', 'products.demolink', 'products.oneLinerDesc', 'products.catLink', 'products.mainCat', 'products.rating', 'downloads.num_downloads')->orderBy('id', 'desc')->get()->toArray();
            if (count($bestSelling))
                $bestSelling = array_slice($bestSelling, 0, 3);

            $bootstrap = Product::leftJoin('downloads', 'products.id', '=', 'downloads.product_id')->where('added', 'LIKE', "%{$query['bootstrap']}%")->where('price', '!=', 0)->select('products.id', 'products.name', 'products.price', 'products.detailLink', 'products.screenshot', 'products.demolink', 'products.oneLinerDesc', 'products.catLink', 'products.mainCat', 'products.rating', 'downloads.num_downloads')->orderBy('id', 'desc')->get()->toArray();
            if (count($bootstrap))
                $bootstrap = array_slice($bootstrap, 0, 3);

            $angular = Product::leftJoin('downloads', 'products.id', '=', 'downloads.product_id')->where('added', 'LIKE', "%{$query['angular']}%")->where('price', '!=', 0)->select('products.id', 'products.name', 'products.price', 'products.detailLink', 'products.screenshot', 'products.demolink', 'products.oneLinerDesc', 'products.catLink', 'products.mainCat', 'products.rating', 'downloads.num_downloads')->orderBy('id', 'desc')->get()->toArray();
            if (count($angular))
                $angular = array_slice($angular, 0, 3);

            $freebies = Product::leftJoin('downloads', 'products.id', '=', 'downloads.product_id')->where('added', 'LIKE', "%{$query['freebies']}%")->where('price', '=', 0)->select('products.id', 'products.name', 'products.price', 'products.detailLink', 'products.screenshot', 'products.demolink', 'products.oneLinerDesc', 'products.catLink', 'products.mainCat', 'products.rating', 'downloads.num_downloads')->orderBy('id', 'desc')->get()->toArray();
            if (count($freebies))
                $freebies = array_slice($freebies, 0, 3);
        } catch (\Exception $exc) {
            return response()->view('errors.500');
        }

        return view('home', compact('bestSelling', 'bootstrap', 'angular', 'freebies'));
    }

    public function getMetaData()
    {
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
            switch ($category) {
                case 'admin-dashboard-template':
                    $search = 'admin';
                    $pageTitle = "Admin Dashboard Templates";
                    $pageDescription = 'Admin dashboard template for Bootstrap and Angular that are ready to use, customize and publish. Make all around planned dashboard interfaces with our Admin Templates and Themes.';
                    break;
                case 'bootstrap-templates':
                    $search = 'bootstrap';
                    $pageTitle = "Bootstrap Templates & Themes";
                    $pageDescription = 'Bootstrap templates and themes that are ready to customize and publish - a perfect starting point for your next web application.';
                    break;
                case 'landing-pages-templates':
                    $search = 'landing';
                    $pageTitle = "Angular & Bootstrap Landing Page Templates";
                    $pageDescription = "Angular & Bootstrap landing page templates and themes that are ready to customize and publish. It's a complete website with other supportive pages that increase your business.";
                    break;
                case 'app':
                    $search = 'app';
                    $pageTitle = "App Landing Page Template";
                    $pageDescription = "App landing pages are a bunch of web pages designed to promote mobile applications and drive downloads. For example, you can reach your search app through a marketing campaign or search traffic. Through this, you can get the information and download it. Landing pages have become a vital tool to generate sales easily and quickly. App landing pages can be built in HTML using cascading style sheets by changing the style of elements. The mobile app landing page template is specially made for promoting your mobile app.";
                    break;
                case 'business-corporate-templates':
                    $search = 'business';
                    $pageTitle = "Bootstrap Business Templates and Corporate Themes";
                    $pageDescription = "Bootstrap Business website templates and corporate templates that are ready to customize and publish - perfect for creating business websites for clients, or any other type of project.";
                    break;
                case 'portfolio-resume-templates':
                    $search = 'portfolio';
                    $pageTitle = "Bootstrap Portfolio Templates and Resume Themes";
                    $pageDescription = "Bootstrap portfolio templates & resume themes that are ready to customize and publish. It is perfect to show case your work, create resume and make your impression.";
                    break;
                case 'angular-templates':
                    $search = 'angular';
                    $pageTitle = "Angular Admin Templates";
                    $pageDescription = "Bootstrap angular templates & themes that are ready to use, customize and publish. Make all around planned dashboard interfaces with our Admin Templates and Themes.";
                    break;
                case 'freebies':
                    $search = 'freebies';
                    $pageTitle = " Free Bootstrap Templates";
                    $pageDescription = "Free Bootstrap templates that are ready to customize and publish - a perfect starting point for your next web application";
                    break;
                default:
                    $search = '';
                    $pageTitle = "All Themes, Templates & Landing Pages";
                    $pageDescription = "20+ Free and Premium Templates. Choose, combine and match the combination of components you want from the several 100 styles we provide!";
            }
            $keywords = '';
            if ($search === '') {
                $title = "All Themes, Templates & Landing Pages | Admin Dashboard | Angular Templates";
                $description = "Affordable 20+ Premium & Free Bootstrap Themes, Templates, Landing pages, Admin Dashboard, Potfolio Templates and Angular Dashboad & Landing Page Templates";
            } else {
                $title = $metaData[$search]['title'];
                $description = $metaData[$search]['description'];
                if (array_key_exists('keywords', $metaData[$search]))
                    $keywords = $metaData[$search]['keywords'];
            }
            $result = $result->leftJoin('downloads', 'products.id', '=', 'downloads.product_id')->where('category', 'LIKE', "%{$search}%");
            $products = $result->select('products.id', 'products.name', 'products.price', 'products.rating', 'products.detailLink', 'products.screenshot', 'products.demolink', 'products.oneLinerDesc', 'products.catLink', 'products.mainCat', 'downloads.num_downloads')->orderBy('id', 'desc')->paginate(12);
            return view('product_category', compact('products', 'category', 'pageTitle', 'pageDescription', 'title', 'description', 'keywords'));
        } catch (\Exception $exc) {
            return response()->view('errors.500');
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
    public function details($detailLink = null)
    {
        try {
            $metaData = $this->getMetaData();
            $product = Product::where('detailLink', $detailLink)->first();
            $response = [
                'code' => 404,
                'message' => 'Product not found'
            ];
            if ($product) {
                $canonicalLink = $this->getCanonicalLink($product->mainCat);
                $paymentStatus = config('settings.payment_status');
                $title = $metaData[$product->detailLink]['title'];
                $description = $metaData[$product->detailLink]['description'];
                $keywords = '';
                if (array_key_exists('keywords', $metaData[$product->detailLink]))
                    $keywords = $metaData[$product->detailLink]['keywords'];
                $reviews = ProductRating::where('product_id', $product->id)->select('username', 'rating', 'comments')->orderBy('id', 'desc')->get();
                // $downloads = Transaction::where('product_id', $product->productId)->where('payment_status', $paymentStatus[0])->count();
//                $downloads = $metaData[$product->detailLink]['downloads'];
                $downloads = \App\Models\Download::where('product_id', $product->id)->first();
                $downloads = $downloads ? $downloads->num_downloads : 0;
                $categoryArray = explode(' ', $product->mainCat);
                $category = strtolower($categoryArray[0]);
                $relatedProducts = Product::leftJoin('downloads', 'products.id', '=', 'downloads.product_id')->where('category', 'LIKE', "%{$category}%")->where('products.id', '!=', $product->id)->where('price', '!=', 0)->select('products.id', 'products.name', 'products.price', 'products.detailLink', 'products.screenshot', 'products.demolink', 'products.oneLinerDesc', 'products.catLink', 'products.mainCat', 'products.rating', 'downloads.num_downloads')->get()->toArray();

                if (count($relatedProducts))
                    $relatedProducts = array_slice($relatedProducts, 0, 3);

                return view('product_detail', compact('product', 'relatedProducts', 'title', 'description', 'downloads', 'reviews', 'keywords', 'canonicalLink'));
            }
        } catch (\Exception $exc) {
            return response()->view('errors.500');
        }
        return response()->view('errors.500');
    }

    public function getCanonicalLink($mainCategory)
    {
        switch ($mainCategory) {
            case 'Admin':
                return url('theme/marvel-admin-dashboard');
            case 'Landing Pages':
                return url('theme/letstart-wb');
            case 'Bootstrap':
                return url('theme/kiosk-app-templates');
            case 'Business & Corporates':
                return url('theme/hoskon-hosting-template');
            case 'Portfolio & Resumes':
                return url('theme/hugo-cv');
            case 'Angular':
                return url('theme/marvel-angular-admin-dashboard');
        }
        return null;
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
            $products = $result->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat', 'rating')->paginate(10);
            $productCount = count($products);
            if ($productCount == 0) {
                $products = Product::where('added', 'LIKE', "%popular%")->where('price', '!=', 0)->select('id', 'name', 'price', 'detailLink', 'screenshot', 'demolink', 'oneLinerDesc', 'catLink', 'mainCat')->get()->toArray();
                if (count($bestSelling))
                    $products = array_slice($bestSelling, 0, 4);
            }
        } catch (\Exception $exc) {
            
        }

        return view('search_products', compact('products', 'query', 'productCount'));
    }

    public function orderHistory(Request $request)
    {
        $user = Auth::user();
        $paymentStatus = config('settings.payment_status');
        $products = [];
        $transactions = Transaction::where('user_id', $user->id)->where('payment_status', $paymentStatus[0])->get();
        foreach ($transactions as $key => $transaction) {
            $products[$key] = $transaction->product;
            $rating[$transaction->product->id] = ProductRating::where('user_id', Auth::user()->id)->where('product_id', $transaction->product->id)->first();
        }
        return view('order_history', compact('products', 'rating'));
    }

    public function rating(Request $request)
    {
        $userId = Auth::user()->id;
        $data = $request->except(['_token']);
        $data['username'] = Auth::user()->username;
        if ($data['rating'] > 5 || !$data['product_id']) {
            Flash::error("Something went wrong");
            return redirect()->back();
        }
        $data['user_id'] = $userId;
        $rating = ProductRating::where('user_id', $userId)->where('product_id', $data['product_id'])->first();
        $rating = $rating ? $rating->update(['rating' => $data['rating']]) : ProductRating::create($data);
        $productRating = ProductRating::where('product_id', $data['product_id'])->avg('rating');
        $productRating = round($productRating, 1);
        $product = Product::find($data['product_id']);
        $product->update(['rating' => $productRating]);
        Flash::success("Feedback saved successfully");
        return redirect()->back();
    }

}
