@extends('app');
@section('content')
    <h2 class="sub-header">Create Product</h2>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'products.store']) !!}

    <div class="form-group">
        {!! Form::label('category', 'Category: ') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description: ') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price: ') !!}
        {!! Form::text('price', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('featured', 'Featured: ') !!}
        {!! Form::select('featured', array('Yes' => 'Yes', 'No' => 'No'), 'Yes', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('recommend', 'Recommend: ') !!}
        {!! Form::select('recommend', array('Yes' => 'Yes', 'No' => 'No'), 'Yes', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection