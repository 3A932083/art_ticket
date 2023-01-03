<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('id', 'DESC')->get();//取得資料庫中的欄位值，以陣列的方式

        $data=[
            'orders'=>$orders
        ];
        return view('admin.orders.index',$data);
    }
    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {

        //將檔案名稱存至DB
        Order::create([
          'status'=>$request->status,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,

        ]);
        //回到傳送資料來的頁面
        return redirect()->route('admin.orders.index');

    }

    public function show(Order $order)
    {

        $data=[
            'order'=>$order,

        ];
        return view('admin.orders.show',$data);
    }

    public function edit(Order $order)
    {
        $data=[
            'order'=>$order,
        ];
        return view('admin.orders.edit',$data);
    }

    public function update(Request $request, Order $order)
    {

        $order->update([
            'status'=>$request->status,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,

        ]);
        return redirect()->route('admin.orders.index');
    }

    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect()->route('admin.orders.index');
    }
}
