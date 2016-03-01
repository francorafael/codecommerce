<?php
/**
 * Created by PhpStorm.
 * User: rafael.franco
 * Date: 26/02/2016
 * Time: 11:34
 */
?>
@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Valor</td>
                            <td class="price">Qtd</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->all() as $k=>$item)
                        <tr>
                            <td class="cart_product"><a href="{{ route('store.product', ['id'=>$k]) }}">Imagem</a> </td>
                            <td class="cart_description"><h4><a href="{{ route('store.product', ['id'=>$k]) }}">{{ $item['name'] }}</a> </h4>
                            <p>Código: <span>{{ $k }}</span></p>
                            </td>
                            <td class="cart_price"> R$ {{ number_format($item['price'],2,",",".") }} </td>
                            <td class="cart_quantity">
                                <input id="inputCartQuantidade" type="number" min="1" value="{{ $item['qtd'] }}" maxlength="3" size="3" class="inputQuantidade"/>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    <span class="price_clean">
                                         R$ {{number_format($item['price'] * $item['qtd'],2,",",".")  }} </span></p> </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_update cart_quantity_delete" id="updateButton">Update</a>
                                <a href="{{ route('cart.destroy', ['id'=>$k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="" colspan="6">Nenhum item encontrado!</td>
                        </tr>
                    @endforelse
                    <tr class="cart_menu"  id="trTotal">
                        <td colspan="6">
                            <div style="text-align:right">
                                <span style="margin-right: 12%" >
                                    TOTAL: R$ <span id="spanTotalFinal">{{ str_replace(".",",",number_format(($cart->getTotal()), 2)) }}</span>
                                </span>
                                <a href="{{ route('checkout.place') }}" class="btn btn-success" style="font-weight: bold">Fechar a conta</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop

