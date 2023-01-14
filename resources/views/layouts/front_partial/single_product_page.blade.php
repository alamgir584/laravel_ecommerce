@php
    use App\Models\Review;
@endphp

@php
    $review_5=Review::where('product_id',$product->id)->where('rating',5)->count();
    $review_4=Review::where('product_id',$product->id)->where('rating',4)->count();
    $review_3=Review::where('product_id',$product->id)->where('rating',3)->count();
    $review_2=Review::where('product_id',$product->id)->where('rating',2)->count();
    $review_1=Review::where('product_id',$product->id)->where('rating',1)->count();
    $sum_rating=Review::where('product_id',$product->id)->sum('rating');
    $count_rating=Review::where('product_id',$product->id)->count('rating');
@endphp

<style type="text/css">
	.checked {
  color: orange;
}
</style>

@php
//  $review_5=App\Models\Review::where('product_id',$product->id)->where('rating',5)->count();
//  $review_4=App\Models\Review::where('product_id',$product->id)->where('rating',4)->count();
//  $review_3=App\Models\Review::where('product_id',$product->id)->where('rating',3)->count();
//  $review_2=App\Models\Review::where('product_id',$product->id)->where('rating',2)->count();
//  $review_1=App\Models\Review::where('product_id',$product->id)->where('rating',1)->count();
//  $sum_rating=App\Models\Review::where('product_id',$product->id)->sum('rating');
//  $count_rating=App\Models\Review::where('product_id',$product->id)->count('rating');
 //Share plugin
			 // Share button 1
        //  $shareButtons1 = \Share::page(
        //       url()->current()
        //  )
        //  ->facebook()
        //  ->twitter()
        //  ->linkedin()
        //  ->telegram()
        //  ->whatsapp()
        //  ->reddit();
