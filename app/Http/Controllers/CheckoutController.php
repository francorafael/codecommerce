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
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Requests\CheckoutService;

class CheckoutController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function place(Order $orderModel, OrderItem $orderItem, \PHPSC\PagSeguro\Requests\Checkout\CheckoutService $checkoutService)
    {
        if(!Session::has('cart')) {
            return false;
        }

        if(Auth::check()) {

            $cart = Session::get('cart');

            if ($cart->getTotal() > 0) {

                $checkout = $checkoutService->createCheckoutBuilder();



                $order = $orderModel->create(['user_id' => Auth::User()->id, 'total' => $cart->getTotal()]);
                foreach ($cart->all() as $k => $item) {
                   $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2,".",""), $item['qtd']));
                   $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd'], 'order_id' => $order]);
                }
                $cart->clear();

                event(new CheckoutEvent(Auth::User()->id, $order));

                $response = $checkoutService->checkout($checkout->getCheckout());
                return redirect($response->getRedirectionUrl());
               //return view('store.checkout', compact('order', 'cart'));

            }
        }

        $categories = Category::all();


        return view('store.checkout', ['cart'=>'empty', 'categories'=>$categories]);
    }

    public function test(\PHPSC\PagSeguro\Requests\Checkout\CheckoutService $checkoutService)
    {

        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

       return redirect($response->getRedirectionUrl());

    }

    public function retorno(Request $request, Locator $service, Order $orderModel){

        $transactionId = $request->get('transaction_id');
        $transaction = $service->getByCode($transactionId);
        $orderId = $transaction->getDetails()->getReference();
        return view('store.retorno', compact('orderId'));
    }


}
