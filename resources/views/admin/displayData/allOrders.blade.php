@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><h2>Categories</h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th>Order_Id</th>
                        <th>Customer_Id</th>
                        <th>Order No</th>
                        <th>Status</th>
                        <th>Item Count</th>
                        <th>Grand Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!--View HTML--->

@endsection

<!---VIew Script-->
@push('script')
    <script>
        let routeName = '{{url('admin/displayDta/data')}}';
        $(function()
        {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'order_id', name: 'order_id' },
                    { data: 'Customer_Id', name: 'Customer_Id' },
                    { data: 'order_number', name: 'Order_No' },
                    { data: 'transact_status', name: 'status' },
                    { data: 'item_count', name: 'item_count' },
                    { data: 'grandTotal', name: 'grandTotal' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


    </script>


@endpush

