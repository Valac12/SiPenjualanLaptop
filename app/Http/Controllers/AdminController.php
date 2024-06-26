<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.admin', [
            'tittle' => 'Kelola Admin',
            'userAdmin' => User::where('level', 1)->orderByDesc('created_at')->get()
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
        session()->flash('successCreateAdmin', 'Data Berhasil Ditambahkan!');
        return redirect('/kelolaAdmin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, User $user)
    {
        $adminId = $user->find($id);
        return view('users.adminDetail', [
            'tittle' => 'Admin Detail',
            'adminId' => $adminId
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
            session()->flash('faillUpAdmin', 'Password tidak sesuai!');
            return redirect('/kelolaAdmin/' . $id);
        }
        User::where('id', $id)->update($validate);
        // session()->flash('successUpAdmin', 'Admin berhasil diupdate!');
        return redirect('/kelolaAdmin/' . $id)->with('successUpAdmin', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        session()->flash('successDelAdmin', 'Data berhasil dihapus!');
        return redirect('/kelolaAdmin');
    }
}
