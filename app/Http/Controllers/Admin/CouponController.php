<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon\Coupon;
use DB;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            //elequent ORM
            $coupon=Coupon::all();
            return view('admin.offer.coupon.index',compact('coupon'));
    }
    public function create()
    {
       return view('admin.offer.coupon.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'valid_date'=>'required',
            'status'=>'required',
            'type' => 'required',

        ]);
        Coupon::insert([
            'coupon_code'=>$request->coupon_code,
            'coupon_amount'=>$request->coupon_amount,
            'valid_date'=>$request->valid_date,
            'status'=>$request->status,
            'type'=>$request->type,

        ]);
        $notification=array('messege' =>'Coupon Inserted' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        Coupon::destroy($id);
        $notification=array('messege' =>'Coupon Deleted!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data=Coupon::find($id);
        return view('admin.offer.coupon.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $coupon=Coupon::find($id);

        $coupon->update([
            'coupon_code'=>$request->coupon_code,
            'coupon_amount'=>$request->coupon_amount,
            'valid_date'=>$request->valid_date,
            'status'=>$request->status,
            'type'=>$request->type,

        ]);
        $notification=array('messege' =>'Coupon Updated!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }

 }


