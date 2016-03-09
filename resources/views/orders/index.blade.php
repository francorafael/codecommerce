@extends('app');

@section('content')
    <div class="container">
        <h3>Orders</h3>

        <table class="table">
            <tbody>
            <tr>
                <th>#ID</th>
                <th>User</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->user->name}}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li>{{$item->product->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>R$ {{number_format($order->total, 2,',','.')}}</td>
                    <td>{{($order->status == 0)?"Em andamento":"Finalizado"}}</td>
                    <td>
                        @if($order->status == 0)
                            <a href="{{route('orders.update', ['id'=>$order->id, 'status'=> '1'])}}" class="btn btn-primary"> Finalizar</a></td>
                        @else
                        <a href="{{route('orders.update', ['id'=>$order->id, 'status'=> '0'])}}" class="btn btn-primary"> Processar</a></td>
                        @endif

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

