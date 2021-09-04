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
</section>
@endsection