@extends('app');
@section('content')
    <h2 class="sub-header">Produtos</h2>
    <div class="row"><a href="{{ route('products.create') }}" class="pull-right btn btn-default">New Product</a></div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Recommend</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->featured }}</td>
                    <td>{{ $product->recommend }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id'=>$product->id]) }}">Edit</a>
                        <a href="{{ route('products.destroy', ['id'=>$product->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products->render() !!}
    </div>
@endsection