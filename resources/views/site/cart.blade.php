@include('site.includes.header')  
 
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @if(session()->get('cart'))
                    @foreach (session()->get('cart') as $product)
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
                            <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="{{route('cart.quantity',[$product->id , 1])}}"> + </a>
                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$product->qty}}" autocomplete="off" size="2">
                               @if($product->qty > 1)
                              <a class="cart_quantity_down" href="{{route('cart.quantity',[$product->id , -1])}}"> - </a>
                              @endif
                        </div>
                        </td>
                        <td class="cart_total">
                        <p class="cart_total_price">{{$product->selling_price * $product->qty }}</p>
                        </td>
                        <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{route('remove.cart',$product->id)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or would like to checkout</p>
        </div>
        <div class="row">
            <form method="POST" action="{{route('cart.checkout')}}">
                @csrf
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <div>
                            <li>Cart total price <span>{{$total}}</span></li>
                        </div>
                    <input type="hidden" name="price" value="{{$total}}">
                    <li>
                        <div class="m-8">
                        <select name="city">
                            <option value="" selected disabled>select your city</option>
                            @foreach ($shippings as $shipping)
                            <option  value="{{$shipping->city}}">{{$shipping->city}}</option>
                            @endforeach
                        </select>
                    </div>
            
                    </li>
                    <li>
                    if you have discount coupone, please enter the code below
                    </li>
                        <li>
                        <input type="text" value="{{old('code')}}" name="code" placeholder="coupon code" >
                        </li>
                   
                    </ul>
                    @error('city')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    @error('code')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        <button type="submit" class="btn btn-default check_out">Check Out</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</section><!--/#do_action-->

@include('site.includes.footer')   

