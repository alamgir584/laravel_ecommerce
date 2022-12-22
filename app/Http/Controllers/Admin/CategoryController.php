<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$data=DB::table('categories')->get();//query builder
        $data=Category::all(); //elequent ORM
        return view('admin.category.category.index',compact('data'));

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);
        Category::insert([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::slug($request->category_name, '-'),
        ]);
        $notification=array('messege' =>'Category Inserted' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {

        Category::destroy($id);
        $notification=array('messege' =>'Category Deleted!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data=Category::findorfail($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $category=Category::where('id',$request->id)->first();
        $category->update([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::slug($request->category_name, '-'),
        ]);
        $notification=array('messege' =>'Category Updated!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }

        //get sub category mane product add korle category select korle oi categoryr sub category asbe
        public function GetSubCategory($id)  //category_id
        {
            $data=DB::table('subcategories')->where('category_id',$id)->get();
            return response()->json($data);
        }
        public function GetChildCategory($id)
        {
            $data=DB::table('childcategories')->where('subcategory_id',$id)->get();
            return response()->json($data);
        }
}
