<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
class AnnonceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        
        //$annonces=Annonce::all();
        /*$annonces=Annonce::where('typeAnnonce','lost')->get();
        return view('annonces.index',['annonces'=>$annonces]);*/
        if(request('type')=='lost'){
            $annonces=Annonce::where('typeAnnonce','lost')->get();
            
        }else{
            $annonces=Annonce::where('typeAnnonce','found')->get();
        }
        return view('annonces.index',['annonces'=>$annonces]);
    }
    public function show($id){

        $annonce=Annonce::find($id);
        return view('annonces.show',['annonce'=>$annonce]);
    }
    public function create(){
        
        
        return view('annonces.create');
    }
    public function store(){
        
        request()->validate([
           'title'=>'required',
           'image'=>'required',
           'typeObjet'=>'required',
           'localisation'=>'required',
           'body'=>'required'
        ]);
       $annonce=new Annonce();
       $annonce->title=request('title');
       $annonce->image=request('image');
       $annonce->typeAnnonce="lost";
       $id = auth()->user()->id; 
       $annonce->user_id=$id;
       $annonce->typeObjet=request('typeObjet');
       $annonce->localisation=request('localisation');
       $annonce->body=request('body');
       $annonce->save();
       return redirect('/annoncel?type=lost');
    }
    public function edit($id){
        
        $annonce=Annonce::find($id);
        return view('annonces.edit',['annonce'=>$annonce]);
    }
    public function update($id){
        
        request()->validate([
            'title'=>'required',
            'image'=>'required',
            'typeObjet'=>'required',
            'localisation'=>'required',
            'body'=>'required'
         ]);
        $annonce=Annonce::find($id);
        $annonce->title=request('title');
        $annonce->image=request('image');
        $annonce->typeAnnonce="lost";
        $annonce->typeObjet=request('typeObjet');
        $annonce->localisation=request('localisation');
        $annonce->body=request('body');
        $annonce->save();
        return redirect('/annonce/' . $annonce->id);
    }
    public function destroy($id){
        $annonce=Annonce::find($id);
        $annonce->delete();
        return redirect('/annoncel?type=lost');
    }

    public function annoncescreated(){
        $id = auth()->user()->id; 
        $annonces=Annonce::where('user_id',$id)->get();
        return view('annonces.showcreated',['annonces'=>$annonces]);
    }

}
