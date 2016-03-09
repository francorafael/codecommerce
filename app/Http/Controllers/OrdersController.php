<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Order;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class OrdersController extends Controller
{

    private $orderModel;

    public function __construct(Order $orderModel) {
        $this->orderModel = $orderModel;
    }

    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function update($id, $value)
    {
        $this->orderModel->find($id)->update(['status' => $value]);
        return redirect()->route('orders');
    }
}
