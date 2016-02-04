@extends('app');
@section('content')
    <h2 class="sub-header">Categorias</h2>
    <div class="row"><a href="{{ route('categories.create') }}" class="pull-right btn btn-default">New Category</a></div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['id'=>$category->id]) }}">Edit</a>
                        <a href="{{ route('categories.destroy', ['id'=>$category->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $categories->render() !!}
    </div>
@endsection