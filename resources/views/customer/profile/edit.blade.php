@extends('layouts.customer')
@section('content')
    <h2>Update Profile</h2>
    <div class="card">

        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') not found @enderror" name="name"
                               value="{{ $profile->name }}" required autocomplete="name" autofocus>

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
                    <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('About') }}</label>

                    <div class="col-md-6">
                        <input id="about" type="text" class="form-control @error('about') not found @enderror"
                               name="about" value="{{ $profile->about }}" required autocomplete="about" autofocus>

                        @error('about')
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
