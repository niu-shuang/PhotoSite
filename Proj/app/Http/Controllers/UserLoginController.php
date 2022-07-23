<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRegisterRequest;
use ILLuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    /**
     * @return view
     */
    public function show()
    {
        return view("userLogin");
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function  checkLogin(UserRequest $request)
    {
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('/')->with('login_success','ログイン成功しました');
        }
        return back()->withErrors([
            'login_error' =>'ユーザー名かパスワードが間違ってます',
        ]);
    }

    public function showRegister()
    {
        return view("userRegister");
    }

    public function register(UserRegisterRequest $request)
    {
        $inputs = $request->all();
        $inputs['password']= Hash::make($inputs['password']);
        \DB::beginTransaction();
        try{
            User::create($inputs);
            \DB::commit();
        }catch (\Throwable $e)
        {
            \DB::rollback();
            abort(500);
        }
        return redirect(route('userLogin'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('userLogin')->with('danger', 'ログアウトしました！');
    }
}
