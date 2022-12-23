<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use Illuminate\Support\Str;
use DB;

class ChildCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

    	// Eloquent ORM
        $data=Childcategory::all();
        $subcategory=Subcategory::all();
        $category=Category::all();
        return view('admin.category.childcategory.index',compact('data','subcategory','category'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'childcategory_name' => 'required|max:55',
        ]);
        Childcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'childcategory_name'=>$request->childcategory_name,
            'childcategory_slug'=>Str::slug($request->childcategory_name, '-'),
        ]);
        $notification=array('messege' =>'Child Category Inserted' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        Childcategory::destroy($id);
        $notification=array('messege' =>'Child Category Deleted!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data=Childcategory::findorfail($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $childcategory=Childcategory::where('id',$request->id)->first();
        
        $childcategory->update([
            'childcategory_name'=>$request->childcategory_name,
            'childcategory_slug'=>Str::slug($request->childcategory_name, '-'),
        ]);
        $notification=array('messege' =>'Child Category Updated!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
}
