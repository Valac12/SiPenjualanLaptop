<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(string $id)
    {
        $order = Order::all();
        $orderDetail = $order->find($id);
        $orderPelanggan = $orderDetail->pelanggan_id;
        $orderDate = $orderDetail->date;
        $data = Order::where('pelanggan_id', $orderPelanggan)
            ->where('date', $orderDate)->get();
        $totalAll = $data->sum('total');
        return view('invoice.index', [
            'tittle' => 'Invoice',
            'orderDetail' => $orderDetail,
            'orderPelanggan' => $data,
            'totalAll' => $totalAll
        ]);
    }
}
