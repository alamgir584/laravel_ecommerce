<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        $pickup_point=DB::table('pickups')->get();
        return view('admin.product.create', compact('category','brand','pickup_point'));
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
