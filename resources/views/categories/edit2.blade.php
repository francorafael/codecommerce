@extends('app');
@section('content')
    <h2 class="sub-header">Editing Category: {{ $category->name }}</h2>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- 9:20 UPDATE PÒR POST {!! Form::open(['route'=>['categories.update', $category->id], 'method'=>'post']) !!}--}}
    {{--POR PUT - METHOD SPOOFING--}}
    {!! Form::open(['route'=>['categories.update', $category->id], 'method'=>'put']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description: ') !!}
        {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save Category', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection