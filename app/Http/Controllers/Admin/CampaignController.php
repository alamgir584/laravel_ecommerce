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
}
