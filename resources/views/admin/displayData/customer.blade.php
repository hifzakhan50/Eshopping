@extends('layouts.admin')
@section('content')
    <h1>Customer Details</h1>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <tbody>
            <tr><th>ID</th>
                <th>Name</th>
                <th>Address</th></tr>
            @foreach($customer as $c)
                <tr>
                    <td>
                        {{$c->id}}
                    </td>
                    <td>
                        {{$c->name}}
                    </td>
                    <td>
                        {{$c->address}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
