<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //
    public function edit(){
        $id = auth()->user()->id; 
        $user=User::find($id);
        return view('user.edit',['user'=>$user]);
    }
    public function update($id){
        
        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'adress'=>'required',
            'phone_number'=>'required'
            
         ]);
        $user=User::find($id);

        $user->name=request('name');
        $user->email=request('email');
        $user->adress=request('adress');
        $user->phone_number=request('phone_number');
        
        $user->save();
        return redirect('/user/edit');
    }

}
