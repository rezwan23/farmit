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
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
                    <div class="shop-action-result">
                        <span>Showing 1–6 of 10 results</span>
                    </div>
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
                    <div class="shop-thumb mb-20">
                        <a href="{{route('addToCart', $post)}}">
                            <img src="uploads/{{$post->product_image}}" alt="">
                            <span>Add To Cart</span>
                        </a>
                    </div>
                    <div class="shop-item-content">
                        <div class="shop-item-rating">
                            {{$post->district->name}} - {{$post->thana->name}} - {{$post->post->name}}
                        </div>
                        <h4><a data-toggle="modal" data-target="#postModal{{$post->id}}" href="#">{{$post->product_name}} - {{$post->user->name}}</a></h4>
                        <span class="new-price">BDT {{$post->sell_price}}</span>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="postModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Product Description</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>{{$post->details}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
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