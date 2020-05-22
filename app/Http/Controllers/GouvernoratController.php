<?php

namespace App\Http\Controllers;
use App\Gouvernorat;
use Illuminate\Http\Request;

class GouvernoratController extends Controller
{
    //
    public function index(){

        
            
     $gouvernorats=Gouvernorat::all();
            
        
     
      // dd($gouvernorats); 
      return $gouvernorat;
     //return view('annonces.create',['gouvernorats'=>$gouvernorats]);
    }
}
