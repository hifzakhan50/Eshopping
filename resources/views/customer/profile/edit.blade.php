@extends('layouts.customer')
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
            <h2>Update Profile</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="/customerprofileupdate" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') not found @enderror" name="name"
                               value="{{ $profile->name}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                    <div class="col-md-6">
                        <input id="adress" type="text" class="form-control @error('adress') not found @enderror"
                               name="adress" value="{{ $profile->address }}" required autocomplete="adress" autofocus>

                        @error('adress')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>


                    <div class="col-md-6">
                        <select id="country" type="text"
                                class="form-control @error('country') is-invalid @enderror" name="country"
                                value="{{ old('country') }}" required autocomplete="size" autofocus>

                            <option value="Pakistan">Pakistan</option>
                            <option value="China">China</option>
                            <option value="America">America</option>
                            <option value="Saudia Arabia">Saudia Arabia</option>
                            <option value="Malaysia">Malaysia</option>
                        </select>
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') not found @enderror"
                               name="city" value="{{ $profile->city }}" required autocomplete="city" autofocus>

                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control @error('image') Is-invalid @enderror"
                               name="image" value="" required autocomplete="image" autofocus>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>

            </form>
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

