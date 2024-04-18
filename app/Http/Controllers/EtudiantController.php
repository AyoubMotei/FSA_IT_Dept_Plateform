<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Controllers\Auth;
use App\Models\Etudiant;
use Illuminate\Support\Str;

class EtudiantController extends Controller
{
    
    public function dashboard(){

        return view('EtudiantDashboard');
    }



    public function login(){
        return view('EtudiantLogin');
    }



    public function login_submit(Request $request){

    $request ->validate([
            'email' =>'required|email',
            'password'=>'required',

    ]);

    $credentials = $request ->only('email','password');

    if(Auth::guard('etudiant')->attempt($credentials)){

        $user = Etudiant ::where('email',$request->input('email'))->first();
        Auth::guard('etudiant')->login($user);
        return redirect()->route('etudiant_dashboard')->with('success','Login Successful');
    }else{
        return redirect()->route('etudiant_login')->with('error','Login unsuccessful');
    }


    }

    public function logout(){

        Auth::guard('etudiant')->logout();
        return redirect()->route('etudiant_login')->with('Success','Logout successfully');
    }
}
