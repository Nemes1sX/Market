@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger users-form alert-box">
            <p class="text-center">Whoops! There were some problems with your input.</p>
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-center">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="text-center">Edit product</h2>
    <form class="products-form" action="{{ route('product.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price</strong>
                    <input type="text" name="price" class="form-control" placeholder="1.00" value="{{ $product->price}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category</strong>
                    <select name="category">
                        <option value="farming" {{$product->category ? 'selected' : ''}}>Farming </option>
                        <option value="chemistry" {{$product->category ? 'selected' : ''}}>Chemistry</option>
                        <option value="food" {{$product->category ? 'selected' : ''}}>Food</option>
                        <option value="housework" {{$product->category ? 'selected' : ''}}>Housework</option>
                        <option value="carparts" {{$product->category ? 'selected' : ''}}>Car parts</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Add Product</button>
            </div>
        </div>
    </form>
@endsection