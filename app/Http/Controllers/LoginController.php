<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


   public function register()
   {
    return view('login.register');
   }

   public function create(Request $request)
   {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required'
    ],
    [
        'name.required' => 'O nome é obrigatório',
        'email.required' => 'O email é obrigatório',
        'email.email' => 'O email deve ser valido',
        'password' => 'A senha é obrigatória'

    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    $user->save();

    redirect()->route('login.page');

    // Fazer mensagems de erro




   }
}
