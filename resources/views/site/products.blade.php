@include('site.includes.header')
@include('site.includes.sidebar')
    
<section>		             
        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center"> products</h2>
                @foreach ($products as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                <img src="{{asset('images/products/'.$product->images[0]->name)}}" alt="{{$product->name}}" />
                                <h2>{{$product->selling_price}}</h2>
                                <p>{{$product->name}}</p>
                                    <a href="{{route('add.cart',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{$product->selling_price}}</h2>
                                        <p>{{$product->name}}</p>
                                        <div>
                                            <a href="{{route('add.cart',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div>
                                        <a href="{{route('product.details',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-product"></i>More details</a>
                                        </div>
                                    <a href="{{route('wishlist',$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-product"></i>Add to wishlist</a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach

                
            </div><!--features_items-->
            
            
        </div>

    </div>
</div>
</section>
@include('site.includes.footer')
