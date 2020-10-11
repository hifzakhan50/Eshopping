@extends('layouts.seller')
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
        <div class="card-header">
            <h2>Create Campaign</h2>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('adManCreate') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start-date" class="col-md-4 col-form-label text-md-right">{{ __('Start-date') }}</label>

                    <div class="col-md-6">
                        <input id="start-date" type="date" class="form-control @error('start-date') not found @enderror"
                               name="start-date" value="{{ old('start-date') }}" required autocomplete="start-date" autofocus>

                        @error('start-date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div><div class="form-group row">
                    <label for="start-date" class="col-md-4 col-form-label text-md-right">{{ __('Start-date') }}</label>

                    <div class="col-md-6">
                        <input id="start-date" type="date" class="form-control @error('start-date') not found @enderror"
                               name="start-date" value="{{ old('start-date') }}" required autocomplete="start-date" autofocus>

                        @error('start-date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="end-date" class="col-md-4 col-form-label text-md-right">{{ __('End-date') }}</label>

                    <div class="col-md-6">
                        <input id="end-date" type="date" min="0" max="100000" class="form-control @error('end-date') not found @enderror"
                               name="end-date" value="{{ old('end-date') }}" required autocomplete="end-date" autofocus>

                        @error('end-date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                        <input id="price" type="number" min="0" max="100000" class="form-control @error('price') not found @enderror"
                               name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script>$(document).ready(function () {

            $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
                $(".alert-success").slideUp(500);
            });

        });
    </script>

@endpush
