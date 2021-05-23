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
                        <option value="Farming" {{$product->category == 'Farming' ? 'selected' : ''}}>Farming </option>
                        <option value="Chemistry" {{$product->category == 'Chemistry' ? 'selected' : ''}}>Chemistry</option>
                        <option value="Food" {{$product->category == 'Food' ? 'selected' : ''}}>Food</option>
                        <option value="Housework" {{$product->category == 'Housework' ? 'selected' : ''}}>Housework</option>
                        <option value="Car parts" {{$product->category == 'Car parts' ? 'selected' : ''}}>Car parts</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Add Product</button>
                <a class="btn btn-danger" href="{{route('product.index')}}">Back to product list</a>
            </div>
        </div>
    </form>
@endsection