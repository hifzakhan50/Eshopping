@extends('layouts.admin')
@section('content')
    <h1>Seller Details</h1>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <tbody>
            <tr><th>ID</th>
                <th>Name</th>
                <th>Description</th></tr>
            @foreach($seller as $s)
                <tr>
                    <td>
                        {{$s->id}}
                    </td>
                    <td>
                        {{$s->name}}
                    </td>
                    <td>
                        {{$s->about}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
