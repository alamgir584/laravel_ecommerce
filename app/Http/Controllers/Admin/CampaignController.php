<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Campaign;
use Image;
use File;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data=Campaign::all();
       return view('admin.offer.campaign.index',compact('data'));
    }
    public function store(Request $request)
    {

        // $validated = $request->validate([
        //     'title' => 'required|unique:campaigns|max:55',
        // ]);
        //$slug=Str::slug($request->brand_name, '-');

    	  $photo=$request->image;
    	  $photoname=uniqid().'.'.$photo->getClientOriginalName();
    	  Image::make($photo)->resize(468,60)->save('public/files/campaign/'.$photoname);
    	  $data['image']='public/files/campaign/'.$photoname;

        Campaign::insert([
            'title'=>$request->title,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'image'=>$photoname,
            'status'=>$request->status,
            'discount'=>$request->discount,
            'month'=>date('F'),
            'year'=>date('Y'),

            //'brand_slug'=>Str::slug($request->brand_name, '-'),
        ]);
        $notification=array('messege' =>'Campaign Inserted' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }

    public function delete($id)
    {
    	$data=DB::table('campaigns')->where('id',$id)->first();
    	$image='public/files/campaign/'.$data->image;

    	if (File::exists($image)) {
    		 unlink($image);
    	}
    	DB::table('campaigns')->where('id',$id)->delete();
    	$notification=array('messege' => 'Campaigns Deleted!', 'alert-type' => 'success');
    	return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data=Campaign::findorfail($id);
        return response()->json($data);
    }
    public function update(Request $request)
    {

    	$data=array();
    	$data['title']=$request->title;
    	$data['start_date']=$request->start_date;
    	$data['end_date']=$request->end_date;
    	$data['status']=$request->status;
    	$data['discount']=$request->discount;
    	if ($request->image)
        {
    		  if (File::exists("public/files/campaign/".$request->old_image))
              {
    		     unlink("public/files/campaign/".$request->old_image);

    	      }
    		  $photo=$request->image;
              $photoname = uniqid()."-".$request->file('image')->getClientOriginalName();
    	      Image::make($photo)->resize(468,60)->save('public/files/campaign/'.$photoname);
    	      $data['image']=$photoname;
    	      DB::table('campaigns')->where('id',$request->id)->update($data);
    	      $notification=array('messege' => 'Campaign Update!', 'alert-type' => 'success');
    	      return redirect()->back()->with($notification);
    	}else{
		  $data['image']=$request->old_iamge;
	      DB::table('campaigns')->where('id',$request->id)->update($data);
	      $notification=array('messege' => 'Campaign Update!', 'alert-type' => 'success');
	      return redirect()->back()->with($notification);
    	}
    }
}
