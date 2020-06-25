@extends('layouts.seller')
@section('content')
{{--    <!-- <div class="row">--}}
{{--    @foreach($products as $product)--}}

{{--            <div class="col-md-4">--}}

{{--        <div class="card ecommerce-card">--}}
{{--            <div class="card-content">--}}
{{--                <div class="item-img text-center">--}}
{{--                    <a href="app-ecommerce-details.html">--}}
{{--                         <img src="{{ asset('storage/'.$product->image)}}"> </a>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="item-wrapper">--}}
{{--                        <div class="item-rating">--}}
{{--                            <div class="badge badge-primary badge-md">--}}
{{--                                <span>4</span> <i class="feather icon-star"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h6 class="item-price">--}}
{{--                                {{$product->price}}--}}
{{--                            </h6>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item-name">--}}
{{--                        <a href="app-ecommerce-details.html">{{$product->name}}</a>--}}
{{--                        <p class="item-company">By <span class="company-name">Mega Shoppy</span></p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <p class="item-description">--}}
{{--                            {{$product->description}}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="item-options text-center">--}}
{{--                    <div class="item-wrapper">--}}
{{--                        <div class="item-rating">--}}
{{--                            <div class="badge badge-primary badge-md">--}}
{{--                                <span>4</span> <i class="feather icon-star"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item-cost">--}}
{{--                            <h6 class="item-price">--}}
{{--                                $39.99--}}
{{--                            </h6>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="wishlist">--}}
{{--                        <i class="fa fa-heart-o"></i> <span>Wishlist</span>--}}
{{--                    </div>--}}
{{--                    <div class="cart">--}}
{{--                        <i class="feather icon-shopping-cart"></i> <span class="add-to-cart">Add to cart</span> <a href="app-ecommerce-checkout.html" class="view-in-cart d-none">View In Cart</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--            </div>--}}

{{--    @endforeach--}}
        </div> -->

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Sku</th>
                <th>Image</th>
                <th>Color</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>

@endsection
@push('script')
    <script>
        $(function() {
            $('#dataTable').dataTable({
                processing: true,
                serverSide: true,
                ajax:'{{url('/seller/products/data')}}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'sku', name: 'sku' },
                    { data: 'image', name: 'image' },
                    { data: 'color', name: 'color' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

    </script>
@endpush
