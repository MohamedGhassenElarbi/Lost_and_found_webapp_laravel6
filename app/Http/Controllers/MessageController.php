<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Notification;
use App\Notifications\MessageNotification;
class MessageController extends Controller
{
    //pour envoyer un message au proprietaire de l'annonce
    public function store(){
        $id = auth()->user()->id; 
        $name=auth()->user()->name; 
        $receiver_id=request('receiver_id');
        $message=request('message');
       $messageObject=new Message();
       $messageObject->sender_id=$id;
       $messageObject->receiver_id=$receiver_id;
       $messageObject->message=$message;
       $messageObject->save();
       $destination=User::find($receiver_id);
       $identifiant=$id;
     //  dd($id,$name,$message,$destination);
    Notification::send($destination,new MessageNotification($message,$name,$identifiant));
       return redirect('/annoncel?type=lost');
    }
    //pour afficher la liste des discussions
    public function index(){
        $id = auth()->user()->id;
        $messages=Message::where('receiver_id',$id)
        //->orWhere('sender_id', $id)
        ->join('users', 'messages.sender_id', '=','users.id')
        ->orderBy('name')
        ->select('name', 'message','sender_id','messages.id',)
        
        ->get();
        //dd($messages);
        return view('messages.index',['messages'=>$messages]);
    }
    //pour accéder a une discussion
    public function show($id_partner){
        //dd($id);
        $id = auth()->user()->id;
        $messages=Message::where('receiver_id',$id)
        ->where('sender_id',$id_partner)
        ->orWhere('sender_id', $id)
        ->where('receiver_id',$id_partner)
        ->get();
        $partner=User::find($id_partner);
       // return view('messages.show',['messages'=>$messages],['id'=>$id]);
        return view('messages.show', compact(['id', 'messages','partner']));
    }
    //pour envoyer un message a partir du discussion
    public function storeDiscussion(){
        $id = auth()->user()->id; 
        $name=auth()->user()->name; 
        $receiver_id=request('receiver_id');
        $message=request('message');
       $messageObject=new Message();
       $messageObject->sender_id=$id;
       $messageObject->receiver_id=$receiver_id;
       $messageObject->message=$message;
       $messageObject->save();
       $destination=User::find($receiver_id);
       $identifiant=$id;
     //  dd($id,$name,$message,$destination);
    Notification::send($destination,new MessageNotification($message,$name,$identifiant));
       return redirect('/messages/'. $receiver_id);
    }

    public function destroy($id){
        $message=Message::find($id);
        $message->delete();
        return redirect('/messages');
    }

    //cette fonction permet de marquer une notification comme lu
    public function MarkAsReadNotifiation($id){
        $notification = auth()->user()->notifications()->where('id', $id)->first();
        if($notification){$notification->markAsRead();
        }
        return redirect('/annoncel?type=lost');
    }
}
