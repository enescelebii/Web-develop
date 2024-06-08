<?php

namespace App\Http\Controllers;

use App\Models\Kullanici as ModelsKullanici;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginPost(Request $request)
{
    // Formdan gelen verileri doğrula
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'is_admin' => 'boolean'
    ]);

    // Kullanıcı tarafından girilen kimlik bilgilerini al
    $credentials = $request->only(['email', 'password','is_admin']);


    if (Auth::attempt($credentials)) {
        // Kullanıcı girişi başarılı ise
        if ($request->has('is_admin')) {
            // Eğer kullanıcı admin ise, admin paneline yönlendir
            return redirect()->route('admin');
        } else {
            // Admin değilse, ana sayfaya yönlendir
            return redirect()->route('home');
        }
    }


    
    return redirect()->route('login')->with("error", "Giriş bilgileri geçersiz");



    }
    public function register(Request $request)
    {
        return view('register');
    }
    public function registerPost(Request $request)
    {
        
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:kullanici',
            'password' => 'required',
            'is_admin' => 'boolean',
        ]);

        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password) ;
        $data['is_admin'] = $request->is_admin;

        $user = ModelsKullanici::create($data);
        if (!$user) {
            return redirect()->route('register')->with("error", "register details are not valid"); 
        }
        return redirect()->route('login')->with("success", "You are successfully registered");
        
    }
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}