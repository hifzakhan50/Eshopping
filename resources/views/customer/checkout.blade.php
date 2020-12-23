@extends('layouts.shoppingcart')
@section('content')

<div class="app-content content" >
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row" >
            <div class="content-header-left col-md-9 col-12 mb-2"style="padding-bottom: 150px">
                <div class="row breadcrumbs-top" >
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Cart</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Cart
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
</div>
        <div class="content-body" >
            <form action="#" class="icons-tab-steps checkout-tab-steps wizard-circle">

                <!-- Checkout Place order starts -->
                <fieldset class="checkout-step-1 px-0">
                    <section id="place-order" class="list-view product-checkout">
                        <div class="checkout-items">
                            <!--CART OBJECT LOOP WILL START HERE
                            //single product-->

                            @if(!($products->isEmpty()))
                            @foreach($products as $index => $product)
                            <div class="card ecommerce-card">
                                <div class="card-content">
                                    <div class="item-img text-center">
                                            <img  style="width:100px;height:100px" src=" {{ getImageSrc($product->image) }}" alt="img-placeholder">

                                    </div>

                                    <div class="card-body">
                                        <div class="item-name">
                                            {{ $product->name }}</a><br>
                                            {{ $product->description }}</a>
                                            <p class="stock-status-in">In Stock</p>
                                            <div class="item-quantity">
                                                <p class="quantity-title">Color: {{ $product->color }}</p>

                                            </div>
                                        </div>
                                        <div class="item-quantity">
                                            <p class="quantity-title">Quantity: {{ $product->quantity }}</p>
                                        </div>
                                    </div>
                                    <div class="item-options text-center">
                                        <div class="item-wrapper">
                                            <div class="item-cost">
                                                <h6 style="font-size: 12px" class="item-price">Single Item Price: {{ $product->price }}
                                                </h6>
                                            </div>
                                            @php
                                                $item_cost = $product->price * $product->quantity;
                                            @endphp
                                            <div class="item-cost">
                                                <h6 style="font-size: 12px" class="item-price"><strong>Total Cost: </strong>{{ $item_cost }} PKR
                                                </h6>
                                            </div>
                                        </div>

                                        <div onclick="removeProduct(this, {{$product->id}})" class="wishlist remove-wishlist">
                                            <i class="feather icon-x align-middle"></i> Remove
                                        </div>
                                        <div class="cart remove-wishlist">
                                            <i class="fa fa-heart-o mr-25"></i> Wishlist
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @else
                                <div class="alert alert-danger">
                                    <strong>Oops!</strong> Nothing in the cart.
                                </div>

                            @endif
                            <!--end of single product
                            //LOOP ENDS HERE-->
                        </div>

                        @php
                            $total_count = count($products);
                            $total_price = 0;
                            $total_shipping = 0;
                            foreach($products as $index => $product) {
                                $total_price = $total_price + ($product->price * $product->quantity);
                                $total_shipping = $total_shipping + (($product->weight/100)*20);
                            }

                            $GST = ($total_price / 100) * 17;

                            $grand_total = $total_price + $total_shipping + $GST;
                        @endphp
                        @if(!$products->isEmpty())
                        <div class="checkout-options">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 style="text-align: center;" class="options-title">Order Summary</h4>
                                        <div class="coupons">
                                            <div class="coupons-title">
                                                <p>Total Items: <span style="color: #7367f0; margin-left: 15px; font-size: 18px;">{{$total_count}}</span></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="price-details">
                                            <p>Price Details</p>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">
                                                Total PRICE
                                            </div>
                                            <div class="detail-amt">
                                                {{$total_price}} PKR
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">
                                                GST
                                            </div>
                                            <div class="detail-amt">
                                                {{$GST}} PKR
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">
                                                Delivery Charges
                                            </div>
                                            <div class="detail-amt discount-amt">
                                                {{$total_shipping}} PKR
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="detail">
                                            <div class="detail-title detail-total">Total</div>
                                            <div class="detail-amt total-amt">{{$grand_total}} PKR</div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div style="min-width: 500px;" class="col-md-6 offset-md-4">
                                                <a style="min-width: 300px; background-color: #7367f0; color: white;
padding: 10px;border-radius: 5px" href=" {{route('addBilling')}}" class="btn-btn-primary">

                                                 <strong>{{ __('PROCEED TO CHECKOUT') }}</strong>
                                                </a>

                                            </div>
                                        </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endif
                    </section>
                </fieldset>
                <!-- Checkout Place order Ends -->

                <!-- Checkout Payment Starts -->
            </form>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    function removeProduct(btn, index) {
        $(btn).parent().parent().remove();


        axios({
            method: 'post',
            url: 'http://127.0.0.1:8000/remove/' + index,
            data: '',
        }).then(function (response) {


        });

    };

</script>
@endsection
