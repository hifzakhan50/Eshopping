@extends('layouts.frontend')
@section('content')


    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Product Details</h2>

                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- app ecommerce details start -->
            <section class="app-ecommerce-details">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5 mt-2">
                            <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img src="{{ getImageSrc($product->image) }}" class="img-fluid" alt="product image">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <h5>{{ $product->name }}
                                </h5>
                                <p class="text-muted">by {{ $product->sellerProfile->name }}</p>
                                <div class="ecommerce-details-price d-flex flex-wrap">

                                    <p class="text-primary font-medium-3 mr-1 mb-0">RS.{{ $product->price }}</p>
                                    <span class="pl-1 font-medium-3 border-left">
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-warning"></i>
                                            <i class="feather icon-star text-secondary"></i>
                                        </span>
                                    <span class="ml-50 text-dark font-medium-1">424 ratings</span>
                                </div>
                                <hr>
                                <p>{{ $product->description }}</p>
{{--                                <p class="font-weight-bold mb-25"> <i class="feather icon-truck mr-50 font-medium-2"></i>Free Shipping--}}
{{--                                </p>--}}
{{--                                <p class="font-weight-bold"> <i class="feather icon-dollar-sign mr-50 font-medium-2"></i>EMI options available--}}
{{--                                </p>--}}
                                <hr>
                                <div class="form-group">
                                    <label class="font-weight-bold">Color: {{ $product->color }}</label>
                                    <ul class="list-unstyled mb-0 product-color-options">
                                        <li class="d-inline-block selected">
                                            <div class="color-option b-primary">
                                                <div class="filloption bg-primary"></div>
                                            </div>
                                        </li>
                                        <li class="d-inline-block">
                                            <div class="color-option b-success">
                                                <div class="filloption bg-success"></div>
                                            </div>
                                        </li>
                                        <li class="d-inline-block">
                                            <div class="color-option b-danger">
                                                <div class="filloption bg-danger"></div>
                                            </div>
                                        </li>
                                        <li class="d-inline-block">
                                            <div class="color-option b-warning">
                                                <div class="filloption bg-warning"></div>
                                            </div>
                                        </li>
                                        <li class="d-inline-block">
                                            <div class="color-option b-black">
                                                <div class="filloption bg-black"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <p>Available - <span class="text-success">In stock</span></p>

                                <div class="d-flex flex-column flex-sm-row">
                                    <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i class="feather icon-shopping-cart mr-25"></i>ADD TO CART</button>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i class="feather icon-facebook"></i></button>
                                <button type="button" class="btn btn-icon rounded-circle btn-outline-info mr-1 mb-1"><i class="feather icon-twitter"></i></button>
                                <button type="button" class="btn btn-icon rounded-circle btn-outline-danger mr-1 mb-1"><i class="feather icon-youtube"></i></button>
                                <button type="button" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i class="feather icon-instagram"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="item-features py-5">
                        <div class="row text-center pt-2">
                            <div class="col-12 col-md-4 mb-4 mb-md-0 ">
                                <div class="w-75 mx-auto">
                                    <i class="feather icon-award text-primary font-large-2"></i>
                                    <h5 class="mt-2 font-weight-bold">100% Original</h5>
                                    <p>Chocolate bar candy canes ice cream toffee. Croissant pie cookie halvah.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                <div class="w-75 mx-auto">
                                    <i class="feather icon-clock text-primary font-large-2"></i>
                                    <h5 class="mt-2 font-weight-bold">10 Day Replacement</h5>
                                    <p>Marshmallow biscuit donut dragée fruitcake. Jujubes wafer cupcake.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-4 mb-md-0">
                                <div class="w-75 mx-auto">
                                    <i class="feather icon-shield text-primary font-large-2"></i>
                                    <h5 class="mt-2 font-weight-bold">1 Year Warranty</h5>
                                    <p>Cotton candy gingerbread cake I love sugar plum I love sweet croissant.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- app ecommerce details end -->

        </div>
    </div>

@endsection
