@include('site.includes.header')  

<div class="wishlist-main-content section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#" class="cart-table">
                    <div class=" table-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Image</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="plantmore-product-price">Unit Price</th>
                                    <th class="plantmore-product-stock-status">Stock Status</th>
                                    <th class="plantmore-product-add-cart">Add to cart</th>
                                    <th class="plantmore-product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="w-25">
                                        <img src="{{asset('images/products/'.$product->images[0]->name)}}" class="img-fluid img-thumbnail" alt="Sheep">
                                    </td>
                                    <td class="plantmore-product-name">{{$product->name}}</td>
                                    <td class="plantmore-product-price"><span class="amount">{{$product->selling_price}}</span></td>
                                    <td class="plantmore-product-stock-status">{{$product->stockStatus()}}</span></td>
                                    <td class="plantmore-product-add-cart"><a class="btn btn-success" href="{{route('add.cart',$product->id)}}">add to cart</a></td>
                                    <td class="plantmore-product-remove"><a class="btn btn-danger" href="{{route('wishlist.remove',$product->id)}}">remove</a></td>
                                </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>

@include('site.includes.footer')   
