@extends('layouts.fulNet')
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
        <div class="card-header"><h2 style="color:#7468f0"><strong>Requests</strong></h2></div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered zero-configuration dataTable" id="dataTable5" width="100%"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <th style="color:#7468f0;font-size:20px;">Id</th>
                        <th style="color:#7468f0;font-size:20px;">Invoice No.</th>
                        <th style="color:#7468f0;font-size:20px;">Image</th>
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
        let routeName ='{{url('fulNet/requestManagement/data')}}';
        $(function()
        {
            $('#dataTable5').DataTable({
                processing: true,
                serverSide: true,
                ajax: routeName,
                columns: [
                    { data: 'id', name: 'Id' },
                    { data: 'inv-no', name: 'Invoice No.' },
                    {data: 'image', name: 'Image'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });


    </script>


@endpush

