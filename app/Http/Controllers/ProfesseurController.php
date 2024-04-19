<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Professeur;
use Illuminate\Support\Str;

class ProfesseurController extends Controller
{
    Public function dashboard(){

        return view('ProfesseurDashboard');
    }
    
    
    
    public function login(){
        return view('ProfesseurLogin');
    }
    
    
    
    public function login_submit(Request $request){
    
    $request ->validate([
            'email' =>'required|email',
            'password'=>'required',
    
    ]);
    
    $credentials = $request ->only('email','password');
    
    if(Auth::guard('professeur')->attempt($credentials)){
    
        $user = Professeur::where('email',$request->input('email'))->first();
        Auth::guard('professeur')->login($user);
        return redirect()->route('professeur_dashboard')->with('success','Login Successful');
    }else{
        return redirect()->route('professeur_login')->with('error','Login unsuccessful');
    }
    
    
    }
    
    public function logout(){
    
        Auth::guard('professeur')->logout();
        return redirect()->route('professeur_login')->with('Success','Logout successfully');
    }
    
}
