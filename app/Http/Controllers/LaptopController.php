<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('laptop.index', [
            'tittle' => 'Laptop',
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
            'nama' => 'required|unique:laptops',
            'merek' => 'required|min:4',
            'prosesor' => 'required|min:4',
            'ram' => 'required|min:3',
            'penyimpanan' => 'required|min:4',
            'layar' => 'required|min:4',
            'harga' => 'required|numeric',
        ]);

        $validate['harga'] = 'Rp. ' . $request->harga;
        Laptop::create($validate);
        session()->flash('successCreateLaptop', 'Data Berhasil Ditambahkan!');
        return redirect('/kelolaLaptop');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laptop $laptop, string $id)
    {
        $EditById = $laptop->find($id);
        return view('laptop.edit', [
            'tittle' => 'Edit Laptop',
            'Ebi' => $EditById,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laptop $laptop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:laptops,id,{id}',
            'merek' => 'required|min:4',
            'prosesor' => 'required|min:4',
            'ram' => 'required|min:3',
            'penyimpanan' => 'required|min:4',
            'layar' => 'required|min:4',
            'harga' => 'required|numeric',
        ]);

        $validate['harga'] = 'Rp. ' . $request->harga;
        Laptop::where('id', $id)->update($validate);
        session()->flash('successUpLaptop', 'Data berhasil Di Ubah');
        return redirect('/kelolaLaptop');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laptop $laptop, string $id)
    {
        Laptop::destroy($id);
        session()->flash('successDelLaptop', 'Data berhasil dihapus!');
        return redirect('/kelolaLaptop');
    }
}
