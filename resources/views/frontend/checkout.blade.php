@extends('frontend.layouts.app')

@section('content')
<section class="breadcrumb-area breadcrumb-bg breadcrumb-style2" data-background="/frontend/img/bg/breadcrumb_bg01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Checkout</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop-area shop-bg pb-75" data-background="/frontend/img/bg/shop_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Cart Items</h3>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                    @if($cart->id != -1)
                                    <tr>
                                        <td>
                                            <h4>{{$cart->attributes->first()->product_name}}</h4>
                                            <img style="width:150px" src="/uploads/{{$cart->attributes->first()->product_image}}" alt="">
                                        </td>
                                        <td>{{$cart->quantity}}</td>
                                        <td>{{$cart->quantity * $cart->price}}</td>
                                        <td>
                                            <a href="{{route('addToCart', $cart->id)}}" class="btn btn-primary btn-sm">+</a>
                                            <a href="{{route('cart.reduce', $cart->id)}}" class="btn btn-warning btn-sm">-</a>
                                            <a href="{{route('cart.remove', $cart->id)}}" class="btn btn-danger btn-sm">x</a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="py-5 text-center">
        <h2>Checkout</h2>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Total</h6>
                    </div>
                    <span class="text-muted">{{\Cart::getTotal() - (\Cart::getContent()->where('id', -1)->first()?\Cart::getContent()->where('id', -1)->first()->price:0)}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Carrier</h6>
                    </div>
                    <span class="text-muted">{{\Cart::getContent()->where('id', -1)->first()?\Cart::getContent()->where('id', -1)->first()->price:0}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>{{\Cart::getTotal()}} TK</strong>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Delivered To :</span>
                    <input onkeyup="setData()" type="text" class="form-control" id="delivered_to">
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Mobile No :</span>
                    <input onkeyup="setData()" type="text" class="form-control" id="delivered_to_mobile_number">
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form method="POST" class="needs-validation" novalidate>
                
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
</section>
@endsection

@section('footer')
<script>
    function setData(){
        var obj = {};
        obj.cus_name = $('#customer_name').val();
        obj.cus_phone = $('#mobile').val();
        obj.cus_email = $('#email').val();
        obj.cus_addr1 = $('#address').val();
        obj.amount = $('#total_amount').val();
        obj.delivered_to = $('#delivered_to').val();
        obj.delivered_to_mobile_number = $('#delivered_to_mobile_number').val();

        $('#sslczPayBtn').prop('postdata', obj);
    }

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
@endsection