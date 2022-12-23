<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Brand;
use Illuminate\Support\Str;
use Image;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //$data=DB::table('categories')->get();//query builder
        $data=Brand::all(); //elequent ORM
        return view('admin.category.brand.index',compact('data'));

    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
        ]);
        $slug=Str::slug($request->brand_name, '-');

    	  $photo=$request->brand_logo;
    	  $photoname=uniqid().'.'.$photo->getClientOriginalName();
    	  Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);
    	  $data['brand_logo']='public/files/brand/'.$photoname;
          
        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_logo'=>$photoname,
            'brand_slug'=>Str::slug($request->brand_name, '-'),
        ]);
        $notification=array('messege' =>'Brand Inserted' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }


    public function delete($id)
    {
    	$data=DB::table('brands')->where('id',$id)->first();
    	$image='public/files/brand/'.$data->brand_logo;

    	if (File::exists($image)) {
    		 unlink($image);
    	}
    	DB::table('brands')->where('id',$id)->delete();
    	$notification=array('messege' => 'Brand Deleted!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);
    }



    public function edit($id)
    {
        $data=Brand::findorfail($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {
        // print_r($request->input());
        // die;
    	$data=array();
    	$data['brand_name']=$request->brand_name;
    	$data['brand_slug']=Str::slug($request->brand_name, '-');
    	if ($request->brand_logo)
        {
    		  if (File::exists("public/files/brand/".$request->old_brand_logo))
              {
    		    unlink("public/files/brand/".$request->old_brand_logo);
    	      }
    		  $photo=$request->brand_logo;
              $photoname = uniqid()."-".$request->file('brand_logo')->getClientOriginalName();
    	      Image::make($photo)->resize(240,120)->save('public/files/brand/'.$photoname);
    	      $data['brand_logo']=$photoname;
    	      DB::table('brands')->where('id',$request->id)->update($data);
    	      $notification=array('messege' => 'Brand Update!', 'alert-type' => 'success');
    	      return redirect()->back()->with($notification);
    	}else{
		  $data['brand_logo']=$request->old_brand_logo;
	      DB::table('brands')->where('id',$request->id)->update($data);
	      $notification=array('messege' => 'Brand Update!', 'alert-type' => 'success');
	      return redirect()->back()->with($notification);
    	}
    }
}



