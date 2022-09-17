<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginForm()
    {
        if(auth()->check()){
            return redirect('/dashboard');
        }
            return view('auth.login');
    }

    public function registerForm()
    {
        if(auth()->check()){
            return redirect('/dashboard');
        }
            return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'name'      =>  'required|string',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|string|confirmed|min:6',
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name'              =>  $request->name,
            'email'             =>  $request->email,
            'password'          =>  bcrypt($request->password),
            'remember_token'    =>  $token,
        ]);

        Mail::send('auth.verification-mail', ['user'=>$user], function($mail) use ($user){
            $mail->to($user->email);
            $mail->subject('Account Verification');
            $mail->from('kennbassist@gmail.com', 'BUs Ticketing App');
        });

        return redirect('/')->with('message', 'Your account has been created. Please check your email for verification');
    }

    public function verification(User $user, $token){
        if($user->remember_token !== $token){
            return redirect('/')->with('error', 'Invalid token. The attached token is invalid or has already been consumed.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/')->with('message', 'Your account has been verified. You can login now.');
    }

    public function login(Request $request){
        $request->validate([
            'email'     =>  'email|required',
            'password'  =>  'string|required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at==null){
            return redirect('/')->with('error', 'Sorry your account is not yet verified.');
        }
        
        $login = auth()->attempt([
            'email' =>  $request->email,
            'password'  =>  $request->password
        ]);

        if(!$login){
            return back()->with('error', 'Invalid Credentials');
        }

        return redirect('/dashboard')->with('message', 'Welcome to the Dashboard');
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('message', 'Logged out successfully');
    }


    

    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
