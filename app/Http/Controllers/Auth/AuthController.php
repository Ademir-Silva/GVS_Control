<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller{

    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function save(Request $request){
        $request->validate([
            'name' => 'required|min:3|max:35',
            'sector' => 'required',
            'email' => 'required|email|min:5|max:50',
            'password' => 'required|min:5|max:32'
        ]);

        $user = new User;
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $save = $user->save();

        if ($save) {
            return redirect()->route('auth.login')->with('success', 'O usuário foi cadastrado com sucesso!');
        } else {
            return back()->with('fail', 'Ocorreu um erro, tente novamento!');
        }
    }

    function check(Request $request){
        $request->validate([
            'email' => 'required|email|min:5|max:50',
            'password' => 'required|min:5|max:32'
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();

        if (!$userInfo) {
            return back()->with('fail', 'Este email não está cadastrado!');
        } else if (Hash::check($request->password, $userInfo->password)) {
            $request->session()->put('LoggedUser', $userInfo->id);
            return redirect()->route('panel');
        } else {
            return back()->with('fail', 'A senha está incorreta!');
        }
    }

    public function logout(){
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect()->route('auth.login');
        }
    }

    public function panel(){
        $data = ['LoggedUserInfo' => User::where('id', '=', session('LoggedUser'))->first()];
        return view('panel', $data);
    }
}
