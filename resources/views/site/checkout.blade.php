@include('site.includes.header')  

<section id="cart_items">

    <div class="container">
        <div class="review-payment">
            <h2>Review your order</h2>
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
                    
                    @if(session()->get('cart'))
                    @foreach (session()->get('cart') as $product)
                    <tr>
                        <td class="cart_product">
                        <img src="{{asset('images/products/'.$product->images[0]->name)}}" alt="">
                        </td>
                        <td class="cart_description">
                        <h4><a href="">{{$product->name}}</a></h4>
                        <p> {{$product->sku ? "code: $product->sku " : ""}}</p>
                        </td>
                        <td class="cart_price">
                        <p>{{$product->selling_price}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$product->qty}}</p>
                            </td>
                        <td class="cart_total">
                        <p class="cart_total_price">{{$product->selling_price * $product->qty }}</p>
                        </td>
                      
                    </tr>
                    @endforeach
                    @endif
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>order price</td>
                                    <td>{{$order_price}}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>{{$shipping_cost->price == 0 ? 'Free' : $shipping_cost->price }}</td>										
                                </tr>
                                <tr>
                                    <td>Total</td>
                                <td><span>{{$total}}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="step-one">
            <h6 class="heading">please enter your information to make order</h6>
        </div>
        <div class="shopper-informations">
            <div class="row">
                    <div class="bill-to">
                        <div class="form-one">
                        <form method="POST" action="{{route('order.store')}}">
                                    @csrf
                                <input type="hidden" value="{{$total}}" name="total">
                                @error('total')
                                 <span class="text-danger">{{$message}}</span>
                                @enderror

                                <input type="text" name="name" placeholder="Name *"
                                @if(auth()->user()) value="{{auth()->user()->name}}" readonly="readonly" @endif>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                               @enderror

                                <input type="text" name="email" placeholder="Email*"
                                @if(auth()->user()) value="{{auth()->user()->email}}" readonly="readonly" @endif>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                               @enderror

                                <input type="text" name="address" placeholder="Address *">
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                               @enderror

                                <input type="text" name="city" value="{{$shipping_cost->city}}" id="txt" readonly="readonly">
                                @error('city')
                                 <span class="text-danger">{{$message}}</span>
                                @enderror

                                <input type="text" name="phone" placeholder="Phone *">
                                @error('phone')
                                <span class="text-danger">{{$message}}</span>
                               @enderror

                                    <div class="order-message">
                                        <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="8"></textarea>
                                    </div>	
                                    <div>
                                        <button type="submit" class="btn btn-primary">make order</button>
                                     </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
</section> <!--/#cart_items-->
@include('site.includes.footer')   

