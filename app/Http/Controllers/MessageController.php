<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Notification;
use App\Notifications\MessageNotification;
class MessageController extends Controller
{
    //
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
      // dd($id);
       Notification::send($destination,new MessageNotification($message,$name,$id));
       return redirect('/annoncel?type=lost');
    }

    public function index(){
        $id = auth()->user()->id;
        $messages=Message::where('receiver_id',$id)->get();
        
        return view('messages.index',['messages'=>$messages]);
    }

    /*public function show(){
        $id = auth()->user()->id;
        $messages=Message::where('receiver_id',$id)->orWhere('sender_id', $id)->get();
        return view('messages.show',['messages'=>$messages],['id'=>$id]);
    }*/
}
