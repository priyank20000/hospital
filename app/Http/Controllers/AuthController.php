<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserFollowNotification;

class AuthController extends Controller
{
    public function loadregister(){
        if(Auth::user()){
            return redirect('/');
        }
        return view('auth.register');
    }
    public function stdregister(Request $request){
        $request->validate([
            'name' => 'string|required|min:1',
            'email' => 'string|required|max:100|unique:admin_dashboards',
            'password' => 'string|required|min:6',
            'phone' => 'string|nullable', // Add validation for the phone number
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone; // Set the phone number
        $user->save();

        return redirect('/login')->with('success', 'Registration successful');

    }
    public function loadlogin(){
        if(Auth::user()){
            return redirect('/');
        }
        return view('auth.login');
    }

    public function userlogin(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $userCredential = $request->only('email', 'password');

        if(Auth::attempt($userCredential)){
            if(Auth::user()->is_admin == 'admin'){
                return redirect('/');
            }
            else{
                return redirect('/login');
            }

        } else {
            return back()->withErrors(['error' => 'Incorrect username or password']);
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }

    public function edit($id){
        $u = User::find($id);
        return view('dashboard.edit', compact('u'));
    }
    public function update(Request $request, $id)
    {
        $u = User::find($id);

        if (!$u) {
            return redirect('/admin_panal/table')->with('error', "User not found");
        }

        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->phone = $request->input('phone');
        $u->password = $request->input('password');


        // Save the changes to the user
        $u->save();

        return redirect('/admin_panal/table')->with('status', "Data Update Successfully");
    }

    public function delete($id){
        $u = User::find($id);
        $u->delete();
        return redirect('/admin_panal/table')->with('status',"Data Deleted Successfully");
    }

    public function updateRoles(Request $request){
        $request->validate([
            'role.*' => 'required|in:admin,user',
            'user_ids' => 'required|array',
        ]);

        $userIds = $request->input('user_ids');
        $roles = $request->input('role');

        foreach ($userIds as $userId) {
            $user = User::find($userId);

            if ($user && array_key_exists($userId, $roles)) {
                $user->is_admin = $roles[$userId];
                $user->save();
            }
        }

        // Redirect back or return a response as needed
        return redirect()->back()->with('success', 'User roles updated successfully');
    }

    // public function notify()
    // {
    //     if(auth()->user()){

    //     $user = User::first();

    //     auth()->user()->notify(new UserFollowNotification($user));
    //     }
    //     dd('done');
    // }



    }




