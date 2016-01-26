@extends('app');
@section('content')
    <h2 class="sub-header">Editing Product: {{ $product->name }}</h2>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- 9:20 UPDATE PÒR POST {!! Form::open(['route'=>['categories.update', $category->id], 'method'=>'post']) !!}--}}
    {{--POR PUT - METHOD SPOOFING--}}
    {!! Form::open(['route'=>['products.update', $product->id], 'method'=>'put']) !!}


    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description: ') !!}
        {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('price', 'Price: ') !!}
        {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('featured', 'Featured: ') !!}
        {!! Form::select('featured', array('Yes' => 'Yes', 'No' => 'No'), $product->featured, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('recommend', 'Recommend: ') !!}
        {!! Form::select('recommend', array('Yes' => 'Yes', 'No' => 'No'), $product->recommend, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save Category', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection