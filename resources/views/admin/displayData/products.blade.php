@extends('layouts.admin')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()->has('success'))
                <div class="alert alert-success text-white">
                    <strong>Success!</strong> {{ session('success')  }}
                </div>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h2 style="color:#7468f0"><strong>Products list</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTablee" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">Id</th>
{{--                        <th style="color:#7468f0;font-size:20px;">Seller Id</th>--}}
                        <th style="color:#7468f0;font-size:20px;">Name</th>
                        <th style="color:#7468f0;font-size:20px;">Description</th>
                        <th style="color:#7468f0;font-size:20px;">Price</th>
                        <th style="color:#7468f0;font-size:20px;">Sku</th>
                        <th style="color:#7468f0;font-size:20px;">Image</th>
                        <th style="color:#7468f0;font-size:20px;">Color</th>
                        <th style="color:#7468f0;font-size:20px;">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        let routeName = '{{url('admin/displayProductsData/data')}}';
        $(function () {
            $('#dataTablee').dataTable({
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    {data: 'id', name: 'id'},
                    // {data: 'seller_profile_id', name: 'seller_profile_id'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'price', name: 'price'},
                    {data: 'sku', name: 'sku'},
                    {data: 'image', name: 'image'},
                    {data: 'color', name: 'color'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

    </script>
@endpush
