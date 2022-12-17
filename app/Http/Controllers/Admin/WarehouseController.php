<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\setting\Warehouse;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //elequent ORM
        $warehouse=Warehouse::all();
        return view('admin.setting.warehouse.index',compact('warehouse'));
    }
    public function create()
    {
       return view('admin.setting.warehouse.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'warehouse_name' => 'required|max:55',
            'warehouse_address' => 'required|max:255',
            'warehouse_phone' => 'required|max:55',
        ]);
        Warehouse::insert([
            'warehouse_name'=>$request->warehouse_name,
            'warehouse_address'=>$request->warehouse_address,
            'warehouse_phone'=>$request->warehouse_phone,

        ]);
        $notification=array('messege' =>'Warehouse Inserted' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function delete($id)
    {
        Warehouse::destroy($id);
        $notification=array('messege' =>'Warehouse Deleted!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $data=Warehouse::find($id);
        return view('admin.setting.warehouse.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $warehouse=Warehouse::find($id);
        $warehouse->update([
            'warehouse_name'=>$request->warehouse_name,
            'warehouse_address'=>$request->warehouse_address,
            'warehouse_phone'=>$request->warehouse_phone,

        ]);
        $notification=array('messege' =>'Warehouse Updated!' ,'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
}
