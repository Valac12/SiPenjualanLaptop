<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\User;
use App\Models\Order;
use App\Models\Laptop;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $laptop = Laptop::all()->count();
        $stok = Stok::all()->count();
        $user = User::all()->count();
        $pelanggan = Pelanggan::all()->count();
        $order = Order::all()->count();
        return view('dashboard.index', [
            'tittle' => 'Sistem Informasi Manajemen Laptop',
            'laptop' => $laptop,
            'stok' => $stok,
            'user' => $user,
            'pelanggan' => $pelanggan,
            'order' => $order
        ]);
    }
}
