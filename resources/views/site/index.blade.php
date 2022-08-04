@include('site.includes.header')
@include('site.includes.slider')  
@include('site.includes.sidebar')

<section>                 
        <div class="col-sm-9 padding-right">
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">new products</h2>
                @isset($products)
                @foreach ($products as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                 @if(count($product->images))
                                <img src="{{asset('images/products/'.$product->images[0]->name)}}" alt="{{$product->name}}" />
                                @endif
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
                @endisset

                      
            </div><!--features_items-->
            
           
            
        </div>
    </div>
</section>
@include('site.includes.footer')
