@extends('layouts.frontend')
@section('content')
<script>
    function incrementClicks(id)
    {
        $.ajax({
            url: "/api/incrementClick/"+id
        });
    }
</script>
<div style="margin-top: 120px;"></div>
    @if(!$ads->isEmpty())
    <div class="slider">
        @foreach ($ads as $ad)
            <div>
                <a onclick="incrementClicks({{$ad->id}})" style="z-index: 1000" href="{{ url('product/'.$ad->name) }}">
                    <div class="row">
                        <div style="padding: 50px; margin-left: 20px" class="col-sm-5 col-lg-5">
                            <h1 style="color: #7783f3; font-size: 3rem;">Our Top Pick</h1>
                            <h1>{{$ad->name}}</h1>
                            <h3 style="font-size: 2.3rem"><strong>Price: </strong>{{$ad->price}}</h3>
                            <h4><strong>Size: </strong>{{$ad->size}}&nbsp;/  <strong>Color: </strong>{{$ad->color}} </h4>
                        </div>
                        <div class="col-sm-5 col-lg-5">
                            <img class="img-flui" style="width:350px;height:350px" src="{{ getImageSrc($ad->image) }}"
                                                alt="img-placeholder">
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()->has('PleaseLogin'))
                <div>
                    <p><strong>Please Login!</strong> to access and add the product in the cart.</p>
                    <a style="padding: 15px 30px; margin-top: 15px; background-color: #7367f0; color: white;" href="{{ route('login') }}">Login</a>
                </div>
            @endif
        </div>
    </div>
    <div class="content-header row mt-0">
{{--        <div class="content-header-left col-md-9 col-12 mb-2">--}}
{{--            <div class="row breadcrumbs-top">--}}
{{--                <div class="col-12">--}}
{{--                    <h2 class="content-header-title float-left mb-0">Shop</h2>--}}
{{--                    <div class="breadcrumb-wrapper col-12">--}}
{{--                        <ol class="breadcrumb">--}}
{{--                            <li class="breadcrumb-item"><a href="{{'/home'}}">Home</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item active">Shop--}}
{{--                            </li>--}}
{{--                        </ol>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        </div>
    </div>
    <div class="content-detached content-center mt-0">
        <div class="content-body">
            <!-- Ecommerce Content Section Starts -->
            <section id="ecommerce-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ecommerce-header-items">
                            <div class="result-toggler">
                                <button class="navbar-toggler shop-sidebar-toggler" type="button"
                                        data-toggle="collapse">
                                    <span class="navbar-toggler-icon d-block d-lg-none"><i
                                            class="feather icon-menu"></i></span>
                                </button>
                            </div>
                            <div class="view-options">
{{--                                <select class="price-options form-control" id="ecommerce-price-options">--}}
{{--                                    <option selected>Featured</option>--}}
{{--                                    <option value="1">Lowest</option>--}}
{{--                                    <option value="2">Highest</option>--}}
{{--                                </select>--}}
                                <div class="view-btn-option">
                                    <button class="btn btn-white view-btn grid-view-btn active">
                                        <i class="feather icon-grid"></i>
                                    </button>
                                    <button class="btn btn-white list-view-btn view-btn">
                                        <i class="feather icon-list"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Ecommerce Content Section Starts -->
            <!-- background Overlay when sidebar is shown  starts-->
            <div class="shop-content-overlay"></div>
            <!-- background Overlay when sidebar is shown  ends-->

            <!-- Ecommerce Search Bar Starts -->
            <section id="ecommerce-searchbar">

                <div class="row mt-1">

                    <div class="col-sm-12">
                        <fieldset class="form-group position-relative">
{{--                            <div id="dataTable_filter" class="dataTables_filter">--}}
                            <input type="text" class="form-control  search-product" id="iconLeft5" onkeyup="myFunction()"
                                   placeholder="Search here">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
{{--                            </div>--}}
                        </fieldset>
                    </div>
                </div>
            </section>
            <!-- Ecommerce Search Bar Ends -->
{{--filter--}}
            <!-- Ecommerce Products Starts -->
            <section id="ecommerce-products" class="grid-view">

                @foreach($products as $product)
                    <div class="card ecommerce-card">
                        <div class="card-content">
                            <div class="item-img text-center">
                                <a href="{{ url('product/'.$product->name) }}">
                                    <img class="img-flui" style="width:350px;height:350px" src="{{ getImageSrc($product->image) }}"
                                         alt="img-placeholder"></a>
                            </div>
                            <div class="card-body">
                                <div class="item-wrapper">
                                    <div class="item-rating">
{{--                                        <div class="badge badge-primary badge-md">--}}
{{--                                            <span>4</span> <i class="feather icon-star"></i>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div>
                                        <h6 class="item-price">
                                            Rs.{{ $product->price }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="item-name">
                                    <a href="{{ url('product/'.$product->name) }}">{{ $product->name }}</a>
{{--                                    <p class="item-company">By <span class="company-name">Google</span></p>--}}
                                </div>
                                <div>
                                    <p class="item-description">
                                        {{ substr($product->description , 0, 20)}}
                                    </p>
                                </div>
                            </div>
                            <div class="item-options text-center">
                                <div class="item-wrapper">
{{--                                    <div class="item-rating">--}}
{{--                                        <div class="badge badge-primary badge-md">--}}
{{--                                            <span>4</span> <i class="feather icon-star"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="item-cost">
                                        <h6 class="item-price">
                                            Rs.{{ $product->price }}
                                        </h6>
                                    </div>
                                </div>

                                {{-- <div class="cart">
                                    <i class="feather icon-shopping-cart"></i> <span
                                        class="add-to-cart">Add to cart</span>
                                    <a href='{{ url('checkout') }}' class="view-in-cart d-none">View In Cart</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
            <!-- Ecommerce Products Ends -->

            <!-- Ecommerce Pagination Starts -->
{{--            <section id="ecommerce-pagination">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <nav aria-label="Page navigation example">--}}
{{--                            <ul class="pagination justify-content-center mt-2">--}}
{{--                                <li class="page-item prev-item"><a class="page-link" href="#"></a></li>--}}
{{--                                <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">7</a></li>--}}
{{--                                <li class="page-item next-item"><a class="page-link" href="#"></a></li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
            <!-- Ecommerce Pagination Ends -->

        </div>
    </div>
@endsection


