<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;
            $order->save();
        }

        return view('orders.show', compact('order', 'snapToken'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}


// namespace App\Http\Controllers;

// use App\Models\Order;
// use Illuminate\Http\Request;

// class OrderController extends Controller
// {
//     //
//     public function index()
//     {
//         return view('home');
//     }

//     public function checkout(Request $request)
//     {
//         $request->request->add([
//             'total_price' => $request->qty * 1000000,
//             'status' => 'Unpaid'
//         ]);
//         $order = Order::create($request->all());

//         // Set your Merchant Server Key
//         \Midtrans\Config::$serverKey = config('midtrans.merchan_id');
//         // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
//         \Midtrans\Config::$isProduction = config('midtrans.is_production');
//         // Set sanitization on (default)
//         \Midtrans\Config::$isSanitized = true;
//         // Set 3DS transaction for credit card to true
//         \Midtrans\Config::$is3ds = true;

//         $params = array(
//             'transaction_details' => array(
//                 'order_id' => $order->id,
//                 'gross_amount' => $order->total_price,
//             ),
//             'customer_details' => array(
//                 'name' => $request->name,
//                 'phone' => $request->phone,
//             ),
//         );

//         $snapToken = \Midtrans\Snap::getSnapToken($params);
//         dd($snapToken);
//         return view('checkout', compact('snapToken','order'));
//     }
// }
