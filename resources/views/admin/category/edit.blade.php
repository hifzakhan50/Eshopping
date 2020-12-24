@extends('layouts.admin')
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
            <h2>Edit Category</h2>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('category.update',$cat->id ) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $cat->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                        <input id="description" type="text Area" class="form-control @error('description') not found @enderror" name="description" value="{{$cat->description }}" required autocomplete="description" autofocus>

                        @error('description')
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
