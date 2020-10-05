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
            <h2>Edit product</h2>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                    <div class="col-md-6">
                        <select id="category-id" type="text"
                                class="form-control @error('category-id') is-invalid @enderror" name="category-id"
                                value="{{ $product->category_id }}" required autocomplete="category-id" autofocus>

                            @foreach($categories as $category)

                                @if($product->category_id == $category->id)
                                    <option selected value="{{$category->id}}">{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach

                        </select>

                        @error('category-id')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

                    <div class="col-md-6">
                        <input id="sku" type="text" class="form-control @error('sku') not found @enderror" name="sku" value="{{$product->sku }}" required autocomplete="sku" autofocus>

                        @error('sku')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

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
                        <input id="description" type="text Area" class="form-control @error('description') not found @enderror" name="description" value="{{$product->description }}" required autocomplete="description" autofocus>

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                    <div class="col-md-6">
                        <input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ $product->color}}" required autocomplete="color" autofocus>

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
                                value="{{ $product->size }}" required autocomplete="size" autofocus>

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
                <div class="form-group row">
                    <label for="weight" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }}</label>

                    <div class="col-md-6">
                        <input id="weight" type="text" class="form-control @error('weight')is-invalid @enderror" name="weight" value="{{ $product->weight }}" required autocomplete="weight" autofocus>

                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                    <div class="col-md-6">
                        <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $product->quantity }}" required autocomplete="quantity" autofocus>

                        @error('quantity')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                        <input id="price" type="number" min="0" max="100000" class="form-control @error('price') not found @enderror"
                               name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        <input id="images-upload" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $product->image}}" required autocomplete="image" autofocus>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="images-preview col-md-6 offset-4">
                        <img src="{{ getImageSrc($product->image) }}" class="w-25">
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
