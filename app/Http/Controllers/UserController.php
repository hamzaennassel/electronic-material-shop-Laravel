<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
            public function index()
            {
                        $users =User::get();
                        return view('users.index',compact('users'));
            }

            public function edit($id)
            {
        
                $user = User::findorfail($id);
               
                    return view('users.edit',compact('user'));
            }
            public function update(Request $request, $id)
            {
                $user = User::findorfail($id);
                $user->name = $request->name;
                $user->email = $request->email;
                
                $user->save();
    
                return redirect()->route('user.index'); 
            }
            public function delete($id)
            {
                User::destroy($id);
                return redirect()->route('user.index');
            }
    
}
