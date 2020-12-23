@extends('layouts.admin')
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
        <div class="card-header"><h2 style="color:#7468f0"><strong>All Customers</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable1" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">Id</th>
                        {{--                            <th>Customer-id</th>--}}
                        <th style="color:#7468f0;font-size:20px;">Name</th>
                        <th style="color:#7468f0;font-size:20px;">E-mail</th>
                        <th style="color:#7468f0;font-size:20px;">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        let routeName = '{{url('admin/displayDataforcustomers/data')}}';
        $(function()
        {
            $('#dataTable1').DataTable({
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'id', name: 'id' },
                    // { data: 'customer_id', name: 'seller_id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


    </script>
@endpush
