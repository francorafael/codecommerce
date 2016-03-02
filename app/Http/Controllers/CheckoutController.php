<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if(!Session::has('cart')) {
            return false;
        }

        if(Auth::check()) {

            $cart = Session::get('cart');

            if ($cart->getTotal() > 0) {

                $order = $orderModel->create(['user_id' => Auth::User()->id, 'total' => $cart->getTotal()]);
                foreach ($cart->all() as $k => $item) {
                    $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd'], 'order_id' => $order]);
                }
                $cart->clear();

                event(new CheckoutEvent());

                return view('store.checkout', compact('order', 'cart'));
            }
        }

        $categories = Category::all();



        return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);
    }

}
