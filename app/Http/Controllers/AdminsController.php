<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminsController extends Controller
{
    public function index()
    {
        $roles = auth()->user()->roles;
        if(!$roles->contains("role", "admin")){
            return redirect('/home')->withErrors('You are not an admin redirected to home!');
        }

        $users = User::all()->sortByDesc('id');    
        return view('admins.index', ['users' => $users]);      
    }

    public function roleChange(Request $request){

        $user = User::Find($request->user_id);
        if($request->chkP == "true" and !$user->roles->contains("role", "poster")){
            $user->roles()->attach(1); 
        }elseif($request->chkP == "false" and $user->roles->contains("role", "poster")){
            $user->roles()->detach(1); 
        }
        if($request->chkM == "true" and !$user->roles->contains("role", "moderator")){
            $user->roles()->attach(2); 
        }elseif($request->chkM == "false" and $user->roles->contains("role", "moderator")){
            $user->roles()->detach(2); 
        }
        if($request->chkA == "true" and !$user->roles->contains("role", "admin")){
            $user->roles()->attach(3); 
        }elseif($request->chkA == "false" and $user->roles->contains("role", "admin")){
            $user->roles()->detach(3); 
        }
     
        return response()->json($user);
    }
}
