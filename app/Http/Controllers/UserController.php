<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function add()
    {
        return view('user.userAdd');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ]);


        if ($request->is_admin == "on") {
            $is_admin = 1;
        } else {
            $is_admin = 0;
        }

        if ($request->is_active == "on") {
            $is_active = 1;
        } else {
            $is_active = 0;
        }

        //proses upload foto
        $foto = $request->file('foto');
        $namaFoto = Carbon::now()->timestamp . '-' . Str::slug($request->name, '-') . '.' . $foto->getClientOriginalExtension();
        $pathFoto = public_path('/assets/img/pengguna/') . '/';
        $foto->move($pathFoto, $namaFoto);

        $userNew = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'foto' => $namaFoto,
            'is_admin' => $is_admin,
            'is_active' => $is_active,
        ]);
        $userNew->save();
        return redirect('/penggunaList')->with('pesan', 'Pengguna Berhasil ditambahkan');
    }
    public function list()
    {
        //Ambil data semua user
        $users = User::all();
        return view('user.userList', compact('users'));
    }

    public function edit($id)
    {
        //pilih data user dimaksud
        $user = User::where('id', $id)->first();
        return view('user.userEdit', compact('user'));
    }

    public function editAdmin(Request $request)
    {
        //pilih data user dimaksud
        $user = User::where('username', $request->session()->get('username'))->first();
        return view('user.userEdit', compact('user'));
    }

    public function profil($id)
    {

        $user = User::where('id', $id)->first();

        return view('user.userProfile', compact('user'));
    }

    public function adminProfil(Request $request)
    {
        $user = User::where('username', $request->session()->get('username'))->first();

        return view('user.userProfile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'notelp' => 'required',
        ]);

        $user = User::where('id', $id)->first();

        //proses upload foto
        if ($request->file('foto')) {
            $foto = $request->file('foto');
            $namaFoto = Carbon::now()->timestamp . '-' . Str::slug($request->name, '-') . '.' . $foto->getClientOriginalExtension();
            $pathFoto = public_path('/assets/img/pengguna/') . '/';
            $tes  = $pathFoto . $namaFoto;
            $foto->move($pathFoto, $namaFoto);
        } else {
            $namaFoto = $user->foto;
        }


        //proses update data
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->notelp = $request->notelp;
        $user->alamat = $request->alamat;
        $user->foto = $namaFoto;
        if ($request->is_admin) {
            $user->is_admin = 1;
        } else {
            $user->is_admin = 0;
        }
        if ($request->is_active) {
            $user->is_active = 1;
        } else {
            $user->is_active = 0;
        }
        $user->save();
        return redirect('/penggunaList')->with('pesan', 'Data Berhasil Diupdate .');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/penggunaList')->with('pesan', 'User berhasil dihapus.');
    }
}
