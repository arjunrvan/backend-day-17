<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    // public function index () {
    //     return view('admin.login');
    // }

    public function dashboard() {
        $user = User::count();
        $job = Job::count();
        $dept = Department::count();
        return view('admin.dashboard',["user"=>$user,"job"=>$job,"dept"=>$dept]);
    }

    public function login(Request $request) {
        if($request->isMethod('post')) {
            $credentials = $request->validate([
                'email'=>['required','email'],
                'password'=>['required'],
            ]);

            if (Auth::attempt($credentials)) {
                if(Auth::user()->role==1) {
                    $request->session()->regenerate();
                    return redirect()->route('dashboard');
                } else {
                    return redirect('/');
                }

            }

            return back()->withErrors([

                'email'=>'The entered email or password do not match our records.',
            ]);
        }

        return view('admin.login');
    }

    public function logout() {
        if (Auth::check()) {
            Auth::logout();

        }
        return view('admin.logout');
        // return redirect()->route('login');
    }
}
