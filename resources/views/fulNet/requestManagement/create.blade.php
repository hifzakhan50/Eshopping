@extends('layouts.fulNet')
@section('content')
    <h2 style="color:#7468f0"><strong>Add Request details</strong></h2>
    <div class="card">

        <div class="card-body">

            <!-- BEGIN: Create Form-->
            <form method="POST" action="{{ route('requestManagement.create') }}"enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="invoice No" class="col-md-4 col-form-label text-md-right">{{ __('Invoice No') }}</label>

                    <div class="col-md-6">
                        <input id="invoice No" type="text" class="form-control @error('invoice No') is-invalid @enderror" name="Invoice No" value="{{ old('Invoice No') }}" required autocomplete="invoice No" autofocus>

                        @error('Invoice No')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="images-upload" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="images-preview col-md-6 offset-4"></div>
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
@push('script')
    <script>$(document).ready(function () {

            $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
                $(".alert-success").slideUp(500);
            });

        });
    </script>

@endpush
