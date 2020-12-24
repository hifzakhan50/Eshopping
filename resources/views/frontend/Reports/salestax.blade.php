@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><h2  style="color:#7468f0"><strong>Sales Tax Report</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable1" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">Order number</th>
                        <th style="color:#7468f0;font-size:20px;">Order Date</th>
                        <th style="color:#7468f0;font-size:20px;">G-Total</th>
                        <th style="color:#7468f0;font-size:20px;">Sales Tax</th>
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th style="text-align: right; font-size: 22px; font-weight: 600;color:#7468f0;">Total Sales Tax: </th>
                            <th style="text-align: left; font-size: 18px; font-weight: 500;"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <!--View HTML--->

@endsection
@push('script')
    <script>
        let routeName = '{{url('reports/salestax/report')}}';
        $(function()
        {
            $('#dataTable1').DataTable({
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
                    // Total over all pages
                    total = api
                        .column( 3 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 3 ).footer() ).html(
                        total +'PKR'
                    );
                },
                dom: 'Bfrtip',
                 buttons: [
                    { extend: 'excelHtml5', footer: true },
                    { extend: 'csvHtml5', footer: true },
                    { extend: 'pdfHtml5', footer: true } ],
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'order_number', name: 'Order Number' },
                    { data: 'order_date', name: 'Order Date' },
                    { data: 'total', name: 'Grand Total' },
                    { data: 'sales_tax', name: 'Sales Tax' }
                ]
            });
        });


    </script>
@endpush

