@extends('layouts.frontend')
@section('content')
    <div style="width: 100%; text-align: center;">
    <img width="180px" src="{{ URL::to('/assets/potos/greentick.png') }}" />
    </div>
<h1 style="text-align: center; margin-top:50px; font-family:Helvetica Neue, Helvetica, Arial, sans-serif;font-size: large;">
    <strong>YOU HAVE SUCCESSFULLY PLACED YOUR ORDER</strong>
</h1>
        <button type="button" onclick="location.href='{{ url('home') }}'" style="margin-top:20px;margin-left:550px ;padding-top:5px; padding-bottom: 5px;
    position: relative;border-color:#7367f0;border-width: 4px;border-radius: 4px; color: black;font-size: 1.5em;">
           <strong>{{ __('Continue Shopping') }}</strong>
        </button>
@endsection
