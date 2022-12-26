<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use DB;

class IndexController extends Controller
{
    public function index()
    {
        $category=Category::all();
        // $subcategory=Subcategory::all();
        return view('frontend.index', compact('category'));
    }
}
