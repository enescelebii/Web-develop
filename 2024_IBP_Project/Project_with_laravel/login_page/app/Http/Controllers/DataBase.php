<?php

namespace App\Http\Controllers;

use App\Models\Kullanici;
use Illuminate\Http\Request;

class DataBase extends Controller
{
    public function veriAl()
    {
        // Veritabanından tüm verileri al
        $data = Kullanici::all();

        // View'a verileri gönder
        return view('dbgüncelle.dataBaseKullanici', ['veri' => $data]);
    }
    
    public function edit($id)
    {
        $user = Kullanici::findOrFail($id);
        return view('dbgüncelle.dataBaseguncelle', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $user = Kullanici::findOrFail($id);

        // Validation
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:kullanici',
            'password' => 'required',
        ]);

        // Kullanıcı bilgilerini güncelle
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin')->with('success2', 'Kullanıcı başarıyla güncellendi.');
    }
    
    public function destroy($id)
    {
        $user = Kullanici::findOrFail($id);
        $user->delete();

        return redirect()->route('adminpage')->with('success2', 'Kullanıcı başarıyla silindi.');
    }
}