@extends('layouts.seller')
@section('content')


    <div class="card">
        <div class="card-header"><h2>All Campaigns</h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Campaign</th>
                        <th>Starting Date</th>
                        <th>Ending date</th>
                        <th>Budget</th>
{{--                        <th>Active<input data-id="{{$posts[$i]->id}}" class="toggle-class" type=""--}}
{{--                                         data-onstyle="success" data-offstyle="danger" data-toggle="toggle"--}}
{{--                                         data-on="Active" data-off="InActive" {{ $posts[$i]->status ? 'checked' : '' }}></th>--}}
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
                ajax: '{{url('/seller/adMan/data')}}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'start-date', name: 'start-date'},
                    {data: 'end-date', name: 'end-date'},
                    {data: 'budget', name: 'budget'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });

    </script>
@endpush
