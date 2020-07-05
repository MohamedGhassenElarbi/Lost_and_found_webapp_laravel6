<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
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
    public function affVerifMotDePasse(){
        return view('user.verifMotDePasse');
    }
    public function verifMotDePasse(){
        request()->validate([
            'mdp'=>'required'
            
         ]);
        $entered_password=request('mdp');
        $id = auth()->user()->id; 
        $user=User::find($id);
        if (Hash::check($entered_password, $user->password)) {
            return view('user.editMotDePasse');   
        }
        return view('user.verifMotDePasse');
    }
    public function updateMotDePasse(){
        request()->validate([
            'mdp'=>'required'
            
         ]);
        $entered_password=request('mdp');
        $id = auth()->user()->id; 
        $user=User::find($id);
        $user->password=Hash::make($entered_password);
        $user->save();
        return redirect('/annoncel?type=lost');//password=ghassen0
    }

    public function show($id){
        $user=User::find($id);
        return view('user.show',['user'=>$user]);
    }

}
