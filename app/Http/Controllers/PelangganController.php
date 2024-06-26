<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pelanggan.index', [
            'tittle' => 'Kelola Pelanggan',
            'pelanggan' => Pelanggan::all()
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
            'nama' => 'required|min:4',
            'kontak' => 'required|numeric|min:4',
            'alamat' => 'required|min:4',
            'email' => 'required|min:4|email:rfc,dns|unique:pelanggans',
        ]);

        Pelanggan::create($validate);
        session()->flash('successCreatePelanggan', 'Data Berhasil Ditambahkan!');
        return redirect('/kelolaPelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Pelanggan $pelanggan)
    {
        $EditById = $pelanggan->find($id);
        return view('pelanggan.edit', [
            'tittle' => 'Edit Pelanggan',
            'Ebi' => $EditById,
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
        $validate = $request->validate([
            'nama' => 'required|min:4',
            'kontak' => 'required|numeric|min:4',
            'alamat' => 'required|min:4',
            'email' => 'required|min:4|email:rfc,dns|unique:pelanggans,id,{id}',
        ]);

        Pelanggan::where('id', $id)->update($validate);
        session()->flash('successUpPelanggan', 'Data Berhasil Ditambahkan!');
        return redirect('/kelolaPelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelanggan::destroy($id);
        session()->flash('successDelPelanggan', 'Data berhasil dihapus!');
        return redirect('/kelolaPelanggan');
    }
}
