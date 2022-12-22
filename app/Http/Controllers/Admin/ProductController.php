<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Brand;
use App\Models\pickup\Pickup;
use App\Models\setting\Warehouse;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $category=Category::all();
        $subcategory=Subcategory::all();
        //$subcategory=DB::table('subcategories')->where('category_id')->get();
        //$data=DB::table('categories')->get();
        $childcategory=Childcategory::all();
        $brand=Brand::all();
        $pickup_point=Pickup::all();
        $warehouse=Warehouse::all();
        return view('admin.product.create', compact('category','subcategory','childcategory','brand','pickup_point','warehouse'));
    }
    public function store(Request $request)
    {
        dd($request->all());
    }

}
