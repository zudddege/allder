<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Facades\Hash;

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
    }

    protected function createSubAccount(Request $data){
        User::create([
            "email"=>$data->email,
            "name"=>$data->name,
            "tel_no"=>$data->tel_no,
            "discount"=>$data->discount,
            "cod"=>$data->cod,
            "username"=>$data->username,
            "password"=>Hash::make($data->password),
        ]);
        return redirect('/subaccount');
    }

}
