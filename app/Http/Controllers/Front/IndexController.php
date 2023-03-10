<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Review;
use App\Models\pickup\Pickup;

use DB;

class IndexController extends Controller
{
    public function index()
    {

        $category=Category::all();
        $bannerproduct=Product::where('product_slider',1)->latest()->first();
        $product=Product::all();
        $popular_product=Product::where('status',1)->orderBy('product_views','DESC')->limit(8)->get();
        $trendy_product=Product::where('status',1)->where('trendy',1)->orderBy('trendy','DESC')->limit(8)->get();
        return view('frontend.index', compact('category','bannerproduct','product','popular_product','trendy_product'));
    }
    public function ProductDetails($slug)
    {
         $category=Category::all();
         $brand=Brand::all();
         $product=Product::where('slug',$slug)->first();
                  Product::where('slug',$slug)->increment('product_views');
         $related_product=DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();
         $review=Review::where('product_id',$product->id)->orderBy('id','DESC')->take(6)->get();


        return view('frontend.product_details', compact('category','brand','product','related_product','review'));
    }
}
