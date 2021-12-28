<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller {
//
    protected function Validation(Request $data) {
        return Validator::make($data, [
        'email' => 'required|string|max:50|unique:user',
        'name' => 'required|string|max:50',
        'tel_no'=> 'required|string|max:20',
        'discount' => 'required|decimal|max:3,0',
        'cod' => 'required|decimal|max:3,0',
        'password' => ['required','string','confirmed', Password::min(8) ->mixedCase() ->letters() ->numbers() ->symbols() ->uncompromised() ],

        ]);
    }

    public function login() {
        return view('Login_page.login');
    }
    public function forgot() {
        return view('Login_page.forget');
    }

    public function showSubAccount() {
        $subaccount = User::all();

        return view('sub-account.view-sub-account', compact('subaccount'));
    }

    public function addSubAccount() {
        return view('sub-account.add-sub-account');
    }

    protected function createSubAccount(Request $data) {
        User::create([
            "email" => $data->email,
            "name" => $data->name,
            "tel_no" => $data->tel_no,
            "discount" => $data->discount,
            "cod" => $data->cod,
            "username" => $data->username,
            "password" => Hash::make($data->password),
            'is_status_user' => 1,
        ]);

        return redirect('/sub-account');
    }
}
