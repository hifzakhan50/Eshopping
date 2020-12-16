@extends('layouts.frontend')
@section('content')
<h1 style="margin-top: 50px;" style="align-content: center"> </h1>
        @if(!($products->isEmpty()))
        <section style="grid-template-columns: 2fr 0fr;" class="list-view product-checkout">
        <div class="card-content">
            <div class="card-body">
                <h4 style="text-align: center; font-weight: 700; font-size: 26px;" class="options-title">Products In the Cart</h4>
        <div class="row">
        @foreach($products as $index => $product)
        <div class="card ecommerce-card col-lg-12">
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
                            <h6 style="font-size: 12px" class="item-price"><strong>Total Cost: </strong>{{ $product->price }} PKR
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @endforeach
            </div>
        </div>
        </div>
        </section>
        @endif

        <div class="card-content">
            <div class="card-body">
                <h4 style="text-align: center; font-weight: 700; font-size: 26px;" class="options-title">Shipping Address</h4>
                @foreach ($address as $single)
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">{{$single->fullname}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body actions">
                            <p><strong>Mobile Number: </strong>{{$single->mobile}}</p>
                            <p class="mb-0"><strong>Address: </strong>{{$single->house}} {{$single->street}}</p>
                            <p><strong>Province: </strong>{{$single->province}}, <strong>Postal Code: </strong>{{$single->postalcode}}</p>
                            <p><strong>Country: </strong>{{$single->country}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
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
        <div class="customer-card">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 style="text-align: center; font-weight: 700; font-size: 26px;" class="options-title">Order Summary</h4>
                        <div class="coupons">
                            <div class="coupons-title">
                                <p>Total Items: <span style="color: #7367f0; margin-left: 15px; font-size: 18px;">{{$total_count}}</span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="price-details">
                            <p style="font-size: 22px;">Price Details</p>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                <strong>Total PRICE</strong>
                            </div>
                            <div class="detail-amt">
                                {{$total_price}} PKR
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                <strong>GST</strong>
                            </div>
                            <div class="detail-amt">
                                {{$GST}} PKR
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                <strong>Charges</strong>
                            </div>
                            <div class="detail-amt discount-amt">
                                {{$total_shipping}} PKR
                            </div>
                        </div>
                        <hr>
                        <div class="detail">
                            <div style="font-size: 25px" class="detail-title detail-total">Grand Total</div>
                            <div style="font-size: 23px; color: #7367f0" class="detail-amt total-amt">{{$grand_total}} PKR</div>
                        </div>
                </div>
            </div>
            </div>                        
        </div>
        <form action="/savefinalorderdetails" method="POST">
            <input type="text">
            <div style="margin: auto">
                <button type="submit" style="min-width: 300px; background-color: #7367f0; color: white; border: none;
                    padding: 20px 50px;border-radius: 5px; float: right; margin-bottom: 50px;"  class="btn-btn-primary">

                    <strong>{{ __('Confirm MY Order') }}</strong>
                </button>
            </div>
        </form>
        @endif
<!-- Checkout Customer Address Ends -->
@endsection
