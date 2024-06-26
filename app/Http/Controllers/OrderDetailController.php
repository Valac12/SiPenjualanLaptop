<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function delete(string $id)
    {
        Order::destroy($id);
        session()->flash('successDelOrder', 'Data berhasil dihapus!');
        return redirect('/order');
    }
}
