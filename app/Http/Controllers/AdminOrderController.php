<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function index(){

        $array=array();
        $count=0;
        $orders = Order::orderBy('id', 'DESC')->get();
        //$orders=Order::where('user_id','=',$user->id)->get();
        foreach ($orders as $order){
            $users=$order->user()->get();
            foreach ($users as $user){
                    $array=Arr::add($array,$count,[
                        'order_id'=>$order->id,
                        'order_status'=>$order->status,
                        'order_user'=>$user->name,
                    ]);
                    $count++;
            }
        }
        $data = [
            'array'=>$array,
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
        $order->delete();
        return redirect()->route('admin.orders.index');
    }

        public function refund(Order $order)
    {

        $user=Auth::user();
        $order->update([
            'event_id'=>$order->event_id,
            'user_id'=>$user->id,
            'status'=>2,
        ]);

        return redirect()->route('admin.orders.index');
    }
}
