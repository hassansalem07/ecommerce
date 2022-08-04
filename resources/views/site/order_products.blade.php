@include('site.includes.header')  

<section id="cart_items">

    <div class="container">
     
        <div class="step-one">
            <h6 class="heading">order products</h6>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="cart_product">
                        <img src="{{asset('images/products/'.$product->images[0]->name)}}" alt="">
                        </td>
                        <td class="cart_description">
                        <h4><a href="">{{$product->name}}</a></h4>
                        <p>{{$product->sku}}</p>
                        </td>
                        <td class="cart_price">
                        <p>{{$product->selling_price}}</p>
                        </td>
                        <td class="cart_quantity">
                            {{$product->pivot->qty}}
                        </td>
                        <td class="cart_total">
                        <p class="cart_total_price">{{$product->selling_price * $product->pivot->qty }}</p>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      
</section> <!--/#cart_items-->
@include('site.includes.footer')   

