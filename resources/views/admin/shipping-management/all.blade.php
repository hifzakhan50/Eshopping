@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><h2 style="color:#7468f0"><strong>Shipping Methods</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">Id</th>
                        <th style="color:#7468f0;font-size:20px;">Name</th>
                        <th style="color:#7468f0;font-size:20px;">Price</th>
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
        let routeName = '{{url('/admin/shipping-management/data')}}';
        $(function()
        {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


    </script>


@endpush

