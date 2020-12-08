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
                        <input id="start-date" type="date" min="0" max="100000" class="form-control @error('start-date') not found @enderror"
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
                    <label for="budget" class="col-md-4 col-form-label text-md-right">{{ __('Budget') }}</label>

                    <div class="col-md-6">
                        <input id="budget" type="number" min="0" max="100000" class="form-control @error('budget') not found @enderror"
                               name="budget" value="{{ old('budget') }}" required autocomplete="budget" autofocus>

                        @error('budget')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label.font-weight-bold text-md-right"><strong>{{ __('Ad Group') }}</strong></label>
                </div>

                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                    <div class="col-md-6">
                        <select id="category-id" type="text"
                                class="form-control input-group-lg dynamic @error('category-id') is-invalid @enderror"
                                name="category" dynamic data-dependent="product-id"
                                value="{{ old('category-id') }}" required autocomplete="category-id" autofocus>

                            @foreach($categorys as $category)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>

                            @endforeach

                                <option value="">Select Category</option>
                        </select>

                        @error('category-id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                    <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Product') }}</label>

                        <div class="col-md-6">
                        <select multiple id="product-id" type="text"
                                class="form-control input-group-lg  @error('product-id') is-invalid @enderror"
                                name="product-id"
                                value="{{ old('product-id') }}" required autocomplete="product-id" autofocus>

                            @foreach($products as $product)
                                <option selected value="{{$product->id}}">{{$product->name}}</option>

                            @endforeach
                            <option value="">Select Product</option>
                        </select>

                        @error('product-id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        </div>
                    </div>
                {{csrf_field()}}

{{--                <div class="form-group row">--}}
{{--                    <label for="radiobtn" class="col-md-4 col-form-label text-md-right">{{__('Type')}}</b></label>--}}

{{--                    <div class="col-sm-6">--}}
{{--                        <div class="row">--}}

{{--                            <div class="col-sm-4">--}}
{{--                                <label class="radio-inline">--}}
{{--                                    <input type="radio" id="auto-tar" value="auto-tar" name="auto-tar" required><b>Auto Target</b></label>--}}

{{--                                @error('auto-tar')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="row-cols-sm-4">--}}
{{--                                <label class="radio-inline">--}}
{{--                                    <input type="radio" id="man-tar" value="man-tar" name="man-tar" required><b>Manual Target</b></label>--}}

{{--                                @error('man-tar')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

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
    <script>
        $(document).ready(function ()
        {
            $('.dynamic').change(function () {
                if($(this).val() !='')
                {   var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="token"]').val();
                    $.ajax({
                        url:"{{route('adMan.fetch')}}",+
                        method: "POST",
                        data: {select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $("#"+dependent).html(result)
                        }
                    })
                }
            })
        }
    </script>
    <script>$(document).ready(function () {

            $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
                $(".alert-success").slideUp(500);
            });

        });
    </script>

@endpush