@endphp

    <!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				@php
					$images=json_decode($product->images,true);
                    $color=explode(',',$product->color);
			        $sizes=explode(',',$product->size);
				@endphp
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						@foreach ($images as $row)

						<li data-image="{{asset('public/files/product/'.$row)}}"><img src="{{asset('public/files/product/'.$row)}}" alt=""></li>
						@endforeach
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-3 order-lg-2 order-1">
					<div class="image_selected"><img src="{{asset('public/files/product/'.$product->thumbnail)}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-4 order-3">
					<div class="product_description">
						<div class="product_category">{{$product->Category->category_name}}->{{$product->Subcategory->subcategory_name}}->{{$product->Childcategory->childcategory_name}}</div>
						<div class="product_name" style="font-size: 20px">{{$product->name}}</div>
                        <div class="brand_name">Brand: {{$product->Brandcategory->brand_name}}</div>
						<div class="stock">Stock: {{$product->stock_quantity}}</div>
						<div class="unit">Unit: {{$product->unit}}</div>
						{{-- average review star --}}
                        <div>
                            @if ($sum_rating!=NULL)
                            @if (intval($sum_rating/$count_rating)==5)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            @elseif (intval($sum_rating/$count_rating)>=4 && intval($sum_rating/$count_rating)<5)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            @elseif (intval($sum_rating/$count_rating)>=3 && intval($sum_rating/$count_rating)<4)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            @elseif (intval($sum_rating/$count_rating)>=2 && intval($sum_rating/$count_rating)<3)
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            @else
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            @endif
                            @endif
                        </div>

                        <div>
							@if ($product->discount_price==NULL)
							<div class="" style="margin-top: 10px">Price:{{$setting->currency}}{{$product->selling_price}}</div>
                            @else
							<div class="" >Price:<del class="text-danger">{{$setting->currency}}{{$product->discount_price}} </del class="text-danger">{{$setting->currency}}{{$product->selling_price}}</div>
							@endif
                        </div>


                        <div class="form-group">
                            <div class="row">
                                @isset($product->size)
                                <div class="col-lg-6">
                                    <label>Pick Size: </label>
                                    <select class="custom-select form-control-sm" name="size" >
                                        @foreach($sizes as $size)
                                           <option value="{{ $size }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endisset

                                @isset($product->color)
                                <div class="col-lg-6">
                                    <label>Pick Color: </label>
                                    <select class="custom-select form-control-sm" name="color" >
                                        @foreach($color as $row)
                                           <option value="{{ $row }}">{{ $row }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endisset
                            </div>
                        </div>
                        <br>
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[1-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>
                                <div>
                            </div>
						</div>

								{{-- <div class="button_container">
									<button type="button" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div> --}}

                                <div class="button_container">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          {{-- @if($product->stock_quantity<1)
                                          <button class="btn btn-outline-danger" disabled="">Stock Out</button>
                                          @else --}}
                                        <button class="btn btn-outline-info" type="submit"> <span class="loading d-none">....</span> Add to cart</button>
                                        {{-- @endif --}}

                                        <a href="{{ route('add.wishlist',$product->id)}}" class="btn btn-outline-primary" type="button">Add to wishlist</a>
                                      </div>
                                    </div>
                                </div>

							</form>
						</div>
				    </div>

				<div class="col-lg-3 order-3" style="border-left: 1px solid grey; padding-left: 10px;">
					{{-- {!! $shareButtons1 !!} --}}
				<strong class="text-muted">Pickup Point of this product</strong><br>
				<i class="fa fa-map"> abcd </i><hr><br>
				<strong class="text-muted"> Home Delivery :</strong><br>
				 -> (4-8) days after the order placed.<br>
				 -> Cash on Delivery Available.
				 <hr><br>
				 <strong class="text-muted"> Product Return & Warrenty :</strong><br>
				 -> 7 days return guarranty.<br>
				 -> Warrenty not available.
				 <hr><br>
				@isset($product->video)
				 <strong>Product Video : </strong>
				 <iframe width="240" height="190" src="https://www.youtube.com/embed/{{ $product->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				@endisset
                </div>
               </div>
              </div>
             </div>
            </div>
           </div>
          </div>
        <br><br>

<div class="row">
   <div class="col-lg-12">
      <div class="card">
         <div class="card-header">
            <h4>Product details of {{ $product->name }}</h4>
         </div>

            <div class="card-body">
              {!! $product->description !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
              <h4>Rating & Reviews of {{ $product->name }}</h4>
            </div>
<div class="card-body">
    <div class="row">
        <div class="col-lg-3">
            Average Review of  {{ $product->name }}:<br>
            <div>
                @if ($sum_rating!=NULL)
                @if (intval($sum_rating/$count_rating)==5)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                @elseif (intval($sum_rating/$count_rating)>=4 && intval($sum_rating/$count_rating)<5)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                @elseif (intval($sum_rating/$count_rating)>=3 && intval($sum_rating/$count_rating)<4)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                @elseif (intval($sum_rating/$count_rating)>=2 && intval($sum_rating/$count_rating)<3)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                @else
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                @endif
                @endif
            </div>
        </div>
<div class="col-md-3">
{{-- all review show --}}
    Total Review Of This Product:<br>

                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span>Total {{$review_5}}</span>
                            </div>
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span>Total {{$review_4}}</span>
                            </div>
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span>Total {{$review_3}}</span>
                            </div>
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span>Total {{$review_2}}</span>
                            </div>
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span>Total {{$review_1}}</span>
                            </div>

</div>

                            <div class="col-lg-6">
                            <form action="{{route('store.review')}}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="details">Write Your Review</label>
                            <textarea type="text" class="form-control" name="review" required=""></textarea>
                            </div>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-group ">
                      <label for="review">Write Your Review</label>
                        <select class="custom-select form-control-sm" name="rating" style="min-width: 120px;">
                            <option disabled="" selected="">Select Your Review</option>
                            <option value="1">1 star</option>
                            <option value="2">2 star</option>
                            <option value="3">3 star</option>
                            <option value="5">4 star</option>
                            <option value="5">5 star</option>
                        </select>
                    </div>
                            @if (Auth::check())
                              <button type="submit" class="btn btn-sm btn-info"><span class="fa fa-star "></span> submit review</button>
                            @else
                            <p>Please at first login to your account for submit a review.</p>
                            @endif
                            </form>

                        </div>
                    </div>
                    <br>

{{-- all review of this product --}}
	<strong>All review of {{ $product->name }}</strong> <hr>
        <div class="row">
             @foreach($review as $row)
                <div class="card col-lg-5 m-2">
                    <div class="card-header">
                     {{ $row->user->name }}  ( {{ date('d F , Y'), strtotime($row->review_date) }} )
                    </div>
                        <div class="card-body">
                            {{ $row->review }}
                            @if($row->rating==5)
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            @elseif($row->rating==4)
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                </div>
                            @elseif($row->rating==3)
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                </div>
                                @elseif($row->rating==2)
                            <div>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                                @elseif($row->rating==1)
                            <div>
                                <span class="fa fa-star checked"></span>
                            </div>
                                @endif
                                </div>
                            </div>
                          @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Related Product</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">

						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">

                            @foreach ($related_product as $row)

							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{asset('public/files/product/'.$row->thumbnail)}}" alt="{{$row->name}}"></div>
									<div class="viewed_content text-center">
                                        @if ($row->discount_price==NULL)
                                        <div class="viewd_price"><span>{{$setting->currency}}{{$row->selling_price}}</span></div>
                                        @else
                                        <div class="viewd_price" ><span class="text-danger"><del>{{$setting->currency}}{{$row->discount_price}}</del></span class="text-danger"> {{$setting->currency}}{{$row->selling_price}}</div>
                                        @endif

										<div class="viewed_name"><a href="{{route('product.details',$row->slug)}}">{{substr($row->name,0,50)}}</a></div>
									</div>
									<ul class="item_marks">

										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>

                            @endforeach
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">

						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
                            @foreach ($brand as $row)

							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset('public/files/brand/' . $row->brand_logo) }}"
                                width="120" height="30" alt="{{$row->brand_name}}"></div></div>

                            @endforeach
						</div>

						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
