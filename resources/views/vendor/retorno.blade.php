@extends('store.store')
@section('categories')
    @include('store.partial.categories')
@stop
@section('content')
    <div class="col-sm-9 padding-right">
        @if ($cart == 'empty')
            <h3>Carrinho de compras vazio.</h3>
        @else
            <h3>Retorno do pedido</h3>
            <p>Dados da order #{{ $orderId}}, sendo contabilizado no pagseguro.</p>
        @endif
    </div>
@stop