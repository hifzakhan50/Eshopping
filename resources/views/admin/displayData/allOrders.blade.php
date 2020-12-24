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
                        <th style="color:#7468f0;font-size:20px;">Customer Id</th>
                        <th style="color:#7468f0;font-size:20px;">Order No</th>
                        <th style="color:#7468f0;font-size:20px;">Grand Total</th>
                        <th style="color:#7468f0;font-size:20px;">Sales Tax</th>
                        <th style="color:#7468f0;font-size:20px;">Order Date</th>
                        <th style="color:#7468f0;font-size:20px;">Status</th>
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
        let routeName = '{{url('admin/displayData/data')}}';
        $(function()
        {
            $('#dataTable').DataTable({
                'rowCallback': function(row, data, index){
                    if(data['status'] == 'Delivered'){
                        $(row).find('td:eq(5)').css({
                                                    'color' : 'green',
                                                    'font-weight' : '600'
                                                    });
                    }
                    else
                    if(data['status'] == 'Suspended'){
                        $(row).find('td:eq(5)').css({
                                                    'color' : 'red',
                                                    'font-weight' : '600'
                                                    });
                    }
                    else{
                        $(row).find('td:eq(5)').css({
                                                    'color' : '#5d73c9',
                                                    'font-weight' : '600'
                                                    });
                    }
            },
                dom: 'Bfrtip', 
                buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ], 
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'customer_profile_id', name: 'Customer_Id' },
                    { data: 'order_number', name: 'Order_No' },
                    { data: 'total', name: 'total' },
                    { data: 'sales_tax', name: 'sales_tax' },
                    { data: 'order_date', name: 'order_date' },
                    { data: 'status', name: 'status' }
                ]
            });
        });


    </script>
@endpush

