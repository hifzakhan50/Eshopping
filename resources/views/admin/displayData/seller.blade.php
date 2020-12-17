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
            <div class="card-header"><h2>Sellers</h2></div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
{{--                            <th>Seller-id</th>--}}
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
@endsection

 @push('script')
        <script>
            let routeName = '{{url('admin/displayDataforsellers/data')}}';
            $(function()
            {
                $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: routeName,
                    columns: [
                        { data: 'id', name: 'id' },
                        // { data: 'seller_id', name: 'seller_id' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ]
                });
            });


        </script>
@endpush
