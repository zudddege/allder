<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use \App\User;
use \Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forget');
      }
      public function mailcon()
      {
         return view('auth.mailcon');
      }
      public function forgetpass()
      {
         return view('auth.forgotpassword');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
        // $data=$request->all();
        // Mail::to('tanapon085106@gmail.com')->send(new TestMail($data));

          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
           $email = $request->email;
           $token = Str::random(64);
           DB::table('password_resets')->insert([
               'email' => $email,
               'token' => $token,
               'created_at' => Carbon::now()
             ]);
           Mail::send('auth.forgotpassword', ['token' => $token,'email' => $email], function($message) use($request){
               $message->to($request->email);
               $message->subject('Reset Password');
           });
        return view('auth.mailcon');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm(Request $request) {

         return view('auth.newpass', ['token' => $request->token,'email'=>$request->email]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {

        $this->validate($request,[
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required',
        ],[
            'email.exists' => 'อีเมลไม่ถูกต้อง',
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
            'password.min' => 'รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัว',
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email,
                              'token' => $request->token
                            ])
                            ->first();
        if(!$updatePassword){
                                return back()->withInput()->with('error', 'Invalid token!');
                            }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        // return redirect('/login')->with('message', 'Your password has been changed!');
      }

}
