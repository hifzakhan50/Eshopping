@extends('layouts.shoppingcart')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Checkout</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">eCommerce</a>
                                </li>
                                <li class="breadcrumb-item active">Checkout
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form action="#" class="icons-tab-steps checkout-tab-steps wizard-circle">

                <!-- Checkout Place order starts -->
                <h6><i class="step-icon step feather icon-shopping-cart"></i>Cart</h6>
                <fieldset class="checkout-step-1 px-0">
                    <section id="place-order" class="list-view product-checkout">
                        <div class="checkout-items">
                            <!--CART OBJECT LOOP WILL START HERE
                            //single product-->
                            @if(!empty($products))
                                @foreach($products as $index => $product)

                            <div class="card ecommerce-card">
                                <div class="card-content">
                                    <div class="item-img text-center">
                                        <a href="app-ecommerce-details.html">
                                            <img  style="width:100px;height:100px" src=" {{ getImageSrc($product->shoppingCart_products->image) }}" alt="img-placeholder">
                                        </a>
                                    </div>

                                    <div class="card-body">
                                        <div class="item-name">
                                            {{ $product->shoppingCart_products->name }}</a><br>
                                            {{ $product->shoppingCart_products->description }}</a>
                                            <p class="stock-status-in">In Stock</p>
                                            <div class="stock-status-in">
                                                <p class="quantity-title">Color</p>
                                                {{ $product->shoppingCart_products->color }}
                                                <span></span></div>
                                        </div>
                                        <div class="item-quantity">
                                            <p class="quantity-title">Quantity</p>
                                            <div class="input-group quantity-counter-wrapper">
                                                <input type="number" class="quantity-counter" value="{{ $product->shoppingCart_products->quantity }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-options text-center">
                                        <div class="item-wrapper">
                                            <div class="item-rating">
                                                <div class="badge badge-primary badge-md">
                                                    4 <i class="feather icon-star ml-25"></i>
                                                </div>
                                            </div>
                                            <div class="item-cost">
                                                <h6 class="item-price">{{ $product->shoppingCart_products->price }}
                                                </h6>
                                            </div>
                                        </div>

                                        <div onclick="removeProduct(this, {{$index}})" class="wishlist remove-wishlist">
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
                        <div class="checkout-options">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="options-title">Options</p>
                                        <div class="coupons">
                                            <div class="coupons-title">
                                                <p>Coupons</p>
                                            </div>
                                            <div class="apply-coupon">
                                                <p>Apply</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="price-details">
                                            <p>Price Details</p>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">
                                                Total MRP
                                            </div>
                                            <div class="detail-amt">
                                                $598
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">
                                                Bag Discount
                                            </div>
                                            <div class="detail-amt discount-amt">
                                                -25$
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">
                                                Estimated Tax
                                            </div>
                                            <div class="detail-amt">
                                                $1.3
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">
                                                EMI Eligibility
                                            </div>
                                            <div class="detail-amt emi-details">
                                                Details
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="detail-title">
                                                Delivery Charges
                                            </div>
                                            <div class="detail-amt discount-amt">
                                                Free
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="detail">
                                            <div class="detail-title detail-total">Total</div>
                                            <div class="detail-amt total-amt">$574</div>
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
                            </div>                        </div></section>
                </fieldset>
                <!-- Checkout Place order Ends -->

                <!-- Checkout Customer Address Starts -->   <h6><i class="step-icon step feather icon-home"></i>Address</h6>
                <fieldset class="checkout-step-2 px-0">
                    <section id="checkout-address" class="list-view product-checkout">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h4 class="card-title">Add New Address</h4>
                                <p class="text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-name">Full Name:</label>
                                                <input type="text" id="checkout-name" class="form-control required" name="fname">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-number">Mobile Number:</label>
                                                <input type="number" id="checkout-number" class="form-control required" name="mnumber">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-apt-number">Flat, House No:</label>
                                                <input type="number" id="checkout-apt-number" class="form-control required" name="apt-number">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-landmark">Landmark e.g. near apollo hospital:</label>
                                                <input type="text" id="checkout-landmark" class="form-control required" name="landmark">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-city">Town/City:</label>
                                                <input type="text" id="checkout-city" class="form-control required" name="city">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-pincode">Pincode:</label>
                                                <input type="number" id="checkout-pincode" class="form-control required" name="pincode">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-state">State:</label>
                                                <input type="text" id="checkout-state" class="form-control required" name="state">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="add-type">Address Type:</label>
                                                <select class="form-control" id="add-type">
                                                    <option>Home</option>
                                                    <option>Work</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 offset-md-6">
                                            <div class="btn btn-primary delivery-address float-right">
                                                SAVE AND DELIVER HERE
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customer-card">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">John Doe</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body actions">
                                        <p class="mb-0">9447 Glen Eagles Drive</p>
                                        <p>Lewis Center, OH 43035</p>
                                        <p>UTC-5: Eastern Standard Time (EST) </p>
                                        <p>202-555-0140</p>
                                        <hr>
                                        <div class="btn btn-primary btn-block delivery-address">DELIVER TO THIS ADDRESS</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </fieldset>

                <!-- Checkout Customer Address Ends -->

                <!-- Checkout Payment Starts -->
                <h6><i class="step-icon step feather icon-credit-card"></i>Payment</h6>
                <fieldset class="checkout-step-3 px-0">
                    <section id="checkout-payment" class="list-view product-checkout">
                        <div class="payment-type">
                            <div class="card">
                                <div class="card-header flex-column align-items-start">
                                    <h4 class="card-title">Payment options</h4>
                                    <p class="text-muted mt-25">Be sure to click on correct payment option</p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <div class="vs-radio-con vs-radio-primary">
                                                <input type="radio" name="vueradio" checked="" value="false">
                                                <span class="vs-radio">
                                                        <span class="vs-radio--border"></span>
                                                        <span class="vs-radio--circle"></span>
                                                    </span>
                                                <img src="../../../app-assets/images/pages/eCommerce/bank.png" alt="img-placeholder" height="40">
                                                <span>US Unlocked Debit Card 12XX XXXX XXXX 0000
                                                    </span>
                                            </div>
                                            <div class="card-holder-name mt-75">
                                                John Doe
                                            </div>
                                            <div class="card-expiration-date mt-75">
                                                11/2020
                                            </div>
                                        </div>
                                        <div class="customer-cvv mt-1">
                                            <div class="form-inline">
                                                <label class="mb-50" for="card-holder-cvv">Enter CVV:</label>
                                                <input type="number" class="form-control ml-75 mb-50 input-cvv" id="card-holder-cvv">
                                                <div class="btn btn-primary btn-cvv ml-50 mb-50">Continue</div>
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <ul class="other-payment-options list-unstyled">
                                            <li>
                                                <div class="vs-radio-con vs-radio-primary py-25">
                                                    <input type="radio" name="vueradio" value="false">
                                                    <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                    <span>
                                                            Credit / Debit / ATM Card
                                                        </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vs-radio-con vs-radio-primary py-25">
                                                    <input type="radio" name="vueradio" value="false">
                                                    <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                    <span>
                                                            Net Banking
                                                        </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vs-radio-con vs-radio-primary py-25">
                                                    <input type="radio" name="vueradio" value="false">
                                                    <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                    <span>
                                                            EMI (Easy Installment)
                                                        </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="vs-radio-con vs-radio-primary py-25">
                                                    <input type="radio" name="vueradio" value="false">
                                                    <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                    <span>
                                                            Cash On Delivery
                                                        </span>
                                                </div>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="gift-card">
                                            <p><i class="feather icon-plus-square mr-25 font-medium-5"></i>
                                                Add Gift Card
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="amount-payable checkout-options">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Price Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="detail">
                                            <div class="details-title">
                                                Price of 3 items
                                            </div>
                                            <div class="detail-amt">
                                                <strong>$699.30</strong>
                                            </div>
                                        </div>
                                        <div class="detail">
                                            <div class="details-title">
                                                Delivery Charges
                                            </div>
                                            <div class="detail-amt discount-amt">
                                                Free
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="detail">
                                            <div class="details-title">
                                                Amount Payable
                                            </div>
                                            <div class="detail-amt total-amt">$699.30</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </fieldset>

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



