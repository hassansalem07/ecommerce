@include('site.includes.header')
@include('site.includes.sidebar')      
@include('dashboard.includes.alerts.success')
@include('dashboard.includes.alerts.errors')

		<section>		
        <div class="col-sm-9 padding-right">
		
      
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                        <img src="{{asset('images/products/'.$product->images[0]->name)}}" alt="{{$product->name}}" />
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                    <a href=""><img src="{{asset('images/products/'.$product->images[1]->name)}}" alt="{{$product->name}}"></a>
                                    </div>
                                   @foreach ($product->images as $image)
                                       
                                    <div class="item">
                                      <a href=""><img src="{{asset('images/products/'.$image->name)}}" alt="{{$product->name}}"></a>
                                    </div>
                                    @endforeach

                                </div>

                              <!-- Controls -->
                              <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                        <h2>{{$product->name}}</h2>
                           <p>code: {{$product->sku}}</p>
                            <span>
                            <span>LE {{$product->selling_price}}</span>
                                <label>Quantity:</label>
                            <input type="text" name="qty" value="0" />
                            <div>
                                <a href="{{route('add.cart',$product->id)}}"  class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
								</a>
							</div>
							<div>
                                <a href="{{route('wishlist',$product->id)}}" type="submit" class="btn btn-fefault cart">
                                    Add to wishlist
								</a>
                            </div>
                            </span>
                        <p><b>Availability:</b>{{ $product->in_stock  ?  ' In Stock' : ' Out of stock' }}</p>
                            <p><b>Condition:</b> New</p>
                        <p><b>Brand:</b>{{ $product->brand->name ?? ' E-commerce'}}</p>
                        </div><!--/product-information-->
                    </div>
                    </div>
                    <div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li  class="active"><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#description" data-toggle="tab">description</a></li>
								<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade  active in" id="details" >
								  <div class="product-variants in_border">
									@if(isset($product_attributes) && count($product_attributes) > 0 )
										@foreach($product_attributes as $attribute)
											<div class="product-variants-item">
												<span
													class="control-label">{{$attribute->name}} : </span>
												@if(isset($attribute->options) && count($attribute->options) > 0 )
													<select id="group_1" data-product-attribute="1"
															name="{{$attribute->name}}">
														@foreach($attribute->options as $option)
															<option value="1" title="S"
																	selected="selected">
																{{$option->name}}
															</option>
														@endforeach
													</select>
												@endif

											</div>
										@endforeach
									@endif
								</div>

							</div>
							
							<div class="tab-pane fade" id="description" >
								<div class="card">
									<div class="card-body">
									 {{$product->description ?? 'no description for this product'}}
									</div>
								  </div>
							</div>
							
						
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									
									<p><b>Write Your Review</b></p>
									
								<form action="{{route('review.store')}}" method="POST">
									@csrf
								<input type="hidden" name="productId" value="{{$product->id}}">

									<span>
										<input type="text" name="name" placeholder="Your Name"
										@if(auth()->user()) value="{{auth()->user()->name}}" @endif	/>
										

										@error('email')
										<span class="text-danger">{{$message}}</span>
										@enderror
										<input type="email" name="email" placeholder="Email Address"
										@if(auth()->user()) value="{{auth()->user()->email}}" @endif />
									
									</span>
								@error('email')
							    <span class="text-danger">{{$message}}</span>
								@enderror

								<div>
									<textarea name="body" ></textarea>
								</div>
								@error('body')
							    <span class="text-danger">{{$message}}</span>
								@enderror

								<div>
									<button type="submit" class="btn btn-default pull-right">
										send
									</button>
								</div>
								</form>
								</div>
							</div>
							
						</div>
                    </div><!--/category-tab-->
                    
                    <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach ($recommendedProducts as $product)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/products/'.$product->images[0]->name)}}" alt="{{$product->name}}" />
													<h2>{{$product->selling_price}}</h2>
												<p>{{$product->name}}</p>
													<a href="{{route('add.cart',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
													<div>
														<a href="{{route('product.details',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-product"></i>More details</a>
													</div>										
													<div>
														<a href="{{route('wishlist',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-product"></i>Add to wishlist</a>
													</div>										
											  </div>
											</div>
										</div>
									</div>
									@endforeach	
								</div>
							</div>
						
						</div>
					</div><!--/recommended_items-->
					
                    </div>
            

            



</section>
@include('site.includes.footer')
