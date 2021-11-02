<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::paginate(10);

        return view('admin.users',["users"=>$users]);
    }

    public function edit(Request $request) {

        $user = User::find($request->id);

        if(isset($request->name) && isset($request->email)) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->route('users');
        } else {
            return view('admin.user.edit',['user'=>$user]);
        }
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/users');
    }
}
