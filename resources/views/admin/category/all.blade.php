@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header"><h2>Categories</h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
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
        let routeName = '{{url('admin/category/data')}}';
        $(function()
        {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


    </script>


@endpush

