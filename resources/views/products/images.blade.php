@extends('app');
@section('content')
    <h2 class="sub-header">Images of {{$product->name}}</h2>
    <div class="row"><a href="{{ route('products.images.create', ['id'=>$product->id]) }}" class="pull-right btn btn-default">New Image</a></div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Image</th>
                <th>Extension</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}" width="80" /> </td>
                    <td>{{ $image->extension }}</td>
                    <td>
                        <a href="{{route('products.images.destroy', ['id'=>$image->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('products') }}" class="btn btn-default">Voltar</a>
    </div>
@endsection