<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Student;
use App\School;

class LoginPageController extends Controller
{
    //
    public function home(){
        Auth::logout();
        return view('login.home');
    }
    
    public function index(){
        Auth::logout();
        return view('login.loginPage');
    }
    
    public function logout(){
        Auth::logout();
        return view('login.loginPage');
    }

    public function mainLogin(Request $request){
        $userDetails = $request->all();

        $username = $userDetails['uname'];
        $password = $userDetails['pword'];
        // dd($userDetails);
        if(Auth::attempt(['name'=> $username, 'password' => $password])){
            // dd(Auth::user());
            
            // if($request->user()->role == 'admin'){
                return response()->json([
                    'success' => true, 
                    'location' => '/dashboard'
                ]);
            // }
        } else {
            // dd($request->user());
            return response()->json(['error' => true, 'cred'=>$userDetails]);
        }

    }

    public function dashboard(Request $request){
        $user = $request->user();

        if($user->role === "admin"){
            return view('admin.dashboard', compact($user));
        } else if ($user->role === "cashier") {
            return view('cashier.dashboard', compact($user));
        } 
    }

}
