<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pickup\Pickup;
use DB;

class PickupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
            //elequent ORM
            $pickup=Pickup::all();
            return view('admin.pickup.index',compact('pickup'));
    }
    public function create()
    {
       return view('admin.pickup.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pickup_point_name' => 'required',
            'pickup_point_address' => 'required',
            'pickup_point_phone'=>'required',
            'pickup_point_phone_two'=>'required',

        ]);
        Pickup::insert([
            'pickup_point_name'=>$request->pickup_point_name,
            'pickup_point_address'=>$request->pickup_point_address,
            'pickup_point_phone'=>$request->pickup_point_phone,
            'pickup_point_phone_two'=>$request->pickup_point_phone_two,

        ]);
        $notification=array('messege' =>'Pickup Point Inserted' ,'alert-type'=>'success' );
        return redirect()->route('pickup-point.index')->with($notification);
    }
    public function delete($id)
    {
        Pickup::destroy($id);
        $notification=array('messege' =>'Pickup Point Deleted!' ,'alert-type'=>'success' );
        return redirect()->route('pickup-point.index')->with($notification);
    }
    public function edit($id)
    {
        $data=Pickup::find($id);
        return view('admin.pickup.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $pickup=Pickup::find($id);

        $pickup->update([
            'pickup_point_name'=>$request->pickup_point_name,
            'pickup_point_address'=>$request->pickup_point_address,
            'pickup_point_phone'=>$request->pickup_point_phone,
            'pickup_point_phone_two'=>$request->pickup_point_phone_two,

        ]);
        $notification=array('messege' =>'Pickup Point Updated!' ,'alert-type'=>'success' );
        return redirect()->route('pickup-point.index')->with($notification);
    }
}
