@extends('frontend.layouts.app')

@section('content')
<section class="breadcrumb-area breadcrumb-bg breadcrumb-style2" data-background="/frontend/img/bg/breadcrumb_bg01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header">Contact Us</h3>
                    <!-- Default form subscription -->
                    <form class="text-center border border-light p-5" action="{{route('deliveryInit')}}" method="post">
                        @csrf

                        <!-- Name -->
                        <input required type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Order ID" name="order_id">

                        <!-- Email -->
                        <input required type="text" id="defaultSubscriptionFormPassword1" class="form-control mb-4" placeholder="Carrier Mobile" name="phone_no">
                        
                        <input type="text" id="defaultSubscriptionFormPassword2" class="form-control mb-4" placeholder="OTP" name="otp">

                        <!-- Sign in button -->
                        <button class="btn btn-info btn-block" type="submit">Get OTP/Submit</button>


                    </form>
                    <!-- Default form subscription -->

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')

@endsection