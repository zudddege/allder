<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AddressBookController\WarehouseController;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Warehouse\Warehouse;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Str;

class UserController extends Controller {

    protected function Validation(Request $request) {

        $this->validate($request,[
            'email' => 'required|string|email|max:50|unique:users',
            'account_name' => 'required|string|max:20',
            'tel_no' => 'required|string|max:20',
            'discount_rate' => 'required|decimal|max:3,0',
            'cod_rate' => 'required|decimal|max:3,0',
            'username' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ],
        //Custom Error Messages
        [
            'email.required' => 'อีเมลนี้ถูกใช้สมัครแล้ว',
            'account_name.required' => 'กรุณาใส่ชื่อผู้ใช้งาน / ชื่อธุรกิจ',
            'tel_no.required' => 'กรุณาใส่เบอร์ติดต่อ',
            'discount_rate.required' => 'กรุณาใส่ส่วนลดที่ได้รับ',
            'cod_rate.required' => 'กรุณาใส่COD',
            'username.exists' => 'กรุณาใส่ชื่อผู้ใช้หรืออีเมล',
            'password.min' => ' รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว',
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
        ]);
        $user = User::find($request->email);
        $email = !$user->email;
        $user->update(["email" => $email]);

    }


    public function login() {
        return view('auth.login');
    }
    public function forgot() {
        return view('auth.forget');
    }

    public function showSubAccount() {
        $subaccount = User::query()->get();
        $warehouses = (new WarehouseController)->getWarehouse();

        return view('sub-account.view-sub-account', compact('subaccount', 'warehouses'));
    }
    public function detailsubAccount(Request $request) {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $subaccount = User::find($request->id);

        return view('sub-account.detail-sub-account', compact('subaccount','warehouses'));
    }

    public function addSubAccount() {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $date = Carbon::now('Asia/Bangkok')->isoFormat('YYMM');
        $number = User::select('id')->count();
        $number = str_pad($number, 4, '0', STR_PAD_LEFT);
        $close_id = "AE" . $date . $number;

        return view('sub-account.add-sub-account', compact('close_id','warehouses'));
    }

    protected function createSubAccount(Request $data) {

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

        return redirect('/sub-accounts');
    }

    public function genPassword() {
        $password = Str::random(8);
        return $password;
    }
    public function editsubAccount(Request $request) {
        $warehouses = Warehouse::orderBy('id', 'desc')->where('user_id', Auth::id())->get();
        $subaccount = User::find($request->id);
        return view('sub-account.edit-sub', compact('subaccount','warehouses'));
    }
    public function modifySubaccount(Request $request) {
// dd($id,$request);
        User::find($request->id)->update([
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

        return redirect('/sub-accounts');
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
        $user = User::find($request->id);
        $status = !$user->is_status;
        $user->update(["is_status" => $status]);
    }
}
