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
        return view('frontend.index', compact('category','bannerproduct'));
    }
    public function ProductDetails($slug)
    {
         $category=Category::all();
         $brand=Brand::all();
         $product=Product::where('slug',$slug)->first();
         $related_product=DB::table('products')->where('subcategory_id',$product->subcategory_id)->orderBy('id','DESC')->take(10)->get();
         $review=Review::where('product_id',$product->id)->orderBy('id','DESC')->take(6)->get();


        return view('frontend.product_details', compact('category','brand','product','related_product','review'));
    }
}
