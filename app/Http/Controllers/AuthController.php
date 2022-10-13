<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->validate([
                'email'=>'required|email|min:4|max:100',
                'password'=>'required|min:4|max:100',
            ]);
             $user = User::query()
                ->where('email', $data['email'])
                ->where('status', operator: USER::STATUS_ACTIVE)
                ->first();
            $request->session()->put('user', $user['name']);

            if(empty($user)){
                return redirect()->back();
            }

            if(hash::check($data['password'], $user['password'])){
                Auth::login($user);
                return view('users.index');
            }
        }

        return view('auth.login',[
            'showTopBar' =>false,
            'showSideBar' =>false,
            'showFooter' => false,
        ]);
   }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
   }
}
