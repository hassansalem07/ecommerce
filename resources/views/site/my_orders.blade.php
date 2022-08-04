@include('site.includes.header')  

<section id="cart_items">

    <div class="container">
     
        <div class="step-one">
            <h6 class="heading">my orders</h6>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">created at</td>
                        <td class="description">status</td>
                        <td class="price">total Price</td>
                        <td class="price">order products</td>
                        <td class="price">cancel order</td>


                    </tr>
                </thead>
                <tbody>    
                @foreach ($orders as $order)                
                    <tr>
                        <td class="cart_product">
                            {{$order->created_at}}
                        </td>
                        <td class="cart_description">
                        <h4>                             
                            {{$order->status}}
                        </h4>
                        </td>
                        <td class="cart_price">
                        <p>{{$order->total_price}}</p>
                        </td>  
                        <td class="cart_price">
                        <a href="{{route('order.products',$order->id)}}" class="btn btn-primary">products</a>
                        </td>
                        @if ($order->status == 'pending')
                         <td class="cart_price">
                         <a href="{{route('order.destroy',$order->id)}}" class="btn btn-danger">cancel order</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>

      
</section> <!--/#cart_items-->
@include('site.includes.footer')   

