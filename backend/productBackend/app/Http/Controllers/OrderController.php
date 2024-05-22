<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Vegetables;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('orderItems')->latest()->get();
        return response()->json($orders);
    }


    public function store(Request $request)
    {
        $orderItems = $request->input('items');
        $orderId = $request->input('order_id');
        $orderTotal = $request->input('order_total');
        $order = Order::create([
            'order_id' => $orderId,
            'order_total' =>$orderTotal
        ]);

        foreach ($orderItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'product_name'=> $item['product_name'],
                'product_price' => $item['product_price'],
                'product_quantity' => $item['product_quantity'],
                'product_total' => $item['product_total'],
            ]);
        }

        return response()->json($order->load('orderItems'),201);

    }
}
