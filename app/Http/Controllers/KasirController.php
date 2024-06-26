<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.kasir', [
            'tittle' => 'Kelola Kasir',
            'userKasir' => User::where('level', 2)->orderByDesc('created_at')->get()
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:4',
            'alamat' => 'required|min:4',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'kontak' => 'required|numeric',
            'level_name' => 'required',
            'level' => 'required',
        ]);

        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);
        session()->flash('successCreateKasir', 'Data Berhasil Ditambahkan!');
        return redirect('/kelolaKasir');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, User $user)
    {
        $kasirId = $user->find($id);
        return view('users.kasirDetail', [
            'tittle' => 'Kasir Detail',
            'kasirId' => $kasirId
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, User $user)
    {
        $username = $request->username;
        $password = $request->password;
        $dataLama = $user->find($id);

        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users,id,{id}',
            'password' => 'required|min:4',
            'alamat' => 'required|min:4',
            'tgl_lahir' => 'required|date',
            'jk' => 'required',
            'kontak' => 'required|numeric',
            'level_name' => 'required',
            'level' => 'required',
        ];

        $validate = $request->validate($rules);
        // cek match password
        $pass = auth()->user()->password;
        if (Hash::check($password, $pass)) {
            $validate['password'] = bcrypt($validate['password']);
        } else {
            session()->flash('faillUpUser', 'Password tidak sesuai!');
            return redirect('/kelolaKasir/' . $id);
        }
        User::where('id', $id)->update($validate);
        // session()->flash('successUpAdmin', 'Admin berhasil diupdate!');
        return redirect('/kelolaKasir/' . $id)->with('successUpUser', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        session()->flash('successDelKasir', 'Data berhasil dihapus!');
        return redirect('/kelolaKasir');
    }
}
