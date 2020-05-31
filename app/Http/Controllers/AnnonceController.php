<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use Image;
use Illuminate\Support\Facades\Response;
use App\Gouvernorat;
use App\TypeObjet;
use App\Notifications\ReponseSurAnnonce;
use Notification;
use App\User;
use Illuminate\Support\Collection;
class AnnonceController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    //cette fonction permet d'afficher les annonces selon leurs type(lost/found)
    public function index(){

        if(request('type')=='lost'){
            
            $annonces=Annonce::where('typeAnnonce','lost')->get();
            
        }else{
            $annonces=Annonce::where('typeAnnonce','found')->get();
        }
        return view('annonces.index',['annonces'=>$annonces]);
    }
    //cette fonction permet d'afficher les données d'une annonce selon son identidiant($id)
    public function show($id){

        $annonce=Annonce::find($id);
        $user=User::find($annonce->user_id);
        return view('annonces.show',['annonce'=>$annonce],['user'=>$user]);
    }
    //cette fonction permet d'afficher une interface dans laquelle se fait l'ajout d'une annonce
    public function create(){
        $gouvernorats=Gouvernorat::all();
        $typeObjets=TypeObjet::all();
        
        return view('annonces.create',['gouvernorats'=>$gouvernorats],['typeObjets'=>$typeObjets]);
    }
    //cette fonction sert a ajouter une annonce dans la base de donnés avec l'image sous forme d'un lien
    /*public function store(){
        
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
    }*/
    //cette fonction permet d'ajouter une annonce dans la base de données
    public function store(Request $request){
        $request->validate([
            'title'  => 'required',
            'image' => 'required|image|max:2048',
            'typeObjet'=>'required',
            'localisation'=>'required',
            'typeAnnonce'=>'required',
            'body'=>'required'
        ]);

           $image = Image::make($request->file('image')->getRealPath());
           Response::make($image->encode('jpg'));
           $id = auth()->user()->id;
           if(($request->typeAnnonce)=="lost"){
               $typeAnnonce="lost";
           }else{
                $typeAnnonce="found";
           }
           $form_data = array(
            'title'  => $request->title,
            'image' => $image,
            'typeObjet'=>$request->typeObjet,
            'localisation'=>$request->localisation,
            'body'=>$request->body,
            'user_id'=>$id,
            'typeAnnonce'=>$typeAnnonce
           );
           Annonce::create($form_data); 
           self::verifierNotification($id,$request->title,$request->typeObjet,$request->localisation,$typeAnnonce,$request->body);
        return redirect('/annoncel?type=lost');
     }
     //cette fonction permet d'afficher l'interface dans laquelle se fait la mise a jour 
    public function edit($id){
        
        $annonce=Annonce::find($id);
        $typeObjets=TypeObjet::all();
        $gouvernorats=Gouvernorat::all();
        //dd($gouvernorats);
        //return view('annonces.edit',['annonce'=>$annonce],['typeObjets'=>$typeObjets],['gouvernorats'=>$gouvernorats]);
        return view('annonces.edit', compact(['annonce', 'typeObjets','gouvernorats']));
    }
    //cette fonction permet de mettre a jour une annonce
    /*public function update($id){
        
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
    }*/
    public function update(Request $request,$id){
        
        $request->validate([
            'title'  => 'required',
            'typeObjet'=>'required',
            'image' => 'required|image|max:2048',
            'localisation'=>'required',
            'body'=>'required'
        ]);
        $annonce=Annonce::find($id);
        if(($annonce->typeAnnonce)=="lost"){
            $typeAnnonce="lost";
        }else{
             $typeAnnonce="found";
        }
        $annonce->title=request('title');
        //$annonce->image=request('image');
        if($request->file('image')!=null){
            $image = Image::make($request->file('image')->getRealPath());
            Response::make($image->encode('jpg'));
            $annonce->image=$image;
        }else{
            /*$image_file = Image::make($annonce->image);
            $var = Response::make($image_file->encode('jpg'));
            $image = Image::make($var);
            Response::make($image->encode('jpg'));
            $annonce->image=$image; */
        }
        
        $annonce->typeAnnonce=$typeAnnonce;
        $annonce->typeObjet=request('typeObjet');
        $annonce->localisation=request('localisation');
        $annonce->body=request('body');
        $annonce->save();
        return redirect('/annonce/' . $annonce->id);
    }
    //cette fonction permet d'effacer une annonce
    public function destroy($id){
        $annonce=Annonce::find($id);
        $annonce->delete();
        return redirect('/annoncel?type=lost');
    }
    //cette fonction permet d'afficher les annonces créer par l'utilisateur connectée
    public function annoncescreated(){
        $id = auth()->user()->id; 
        $annonces=Annonce::where('user_id',$id)->get();
        return view('annonces.showcreated',['annonces'=>$annonces]);
    }
    //cette fonction permet d'importer l'image a partir de la base de données et l'encoder pour l'afficher 
    function fetch_image($annonce_id)
    {
     $annonce = Annonce::findOrFail($annonce_id);
     $image_file = Image::make($annonce->image);
     $response = Response::make($image_file->encode('jpg'));
     $response->header('Content-Type', 'image/jpg');
     return $response;
    }
    //cette fonction permet d'assurer la fonctionalité de recherche d'annonce
    function search(Request $request)
    {
        $search=$request->get('search');
        $typeAnnonce=$request->get('typeAnnonce');
        $annonces=Annonce::where([
            ['title', 'like', '%'.$search.'%'],
            ['typeAnnonce',$typeAnnonce ],
        ])->get();
        return view('annonces.index',['annonces'=>$annonces]);
    }
    //cette fonction permet d'assurer le mécanisme de notifications
    function verifierNotification($id,$title,$typeObjet,$localisation,$typeAnnonce,$body){
        $annonce=Annonce::where([
            ['user_id', $id],
            ['title',$title ],
            ['typeObjet',$typeObjet ],
            ['localisation',$localisation ],
            ['typeAnnonce',$typeAnnonce ],
            ['body',$body ],
        ])->first();
        $publisher=User::find($id);
        $matchs=Annonce::where([
            ['typeObjet',$typeObjet ],
            ['localisation',$localisation ],
            ['typeAnnonce', '!=' ,$typeAnnonce ],
        ])->get();
        if($matchs!=null){
            $targets = collect([]);
            foreach($matchs as $match){
                $User=User::find($match->user_id);
                $targets->push($User);
                Notification::send($publisher,new ReponseSurAnnonce($match->id,$match->title,$match->typeObjet)); 

                
            }
          // dd($publisher);
            Notification::send($targets,new ReponseSurAnnonce($annonce->id,$title,$typeObjet)); 
            
        }
        

    }
    //cette fonction permet d'afficher les notifications qui conçerne l'utilisateur connectée
    public function notifications(){
        $id = auth()->user()->id;
        $notifications=\DB::table('notifications')->where('notifiable_id',$id)->get();
        return view('annonces.aff_notifications',['notifications'=>$notifications]);
    }

    public function destroyNotifiation($notification){
        //$notification=\DB::table('notifications')->where('id',$id)->first();
        
        $notification->delete();
        return redirect('/notifications');
    }

}
