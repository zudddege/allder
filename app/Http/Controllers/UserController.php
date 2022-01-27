<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use \Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    protected function Validation(Request $data) {

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
    public function detailsubAccount($id) {

        $subaccount = User::find($id);

        return view('sub-account.detail-sub-account', compact('subaccount'));
    }

    public function addSubAccount() {
        $date = Carbon::now('Asia/Bangkok')->isoFormat('YYMM');
        $number = User::select('id')->count();
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);
        $close_id = "AE" . $date . $number;

        return view('sub-account.add-sub-account', compact('close_id'));
    }

    protected function createSubAccount(Request $data) {
//  dd($data);
        User::create([
            "close_id" => $data->close_id,
            "short_id" => $data->short_id,
            "email" => $data->email,
            "account_name" => $data->account_name,
            "tel_no" => $data->tel_no,
            "discount_rate" => $data->discount_rate,
            "cod_rate" => $data->cod_rate,
            'is_status' => $data->is_status ? 1 : 0,
            "is_admin" => "0",
            "username" => $data->username,
            "password" => Hash::make($data->password),
        ]);

        return redirect('/sub-account');
    }

    public function genPassWord() {
        $password = "AE01";
        $password .= "123456789";
        return $password;
    }
    public function editsubAccount($id) {

        $subaccount = User::find($id);

        return view('sub-account.edit-sub', compact('subaccount'));
    }
    public function modifySubaccount(Request $request, $id) {
// dd($id,$request);
        User::find($id)->update([
            "close_id" => $request->close_id,
            "short_id" => $request->short_id,
            "email" => $request->email,
            "account_name" => $request->account_name,
            "tel_no" => $request->tel_no,
            "discount_rate" => $request->discount_rate,
            "cod_rate" => $request->cod_rate,
            'is_status' => $request->is_status ? 1 : 0,
            "username" => $request->username,
        ]);

        return redirect('/sub-account');
    }
    // public function search(Request $request){
    //     $search = $request->input('search');

    //     $subaccount = User::query()
    //         ->where('email', 'LIKE', "%{$search}%")
    //         ->orWhere('name', 'LIKE', "%{$search}%")
    //         ->orWhere('tel_no', 'LIKE', "%{$search}%")
    //         ->paginate(10);

    //         return view('sub-account.view-sub-account', compact('subaccount'));
    // }
    public function turnoffuser(Request $request) {
        // dd($request->id);
        $user = User::find($request->id);
        $status = !($user->is_status_user);
        $user->update(["is_status" => $status]);
        return $user->is_status;
    }
}
