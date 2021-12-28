<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;
<<<<<<< HEAD
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
=======

class UserController extends Controller
{



    protected function Validation(Request $data)
    {

         return Validator::make($data, [
             'name' => ['required', 'string', 'max:20'],
             'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
             'password' => ['required', 'string', 'min:8', 'confirmed'],
             'username' => ['required', 'string', 'max:20'],
             'close_id' => ['required', 'string', 'max:50'],
             'tel_no' => ['required', 'string', 'max:20'],
             'discount' => ['required', 'decimal', 'max:3,0'],
             'cod' => ['required', 'decimal', 'max:3,0'],
         ]);
>>>>>>> de29de3cc806c653051a7ccf55c25f1e735e44b9
    }

    public function login()
    {
        return view('Login_page.login');
    }
    public function forgot()
    {
        return view('Login_page.forget');
    }

    public function showSubAccount()
    {
        $subaccount = User::all();

        return view('sub-account.view-sub-account', compact('subaccount'));
    }

    public function addSubAccount() {
        $date = Carbon::now('Asia/Bangkok')->isoFormat('YYMM');
        $number = User::select('id')->count();
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);
        $close_id = "AE" . $date . $number;

        return view('sub-account.add-sub-account', compact('close_id'));
    }

    protected function createSubAccount(Request $data)
    {
        User::create([
            "close_id" => $data->close_id,
            "email" => $data->email,
            "name" => $data->name,
            "tel_no" => $data->tel_no,
            "discount" => $data->discount,
            "cod" => $data->cod,
            'is_status_user' => $data->is_status_user ? 1 : 0,
            "username" => $data->username,
            "password" => Hash::make($data->password),
        ]);

        return redirect('/sub-account');
    }
<<<<<<< HEAD
=======
    public function genPassWord()
    {
        $password = "AE01";
        $password .= "123456789";
        return $password;
    }
>>>>>>> de29de3cc806c653051a7ccf55c25f1e735e44b9
}
