@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><h2  style="color:#7468f0"><strong>Inventory Report</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable3" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">Product Number</th>
                        <th style="color:#7468f0;font-size:20px;">SKU</th>
                        <th style="color:#7468f0;font-size:20px;">Name</th>
                        <th style="color:#7468f0;font-size:20px;">Description</th>
                        <th style="color:#7468f0;font-size:20px;">Price</th>
                
                    </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="text-align: right; font-size: 22px; font-weight: 400;color:#7468f0;">Total Worth Of Inventory: </th>
                            <th style="text-align: left; font-size: 18px; font-weight: 350;"></th>
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
        let routeName = '{{url('reports/allProducts/report')}}';
        $(function()
        {
            $('#dataTable3').DataTable({
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
                        .column( 4 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
        
                    // Update footer
                    $( api.column( 4 ).footer() ).html(
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
                    { data: 'id', name: 'Product Number' },
                    { data: 'sku', name: 'SKU' },
                    { data: 'name', name: 'Name'},
                    { data: 'description', name: 'Description'},
                    { data: 'price', name: 'Price'}
                ]
            });
        });


    </script>
@endpush

