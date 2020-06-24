
@extends('base')
@section('content')

<head>
<link type="text/css" rel="stylesheet" href="/css/chat.css" />
</head>
<body>
<div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          
          <div class="inbox_chat">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="/img/avatar2.jpg" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>{{$partner->name}}</h5>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
        <div class="mesgs">
          <div class="msg_history">
            @foreach($messages as $message)
            @if(($message->sender_id)==$id)
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{$message->message}}</p>
                <span class="time_date">{{$message->created_at}}</span> </div>
            </div>
            @else
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="/img/avatar.jpg" alt=""> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{$message->message}}</p>
                  <span class="time_date">{{$message->created_at}}</span></div>
              </div>
            </div>
            @endif
            @endforeach
          </div>
          <form method="Post" action="{{ url('/message/storeDescussion') }}">
          @csrf
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message"name="message"id="message" />
              <input type="hidden" id="receiver_id" name="receiver_id" value="{{$partner->id}}">
              <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
          </form>
        </div>
      </div>
      
    
    </body>
    
    @endsection