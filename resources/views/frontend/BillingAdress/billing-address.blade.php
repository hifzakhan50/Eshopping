@extends('layouts.frontend')
@section('content')


    <div style="margin-top: 50px" class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div style="margin-top: 50px"  class="col-12">
                        <h2 class="content-header-title float-left mb-0">Shipping Address</h2>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{ url('/checkout') }}">Cart</a>
                                        </li>
                                        <li class="breadcrumb-item active">Shipping Address
                                        </li>
                                    </ol>
                                </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form method="POST" action="/storeorder" class="icons-tab-steps checkout-tab-steps wizard-circle">
            @csrf

                <!-- Checkout Customer Address Starts -->
               <h6><i class="step-icon step feather icon-home"></i>Address</h6>
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
                                                <input type="text" id="checkout-name" class="form-control required" name="fname" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-number">Mobile Number:</label>
                                                <input type="number" id="checkout-number" class="form-control required" name="mnumber" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-landmark">Email:</label>
                                                <input type="email" id="checkout-email" class="form-control required" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-apt-number">Flat, House No:</label>
                                                <input type="number" id="checkout-apt-number" class="form-control required" name="house-number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-street-number">Street No:</label>
                                                <input type="number" id="checkout-street-number" class="form-control required" name="street" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-city">Town/City:</label>
                                                <input type="text" id="checkout-city" class="form-control required" name="city" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-city">Province:</label>
                                                <input type="text" id="checkout-province" class="form-control required" name="province" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-pincode">Postal Code:</label>
                                                <input type="number" id="checkout-pincode" class="form-control required" name="postalcode" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-country">Country:</label>
                                                <input type="text" id="checkout-country" class="form-control required" name="country" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="add-type">Address Type:</label>
                                                <select class="form-control" id="add-type" name="addresstype">
                                                    <option>Home</option>
                                                    <option>Work</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 offset-md-6">
                                                <button type="submit" class="btn btn-primary delivery-address float-right">
                                                    {{ __('Add') }}
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </section>
                </fieldset>

                <!-- Checkout Customer Address Ends -->
            </form>

            @if($data!=null)
                        
                        <div class="customer-card">
                        @foreach ($data as $single)
                            <div class="card">
                                <div class="card-header">
                                <h4 class="card-title">{{$single->fullname}}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body actions">
                                    <p class="mb-0">{{$single->house}} {{$single->street}}</p>
                                        <p>{{$single->province}}, {{$single->postalcode}}</p>
                                        <p>{{$single->country}}</p>
                                        <p>{{$single->mobile}}</p>
                                        <hr>
                                        <form action="/order-confirmation-detail" method="POST">
                                        @csrf
                                            <input name="id" type="number" value="{{$single->id}}" hidden>
                                            <button type="submit" style="min-width: 300px; background-color: #7367f0; color: white; border: none;
                                                    padding: 10px;border-radius: 5px"  class="btn-btn-primary">

                                                    <strong>{{ __('Place Order On This Address') }}</strong>
                                            </button>
                                        </form>

                                        </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        @endif

        </div>
    </div>

@endsection
