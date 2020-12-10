@extends('layouts.customer')
@section('content')
<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
    <h3>{{session('success')}}</h3>
    </div>
    @endif

    <h2>My Ads</h2>
    <div class="row">
    <a style="margin: 20px 0; background-color: #7783f3!important;" class="btn btn-success" href="#popupmain">Create Ad</a>

    <div id="popupmain" class="overlay11 light11">
        <a class="cancel" href="#"></a>
        <div class="popup">
            <h2>Create Ad</h2>
            <a class="close" href="#">&times;</a>
            <div>

            <form action="/addnewad" method="post">
            @csrf
            <input type="number" name="id" hidden>
              <label style="margin-top: 10px" for="name">Name: </label>
              <input class="form-control" type="text" name="name">

              <label style="margin-top: 10px" for="startdate">Start Date: </label>
              <input class="form-control" type="date" name="startdate">

              <label style="margin-top: 10px" for="enddate">End Date: </label>
              <input class="form-control" type="date" name="enddate">

              <label style="margin-top: 10px" for="budget">Budget: </label>
              <input class="form-control" type="number" name="budget">

              <button style="margin-top: 10px; float: right" class="btn btn-primary" type="submit">Create</button>
            </form>
              </div>
        </div>
    </div>
    </div>
    <div style="background: white; padding: 20px; border-radius: 10px;" class="row">
        @if($ads->isEmpty())
            <h4>No Ad Found.</h4>

        @else
            <table class="table">
                <thead>
                    <tr class="th">
                        <th>Ad Name</th>
                        <th>Starting Date</th>
                        <th>Ending Date</th>
                        <th>Budget</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    @foreach ($ads as $ad)
                    <td>{{$ad->name}}</td>
                    <td>{{$ad->Starting_Date}}</td>
                    <td>{{$ad->Ending_Date}}</td>
                    <td>{{$ad->Budget}}</td>
                    @if($ad->is_active == 1)
                    <td style="color: green">Active</td>
                    @else
                    <td style="color: red">Deactivated</td>
                    @endif
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
