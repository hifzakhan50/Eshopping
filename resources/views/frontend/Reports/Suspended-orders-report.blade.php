@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><h2  style="color:#7468f0"><strong>Inventory Report</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable4" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">Order ID</th>
                        <th style="color:#7468f0;font-size:20px;">OrderNumber</th>
                        <th style="color:#7468f0;font-size:20px;">Order Date</th>
                        <th style="color:#7468f0;font-size:20px;">Order Total</th>
                        <th style="color:#7468f0;font-size:20px;">Order Status</th>
                
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!--View HTML--->

@endsection
@push('script')
    <script>
        let routeName = '{{url('reports/allSuspendedOrders/report')}}';
        $(function()
        {
            $('#dataTable4').DataTable({
                dom: 'Bfrtip', 
                buttons: [ 
                    { extend: 'excelHtml5', footer: true },
                    { extend: 'csvHtml5', footer: true },
                    { extend: 'pdfHtml5', footer: true } ],
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'id', name: 'Order ID' },
                    { data: 'order_number', name: 'Order Number' },
                    { data: 'order_date', name: 'Order Date'},
                    { data: 'total', name: 'Order Total'},
                    { data: 'status', name: 'Order Status'}
                ]
            });
        });


    </script>
@endpush

