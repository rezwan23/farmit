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
                    <form class="text-center border border-light p-5" action="{{route('contact.us')}}" method="post">
                        @csrf

                        <!-- Name -->
                        <input required type="text" id="defaultSubscriptionFormPassword" class="form-control mb-4" placeholder="Name" name="name">

                        <!-- Email -->
                        <textarea required name="feedback" class="form-control mb-4" placeholder="Feedback" id="" cols="30" rows="10"></textarea>

                        <!-- Sign in button -->
                        <button class="btn btn-info btn-block" type="submit">Send</button>


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