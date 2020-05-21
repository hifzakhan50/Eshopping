@extends('layouts.admin')
@section('content')
    <h2>Add product</h2>
    <div class="card">

        <div class="card-body">
            <form method="POST" action="{{ route('products.create') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                    <div class="col-md-6">
                        <select id="category-id" type="text"
                                class="form-control @error('category-id') is-invalid @enderror" name="category-id"
                                value="{{ old('category-id') }}" required autocomplete="category-id" autofocus>

                            <option value="1">Women's Fashion</option>
                            <option value="2">Health&Beauty</option>
                            <option value="3">Electronic Devices</option>
                            <option value="4">Electronic Accessories</option>
                        </select>

                        @error('category-id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                    <div class="col-md-6">
                        <input id="color" type="text" class="form-control @error('color') not found @enderror" name="color" value="{{ old('color') }}" required autocomplete="color" autofocus>

                        @error('color')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>

                    <div class="col-md-6">
                        <select id="size" type="text"
                                class="form-control @error('size') is-invalid @enderror" name="size"
                                value="{{ old('size') }}" required autocomplete="size" autofocus>

                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                            <option value="4">XL</option>
                            <option value="5">XXL</option>
                        </select>

                        @error('role')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
