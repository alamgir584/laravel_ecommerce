<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Auth;
use DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required',
            'review' => 'required',
        ]);

        $check=DB::table('reviews')->where('user_id',Auth::id())->where('product_id',$request->product_id)->first();

        if ($check) {
           $notification=array('messege' => 'Already you have a review with this product !', 'alert-type' => 'error');
           return redirect()->back()->with($notification);
        }

        
        Review::insert([
            'user_id'=>Auth::id(),
            'product_id'=>$request->product_id,
            'review'=>$request->review,
            'rating'=>$request->rating,
            'review_date'=>date('d-m-y'),
            'review_month'=>date('F'),
            'review_year'=>date('Y'),
        ]);


        return redirect()->back()->with();
    }
}
