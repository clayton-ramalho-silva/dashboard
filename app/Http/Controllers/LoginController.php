<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function login()
   {
        return view('login.login');
   }

   public function auth(Request $request)
   {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email é obrigatório',
            'email.email' => 'O email deve ser email valido.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            $user = Auth::user();


            if(!$user->admin){
                return redirect()->route('cliente.index');
            } else {
                return redirect()->route('admin.index');
            }




        } else {
            return redirect()->back()->with('danger', 'E-mail ou senha inválido.');
        }
   }

   public function logout(Request $request)
   {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
   }
}
