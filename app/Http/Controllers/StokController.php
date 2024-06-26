<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Laptop;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stok.index', [
            'tittle' => 'Stok',
            'stoks' => Stok::all(),
            'laptop' => Laptop::all()
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
            'laptop_id' => 'required|unique:stoks',
            'jumlahStok' => 'required|numeric',
        ], [
            'laptop_id.required' => 'Laptop harus diisi.',
            'laptop_id.unique' => 'Laptop sdh ada dalam stok',
            'jumlahStok.required' => 'Jumlah stok wajib diisi.',
            'jumlahStok.numeric' => 'Jumlah stok harus berupa angka.',
        ]);

        Stok::create($validate);
        session()->flash('successCreateStok', 'Data Berhasil Ditambahkan!');
        return redirect('/kelolaStok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok, string $id)
    {
        $EditById = $stok->find($id);
        return view('stok.edit', [
            'tittle' => 'Edit Stok',
            'Ebi' => $EditById,
            'laptop' => Laptop::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stok $stok, string $id)
    {
        $validate = $request->validate([
            'laptop_id' => 'required|unique:stoks,id,{id}',
            'jumlahStok' => 'required|numeric',
        ], [
            'laptop_id.required' => 'Laptop harus diisi.',
            'laptop_id.unique' => 'Laptop sdh ada dalam stok',
            'jumlahStok.required' => 'Jumlah stok wajib diisi.',
            'jumlahStok.numeric' => 'Jumlah stok harus berupa angka.',
        ]);

        Stok::where('id', $id)->update($validate);
        session()->flash('successUpStok', 'Data Berhasil Ditambahkan!');
        return redirect('/kelolaStok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok, string $id)
    {
        Stok::destroy($id);
        session()->flash('successDelStok', 'Data berhasil dihapus!');
        return redirect('/kelolaStok');
    }
}
