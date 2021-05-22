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
<h2 class="text-center">Create product</h2>
<form class="products-form" action="{{ route('product.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price</strong>
                <input type="text" name="price" class="form-control" placeholder="1.00" value="{{old('price')}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category</strong>
                <select name="category">
                    <option value="farming">Farming </option>
                    <option value="chemistry">Chemistry</option>
                    <option value="food">Food</option>
                    <option value="housework">Housework</option>
                    <option value="carparts">Car parts</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success">Add User</button>
        </div>
    </div>
</form>
@endsection
