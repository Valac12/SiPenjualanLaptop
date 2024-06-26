<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stok;
use App\Models\Order;
use App\Models\Laptop;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $now = Carbon::now();
        $date = $now->format('Y-m-d');
        $order = Order::all();
        $uniqueData = $order->unique(function ($item) {
            return $item['pelanggan_id'] . $item['date'];
        });
        // $carbon->toDateString();
        return view('order.index', [
            'tittle' => 'Order',
            'orders' => $uniqueData,
            'pelanggan' => Pelanggan::all(),
            'laptop' => Laptop::all(),
            'carbon' => $date
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'pelanggan_id' => 'required',
            'laptop_id' => 'required',
            'date' => 'required',
            'Qty' => 'required',
            'harga' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        // Dapatkan data laptop dan stok
        $laptop = Laptop::with('stok')->findOrFail($validate['laptop_id']);
        $stok = $laptop->stok;

        // Periksa apakah stok mencukupi
        if ($stok->jumlahStok < $validate['Qty']) {
            session()->flash('FaillCreateOrder', 'Stok Tidak Mencukupi!');
            return redirect('/order');
        }

        // Kurangi stok
        $stok->jumlahStok -= $validate['Qty'];
        $stok->save();


        Order::create($validate);
        session()->flash('successCreateOrder', 'Data Berhasil Ditambahkan!');
        return redirect('/order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::all();
        $orderDetail = $order->find($id);
        $orderPelanggan = $orderDetail->pelanggan_id;
        $orderDate = $orderDetail->date;
        return view('order.detail', [
            'tittle' => 'Detail Order',
            'orderDetail' => $orderDetail,
            'orderPelanggan' => Order::where('pelanggan_id', $orderPelanggan)
                ->where('date', $orderDate)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteRows = Order::where('pelanggan_id', $id)->delete();
        session()->flash('successDelOrder', 'Data berhasil dihapus!');
        return redirect('/order');
    }
}
