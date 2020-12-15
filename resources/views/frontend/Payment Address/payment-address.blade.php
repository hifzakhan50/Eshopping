@extends('layouts.frontend')
@section('content')


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
            
            <form  action="#" class="icons-tab-steps checkout-tab-steps wizard-circle">
                <!-- Checkout Payment Starts -->
                <h6><i class="step-icon step feather icon-credit-card"></i>Payment</h6>
                <fieldset class="checkout-step-3 px-0">
                    <section id="checkout-payment" class="list-view product-checkout">
                        <div class="payment-type">
                            <div class="card">
                                <div class="card-header flex-column align-items-start">
                                    <h4 class="card-title">Payment Method</h4>
                                    <p class="text-muted mt-25">Be sure to click on payment option</p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <hr class="my-2">
                                        <ul class="other-payment-options list-unstyled">
                                                <div class="vs-radio-con vs-radio-primary py-25">
                                                    <input type="radio" name="payment-type" value="false" onclick="show2();">
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
                                        <div id="drop-down-radio-btn" class="pay-method-wrap-content pay-method-wrap-content-border" data-spm-anchor-id="a2a0e.payment_page.0.i3.28367d68jCruhY"><div class="clearfix">
                                                <div class="payment-confirm-tip">You will pay in cash to our courier when you receive the goods at your doorstep.
                                                </div>
                                            </div>
                                            <div style=" margin-bottom:10px"class="btn btn-primary delivery-address float-right"> <a style="min-width: 300px; background-color: #7367f0; color: white;
padding: 10px;border-radius: 5px" href=" {{route('placeOrder')}}" class="btn-btn-primary">

                                                    <strong>{{ __('CONFIRM ORDER') }}</strong>
                                                </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="amount-payable checkout-options">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Order Details</h4>
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
<script>
    function show2(){
        document.getElementById('drop-down-radio-btn').style.display = 'block';
    }</script>
@endsection
