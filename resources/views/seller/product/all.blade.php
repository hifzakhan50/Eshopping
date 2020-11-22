@extends('layouts.seller')
@section('content')


    <div class="card">
        <div class="card-header"><h2>Products</h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                       cellspacing="0">
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
        </div>
    </div>


@endsection
@push('script')
    <script>

        $(function () {
            $('#dataTable').dataTable({
                processing: true,
                serverSide: true,
                ajax: '{{url('/seller/products/data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'sku', name: 'sku'},
                    {data: 'image', name: 'image'},
                    {data: 'color', name: 'color'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

    </script>
@endpush
