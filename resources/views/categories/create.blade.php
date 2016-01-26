@extends('app');
@section('content')
    <h2 class="sub-header">Create Category</h2>
    @if($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'categories.store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Description: ') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection