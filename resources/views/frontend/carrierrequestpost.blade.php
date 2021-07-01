@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg breadcrumb-style2" data-background="/frontend/img/bg/breadcrumb_bg01.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>our farm shop</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Carrier Request Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- shop-area -->
<section class="shop-area shop-bg pb-75" data-background="/frontend/img/bg/shop_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="shop-action-wrap text-center text-sm-left d-block d-sm-flex align-items-center justify-content-between">
                    <div class="shop-action-form">
                        <form action="#">
                            <select class="custom-select">
                                <option selected="">Short by Latest</option>
                                <option>Popularity</option>
                                <option>Low to High</option>
                                <option>High to Low</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="shop-item text-center mb-40">
                    <div class="shop-item-content">
                        <div class="shop-item-rating">
                            Buyer : {{$post->user->name}}
                            <br>
                            From : {{$post->fromDistrict->name}} - {{$post->fromThana->name}} - {{$post->fromPostOffice->name}}
                            <br>
                            To : {{$post->toDistrict->name}} - {{$post->toThana->name}} - {{$post->toPostOffice->name}}
                            <br>
                            Description : {!!$post->description!!}
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- shop-area-end -->

@endsection