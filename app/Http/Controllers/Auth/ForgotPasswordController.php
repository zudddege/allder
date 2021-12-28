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
         return view('Login_page.forget');
      }
      public function mailcon()
      {
         return view('Login_page.mailcon');
      }
      public function forgetpass()
      {
         return view('Login_page.forgotpassword');
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

           $token = Str::random(64);
           DB::table('password_resets')->insert([
               'email' => $request->email,
               'token' => $token,
               'created_at' => Carbon::now()
             ]);
           Mail::send('Login_page.forgotpassword', ['token' => $token], function($message) use($request){
               $message->to($request->email);
               $message->subject('Reset Password');
           });
        return view('Login_page.mailcon');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) {

         return view('Login_page.newpass', ['token' => $token]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
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

        return redirect('/login')->with('message', 'Your password has been changed!');
      }

}
