<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class InvoiceControllerrrrr extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::select('nama')->get();
        $pelanggans = Pelanggan::where('nama', request('nama'));
        if (request('nama')) {
            $pelanggans->where('nama', request('nama'));
        }
        return view('invoice.index', [
            'tittle' => 'Invoice',
            'pelanggan' => $pelanggan,
            'pelanggans' => $pelanggans->get()
        ]);
    }
}
