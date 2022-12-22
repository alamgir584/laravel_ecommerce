<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
     // Query Builder with one to one join

    	//  $data=DB::table('subcategories')->leftJoin('categories','subcategories.category_id','categories.id')->select('subcategories.*','categories.category_name')->get();
        //  $category=DB::table('categories')->get();
        //  return view('admin.category.subcategory.index',compact('data','category'));

    	// Eloquent ORM

        $data=Subcategory::all();
        $category=Category::all();
        return view('admin.category.subcategory.index',compact('data','category'));

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);
        Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>Str::slug($request->subcategory_name, '-'),
        ]);
        $notification=array('messege' =>'Sub Category Inserted' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        Subcategory::destroy($id);
        $notification=array('messege' =>'Sub Category Deleted!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data=Subcategory::findorfail($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $subcategory=Subcategory::where('id',$request->id)->first();
        $subcategory->update([
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_slug'=>Str::slug($request->subcategory_name, '-'),
        ]);
        $notification=array('messege' =>'Sub Category Updated!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }

    // public function GetChildCategory()
    // {
    //     $data=DB::table('childcategories')->where('subcategory_id',$id)->get();
    //     return response()->json($data);
    // }
}
