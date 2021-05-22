@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert col-lg-9 alert-success alert-box templates">
            <p class="text-center">{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert col-lg-9 alert-danger alert-box customers">
            <p class="text-center">{{ $message }}</p>
        </div>
        @endif
        <div class="col-lg-9 center-table">
            <a class="btn btn-success" href="{{route('product.create')}}">Create Product</a>
            <table class="table table-bordered table-responsive-lg">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Seller</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @forelse ($products as $product)
                    <tbody>
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->user->name}}</td>
                        <td>
                            <div class="input-group">
                                <form action="{{route('product.destroy', $product)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" title="delete"
                                            onclick="return confirm('Are you sure to delete');"
                                    >
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                    </button>
                                </form>
                                <a href="{{route('product.edit',$product)}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                @empty
            </table>
                <h2>No products!</h2>
            @endforelse
            {{ $products->links() }}
        </div>
@endsection