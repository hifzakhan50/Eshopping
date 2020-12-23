@extends('layouts.customer')
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
        <div class="card-header"><h2>All Orders</h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Order Number</th>
                        <th>Customer Name</th>
                        <th>Mobile</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
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
                'rowCallback': function(row, data, index){
                    if(data['status'] == 'Delivered'){
                        $(row).find('td:eq(6)').css({
                                                    'color' : 'green',
                                                    'font-weight' : '600'
                                                    });
                    }
                    else
                    if(data['status'] == 'Suspended'){
                        $(row).find('td:eq(6)').css({
                                                    'color' : 'red',
                                                    'font-weight' : '600'
                                                    });
                    }
            },
                processing: true,
                serverSide: true,
                ajax: '{{url('/customer/orders/allorders')}}',
                columns: [
                    {data: 'id', name: 'ID'},
                    {data: 'order_number', name: 'Order Number'},
                    {data: 'fullname', name: 'Customer Name'},
                    {data: 'mobile', name: 'Mobile'},
                    {data: 'name', name: 'Name'},
                    {data: 'quantity', name: 'Quantity'},
                    {data: 'status', name: 'Status'},
                ]
            });
        });

    </script>
@endpush
