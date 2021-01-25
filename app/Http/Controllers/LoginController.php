<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    //Login page view
    function loginPage(){
        return view('LoginAndRegister/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email',"password");
        if (Auth::attempt($credentials)) {
            Session::put('email',$request->email);
            return redirect('/');
        }
        else{
            $status = "Wrong Credentials";
            return redirect('/login')->with('status',$status);
        }

    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $google = Socialite::driver('google')->stateless()->user();
        $email = $google->getemail();

        if(User::where('email',$email)->first())
        {
            Session::put('email',$email);
            $user= User::where('email',$email)->first();
            Auth::login($user);
            return redirect('/');
        }
//        if(!(preg_match("/^([\d]{4})\.([a-z]+)\.([a-z]+)@(ves)\.(ac)\.(in)$/",$email)))
//        {
//            //     ^([\d]{4})\.([a-z]+)\.([a-z]+)@(ves)\.(ac)\.(in)$
//            //     ^([a-zA-z\d\.]+)@(ves)\.(ac)\.(in)$
//            return "Not ves id";
//        }
        else{
            $user = new User();
            $user->email = $email;
            $user->password = "";
//            $user->first_name =  $google->offsetGet('given_name');
//            $user->last_name =  $google->offsetGet('family_name');
            $user->isVerified = 1;
            $user->save();
            Session::put('email',$user->email);
            Session::put('temp_email',$user->email);
            Auth::login($user);
            Mail::to($user->email)->send(new MailController($user,'MailTemplates/welcome_mail'));
//            return redirect('/');
            return redirect('/personaldetails');
        }
    }

    function logout(){
        session()->forget('email');
        session()->forget('temp_email');
        Auth::logout();
        return redirect('/');
    }
}
