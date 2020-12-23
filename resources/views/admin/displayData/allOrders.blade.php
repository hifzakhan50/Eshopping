@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><h2  style="color:#7468f0"><strong>All Orders</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">Order_Id</th>
                        <th style="color:#7468f0;font-size:20px;">Customer_Id</th>
                        <th style="color:#7468f0;font-size:20px;">Order No</th>
                        <th style="color:#7468f0;font-size:20px;">Status</th>
                        <th style="color:#7468f0;font-size:20px;">Item Count</th>
                        <th style="color:#7468f0;font-size:20px;">Grand Total</th>
                        <th style="color:#7468f0;font-size:20px;">Action</th>
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

