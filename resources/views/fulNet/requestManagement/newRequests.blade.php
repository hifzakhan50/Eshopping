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
        <div class="card-header"><h2>Active Requests</h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Invoice Number</th>
                        <th>Image</th>
                        <th>Status</th>
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

        $(function () {
            $('#dataTable').dataTable({
                processing: true,
                serverSide: true,
                ajax: '{{url('/newrequestsall')}}',
                columns: [
                    {data: 'id', name: 'ID'},
                    {data: 'inv_no', name: 'inv_no'},
                    {data: 'image', name: 'image'},
                    {data: 'is_active', name: 'is_active'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

    </script>
@endpush
