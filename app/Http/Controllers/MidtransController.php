<?php

namespace App\Http\Controllers;

use App\Models\Order;
// use App\Models\Project;
// use App\Models\ProjectPendanaan;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use Midtrans\Transaction;
use Midtrans\Config;
use TourBookingsPayments;
use Uasoft\Badaso\Helpers\ApiResponse;

class MidtransController extends Controller
{

    protected $serverKey;
    protected $clientKey;
    protected $isProduction;
    protected $isSanitized;
    protected $is3ds;

    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->clientKey = config('midtrans.client_key');
        $this->isProduction = config('midtrans.is_production');
        $this->isSanitized = config('midtrans.is_sanitized');
        $this->is3ds = config('midtrans.is_3ds');

        $this->_configureMidtrans();
    }

    public function _configureMidtrans()
    {
        Config::$serverKey = $this->serverKey;
        Config::$clientKey = $this->clientKey;
        Config::$isProduction = $this->isProduction;
        Config::$isSanitized = $this->isSanitized;
        Config::$is3ds = $this->is3ds;

        // \Midtrans\Config::$serverKey = $this->serverKey;
        // \Midtrans\Config::$clientKey = $this->clientKey;
        // \Midtrans\Config::$isProduction = $this->isProduction;
        // \Midtrans\Config::$isSanitized = $this->isSanitized;
        // \Midtrans\Config::$is3ds = $this->is3ds;
    }

    public function finish()
    {
        // dd(request()->order_id);
        return redirect("http://localhost:8080/#/tour/payment-detail/" . request()->order_id);
        return view('midtrans.finish');
    }

    public function unfinish()
    {
        dd(request());
        return view('midtrans.unfinish');
    }

    public function error()
    {
        dd(request());
        return view('midtrans.error');
    }


    public function notifikasi(Request $request)
    {

        /*
        'transaction_time' => '2021-11-04 10:52:14',
        'transaction_status' => 'settlement',
        'transaction_id' => 'd6db01ff-53e7-4170-b08b-0ae324cafbd3',
        'status_message' => 'midtrans payment notification',
        'status_code' => '200',
        'signature_key' => '064737914b8037f0b95a0e8e98683838dd7412833dd848500f2dcd9e92b646aed4333fcd12465d90256441a7aa17fe88a085a4110396b652549e7fb0a2d58db2',
        'settlement_time' => '2021-11-04 10:52:41',
        'payment_type' => 'akulaku',
        'order_id' => 'TERA-fd773b47-b84c',
        'merchant_id' => 'G430091907',
        'gross_amount' => '730000.00',
        'fraud_status' => 'accept',
        'currency' => 'IDR',

        {
        "transaction_time": "2022-12-17 14:44:20",
        "transaction_status": "settlement",
        "transaction_id": "e70d0cf3-10d8-4702-966c-c5a97c459c63",
        "status_message": "midtrans payment notification",
        "status_code": "200",
        "signature_key": "85cff90cec1ca1cf0fc8e2254f6dac9544a36de867b1ab93cdd738ff330e64925d05eb26c4d4633a6f02b8b89f7fc97e7fad6ec2eb32fd2ebe4e34992ea31e2b",
        "settlement_time": "2022-12-17 14:44:23",
        "payment_type": "bca_klikpay",
        "order_id": "46061658",
        "merchant_id": "G381075616",
        "gross_amount": "270000.00",
        "fraud_status": "accept",
        "currency": "IDR",
        "approval_code": "112233"
        }
        */

        // {
        //     "transaction_time": "2024-08-29 20:34:49",
        //     "transaction_status": "capture",
        //     "transaction_id": "fc345fab-2d02-4d66-9b88-aca25cd759a8",
        //     "status_message": "midtrans payment notification",
        //     "status_code": "200",
        //     "signature_key": "9c49c52be1e7676a2ca51b01a3f8174ac0215dd94e07d2d807846e08e0511137f151a4436b2355c05bb670ac6fcf926377f3f995486bb78b4923b4e53a1e9b0b",
        //     "payment_type": "credit_card",
        //     "order_id": "TOUR-933040c9-4613",
        //     "metadata": {
        //     },
        //     "merchant_id": "G381075616",
        //     "masked_card": "48111111-1114",
        //     "gross_amount": "70290000.00",
        //     "fraud_status": "accept",
        //     "expiry_time": "2024-09-06 20:34:49",
        //     "currency": "IDR",
        //     "channel_response_message": "Approved",
        //     "channel_response_code": "00",
        //     "card_type": "credit",
        //     "bank": "cimb",
        //     "approval_code": "1724938489586"
        //   }

        $notification_body = json_decode($request->getContent(), true);

        Log::info($notification_body);
        Log::info($request->segment(2));


        $order_id           = $notification_body['order_id'];
        $transaction_time   = $notification_body['transaction_time'];
        $transaction_status = $notification_body['transaction_status'];
        $transaction_id     = $notification_body['transaction_id'];
        $status_message     = $notification_body['status_message'];
        $status_code        = $notification_body['status_code'];
        $payment_type       = $notification_body['payment_type'];
        $gross_amount       = $notification_body['gross_amount'];
        $fraud_status       = $notification_body['fraud_status'];

        if (str_contains($order_id, 'TOUR')) {
            TourBookingsPayments::where('order_id', $order_id)
                ->update([
                    'transaction_time'      => $transaction_time,
                    'transaction_status'    => $transaction_status,
                    'transaction_id'        => $transaction_id,
                    'status_message'        => $status_message,
                    'status_code'           => $status_code,
                    'payment_type'          => $payment_type,
                    'gross_amount'          => $gross_amount,
                    'fraud_status'          => $fraud_status,
                    'payload'               => $notification_body,
                ]);
        }


        // $data = $this->getDataDetail($slug, $request->id);
        $data = TourBookingsPayments::with([
            // 'tourStores',
            'badasoUser',
            'tourBookingItem.tourBookingPayments' => function ($q) {
                return $q->where('transaction_status', 'capture');
            },
            'tourBooking',
            'tourStore',
            'tourProduct' => function ($q) {
                return $q;
                // return $q->select('id','category','durasi');
            },
            // 'tourStore.badasoUsers',
            // 'tourStore.tourProduct',
            // 'tourStore.tourProducts',
            // 'tourStore.tourBooking',
            // 'tourStore.tourBookings',
            // 'tourPrice',
            // 'tourPrices',
            // 'ratingAvg',
        ])->whereOrderId($order_id)->first();

        return ApiResponse::onlyEntity($data);


        return;





        $notification_body['from'] = $request->getContent();





        return $order_id;
        Order::updateOrCreate([
            'number'                => $notification_body['order_id']
        ], [
            'payment_status'        => $notification_body['transaction_status'] == 'capture' ? 2 : 1,
            'transaction_id'        => $notification_body['transaction_id'],
            'payload'               => $notification_body
        ]);

        return Order::where('number', $notification_body['order_id'])->first();

        try {
            DB::table('midtrans_notification')->insert([
                'payload' => $request->getContent(),
                'from' => $request->segment(2)
            ]);
        } catch (\Throwable $th) {
            DB::table('midtrans_notification')->insert(['payload' => $th]);
        }
        return;


        $order_id           = $notification_body['order_id'];
        $transaction_id     = $notification_body['transaction_id'];
        $settlement_time    = $notification_body['transaction_time'];
        $transaction_status = $notification_body['transaction_status'];
        $payment_type       = $notification_body['payment_type'];
        $currency           = $notification_body['currency'];

        Order::updateOrCreate([
            'number'              => $order_id
        ], [
            'payload'               => $notification_body
        ]);

        ProjectPendanaan::updateOrCreate([
            'order_id'              => $order_id
        ], [
            'order_id'              => $order_id,
            'transaction_id'        => $transaction_id,
            'settlement_time'       => $settlement_time,
            'payment_status'        => $transaction_status,
            'payment_type'          => $payment_type,
            'currency'              => $currency,
            'payload'               => $notification_body
        ]);

        // Log::info($notification_body);
    }


    public function notification2(Request $req)
    {
        try {
            $notification_body = json_decode($req->getContent(), true);
            $invoice = $notification_body['order_id'];
            $transaction_id = $notification_body['transaction_id'];
            $status_code = $notification_body['status_code'];
            $order = Order::where('number', $invoice)->where('transaction_id', $transaction_id)->first();
            if (!$order)
                return ['code' => 0, 'messgae' => 'Terjadi kesalahan | Pembayaran tidak valid'];
            switch ($status_code) {
                case '200':
                    $order->status = "SUCCESS";
                    break;
                case '201':
                    $order->status = "PENDING";
                    break;
                case '202':
                    $order->status = "CANCEL";
                    break;
            }
            $order->save();
            return response('Ok', 200)->header('Content-Type', 'text/plain');
        } catch (\Exception $e) {
            return response('Error', 404)->header('Content-Type', 'text/plain');
        }
    }

    // public function show(Order $order)
    public function show($id)
    {
        $order = Order::find($id);
        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database
            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;

            $order->save();
        }
        return compact('order', 'snapToken');
        // return view('midtrans.show', compact('order', 'snapToken'));
    }


    public function notifikasi3(Request $request)
    {

        /*
        'transaction_time' => '2021-11-04 10:52:14',
        'transaction_status' => 'settlement',
        'transaction_id' => 'd6db01ff-53e7-4170-b08b-0ae324cafbd3',
        'status_message' => 'midtrans payment notification',
        'status_code' => '200',
        'signature_key' => '064737914b8037f0b95a0e8e98683838dd7412833dd848500f2dcd9e92b646aed4333fcd12465d90256441a7aa17fe88a085a4110396b652549e7fb0a2d58db2',
        'settlement_time' => '2021-11-04 10:52:41',
        'payment_type' => 'akulaku',
        'order_id' => 'TERA-fd773b47-b84c',
        'merchant_id' => 'G430091907',
        'gross_amount' => '730000.00',
        'fraud_status' => 'accept',
        'currency' => 'IDR',

        {
        "transaction_time": "2022-12-17 14:44:20",
        "transaction_status": "settlement",
        "transaction_id": "e70d0cf3-10d8-4702-966c-c5a97c459c63",
        "status_message": "midtrans payment notification",
        "status_code": "200",
        "signature_key": "85cff90cec1ca1cf0fc8e2254f6dac9544a36de867b1ab93cdd738ff330e64925d05eb26c4d4633a6f02b8b89f7fc97e7fad6ec2eb32fd2ebe4e34992ea31e2b",
        "settlement_time": "2022-12-17 14:44:23",
        "payment_type": "bca_klikpay",
        "order_id": "46061658",
        "merchant_id": "G381075616",
        "gross_amount": "270000.00",
        "fraud_status": "accept",
        "currency": "IDR",
        "approval_code": "112233"
        }
        */

        $notification_body = json_decode($request->getContent(), true);
        \Log::info($notification_body);
        \Log::info($request->segment(2));
        $notification_body['from'] = $request->getContent();

        Order::updateOrCreate([
            'number'                => $notification_body['order_id']
        ], [
            'payment_status'        => $notification_body['transaction_status'] == 'capture' ? 2 : 1,
            'transaction_id'        => $notification_body['transaction_id'],
            'payload'               => $notification_body
        ]);

        return Order::where('number', $notification_body['order_id'])->first();

        try {
            DB::table('midtrans_notification')->insert([
                'payload' => $request->getContent(),
                'from' => $request->segment(2)
            ]);
        } catch (\Throwable $th) {
            DB::table('midtrans_notification')->insert(['payload' => $th]);
        }
        return;


        $order_id           = $notification_body['order_id'];
        $transaction_id     = $notification_body['transaction_id'];
        $settlement_time    = $notification_body['transaction_time'];
        $transaction_status = $notification_body['transaction_status'];
        $payment_type       = $notification_body['payment_type'];
        $currency           = $notification_body['currency'];

        Order::updateOrCreate([
            'number'              => $order_id
        ], [
            'payload'               => $notification_body
        ]);

        ProjectPendanaan::updateOrCreate([
            'order_id'              => $order_id
        ], [
            'order_id'              => $order_id,
            'transaction_id'        => $transaction_id,
            'settlement_time'       => $settlement_time,
            'payment_status'        => $transaction_status,
            'payment_type'          => $payment_type,
            'currency'              => $currency,
            'payload'               => $notification_body
        ]);

        // Log::info($notification_body);
    }

    public function history($project_id)
    {

        $posts = ProjectPendanaan::query()
            // ->where('user_id', auth()->user()->id)
            ->where('project_id', $project_id)
            ->orderBy('id', 'desc')
            ->paginate(20);

        $host = host();

        return Resolver([
            'signiture' => Signature(),
            'informasi' => Informasi('history', 'Proyek_ApiController', 'get', 1, 200),
            'payload'   => compact('posts', 'host'),
        ]);
    }

    public function order(Request $request, $id)
    {

        $id = request()->id;
        $order = 10; //request()->order;
        // $saya_setuju = request()->saya_setuju;

        // $form =  [
        //     'id'            => request()->id,
        //     'saya_setuju'   => request()->saya_setuju,
        //     'order'         => request()->order,
        //     'recaptcha'     => request()->recaptcha,
        // ];

        // $validator = Validator::make($form, [
        //     'id'            => 'required',
        //     'saya_setuju'   => 'required',
        //     'recaptcha'     => request()->cordova == true ? '' : 'required|captcha',
        // ]);

        // if ($validator->fails()) {
        //     return Resolver([
        //         'signiture' => Signature(),
        //         'informasi' => Informasi('order', 'Proyek_ApiController', 'post', -1, 500, 'Formulir bermasalah'),
        //         'payload'   => $validator->messages(),
        //     ], 500);
        // }

        $post = Project::where('id', $id)
            // ->with('user', 'pribadi')
            ->first();
        // $jumlah_unit = $post->jumlah_unit;

        // $didanai = \DB::table('projects_pendanaan_total')
        //     ->where('payment_status', 'settlement')
        //     ->where('project_id', $id)->first();

        // $unit_settlement = 0; // belum ada yang pernah beli

        // if ($didanai) {
        //     $unit_settlement = $didanai->unit; // jumlah unit yang sudah dibeli
        // }

        // $sisa_unit = $jumlah_unit - $unit_settlement;

        // $validator = Validator::make($form, [
        //     'order'         => 'required|integer|lte:' . $sisa_unit,
        // ]);

        // if ($validator->fails()) {
        //     return Resolver([
        //         'signiture' => Signature(),
        //         'informasi' => Informasi('order', 'Proyek_ApiController', 'post', -1, 500, 'Formulir bermasalah'),
        //         'payload'   => $validator->messages(),
        //     ], 500);
        // }

        // \Midtrans\Config::$serverKey = $this->serverKey;
        // \Midtrans\Config::$clientKey = $this->clientKey;
        // \Midtrans\Config::$isProduction = $this->isProduction;
        // \Midtrans\Config::$isSanitized = $this->isSanitized;
        // \Midtrans\Config::$is3ds = $this->is3ds;

        // $snapToken = $post->snap_token;

        $uuid = uuid();
        $uuid = (explode("-", $uuid));
        $order_id = 'TERA-' . $uuid[0] . '-' . $uuid[1];

        // if (!$snapToken) {

        $params = [
            'transaction_details' => [
                'order_id'      => $order_id,
                'gross_amount'  => round($post->nilai_unit * $order),
            ],
            'item_details' => [
                [
                    'id'        => $post->id,
                    'price'     => round($post->nilai_unit),
                    'quantity'  => round($order),
                    'name'      => mb_strimwidth($post->title, 0, 50, "..."),
                ],
                [
                    'id' => 1, // primary key produk
                    'price' => '150000', // harga satuan produk
                    'quantity' => 1, // kuantitas pembelian
                    'name' => 'Flashdisk Toshiba 32GB', // nama produk
                ],
                [
                    'id' => 2,
                    'price' => '60000',
                    'quantity' => 2,
                    'name' => 'Memory Card VGEN 4GB',
                ],
            ],
            // 'customer_details' => [
            //     'first_name'    => $post->pribadi->nama_depan,
            //     'last_name'     => $post->pribadi->nama_belakang,
            //     'email'         => $post->user->email,
            //     'phone'         => $post->pribadi->telepon,
            // ],
            'customer_details' => [
                // Key `customer_details` dapat diisi dengan data customer yang melakukan order.
                'first_name' => 'Martin Mulyo Syahidin',
                'email' => 'mulyosyahidin95@gmail.com',
                'phone' => '081234567890',
            ]
        ];

        // return $params;
        $snapToken = Snap::getSnapToken($params);
        // return ($snapToken);

        $formulir = [
            'order_id'         => $order_id,
            'snap_token'       => $snapToken,
            // 'user_id'          => auth()->check() ? auth()->user()->id : '1',
            'project_id'       => $post->id,
            'unit'             => $order,
            'total_price'      => $post->nilai_unit * $order,
            // 'saya_setuju'      => $saya_setuju,
        ];

        ProjectPendanaan::updateOrCreate([
            'order_id'         => $order_id
        ], $formulir);
        // }

        return Resolver([
            // 'signiture' => Signature(),
            // 'informasi' => Informasi('register', 'Proyek_ApiController', 'post', 0, 200, ''),
            'payload'   => [
                'status'     => 'Pembelian unit diproses',
                'snap_token' => $snapToken,
                'order_id'   => $order_id,
            ],
        ]);

        // $status = \Midtrans\Transaction::status($post->order_id);

        // if($status->status_code == 200) {
        //     ProjectPendanaan::updateOrCreate([
        //         'order_id'         => $order_id
        //     ],[
        //         'order_id'         => $order_id
        //         'transaction_id'   => $status->transaction_id,
        //         'user_id'          => auth()->user()->id,
        //         'payment_status'   => $status->transaction_status,
        //         'settlement_time'  => $status->settlement_time,
        //         'project_id'       =>


        //         'unit'             =>
        //         'total_price'      =>
        //     ]);
        // }


    }

    // MENGUBAH STATUS TRANSAKSI DI SERVER BERDASARKAN MIDTRANS
    public function validasi($order_id)
    {
        // \Midtrans\Config::$serverKey = \Config::get('midtrans.server_key');
        // \Midtrans\Config::$clientKey = \Config::get('midtrans.client_key');
        // \Midtrans\Config::$isProduction = \Config::get('midtrans.is_production');
        // \Midtrans\Config::$isSanitized = \Config::get('midtrans.is_sanitized');
        // \Midtrans\Config::$is3ds = \Config::get('midtrans.is_3ds');

        $posts = ProjectPendanaan::query()
            // ->where('user_id', auth()->user()->id)
            // ->where('id', $id)
            ->where('order_id', $order_id)
            ->orderBy('id', 'desc')
            ->first();

        $host = host();

        $status = Transaction::status($posts->order_id);

        if ($status->status_code == 200) {
            ProjectPendanaan::updateOrCreate([
                'id'         => $posts->id
            ], [
                'transaction_id' => $status->transaction_id,
                'payment_status' => $status->transaction_status,
                'settlement_time' => $status->settlement_time,
            ]);
        }

        $order_id = $posts->order_id;

        $posts = ProjectPendanaan::query()
            // ->where('user_id', auth()->user()->id)
            ->where('project_id', $posts->project_id)
            ->orderBy('id', 'desc')
            ->paginate(20);

        $status_code = $status->status_code;

        return compact('posts', 'host', 'status_code', 'order_id');
    }
}
