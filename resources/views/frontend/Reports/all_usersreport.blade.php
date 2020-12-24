@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><h2  style="color:#7468f0"><strong>All Registered Users Report</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable2" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">User-ID</th>
                        <th style="color:#7468f0;font-size:20px;">User-Name</th>
                        <th style="color:#7468f0;font-size:20px;">User-Email</th>
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
        let routeName = '{{url('/reports/all_users/report')}}';
        $(function()
        {
            $('#dataTable2').DataTable({
                
                dom: 'Bfrtip', 
                buttons: [ 
                    { extend: 'excelHtml5', footer: true },
                    { extend: 'csvHtml5', footer: true },
                    { extend: 'pdfHtml5', footer: true } ],
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'id', name: 'User-ID' },
                    { data: 'name', name: 'User-Name' },
                    { data: 'email', name: 'User-Email' },
                ]
            });
        });


    </script>
@endpush

