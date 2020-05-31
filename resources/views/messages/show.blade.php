
<html>
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="/css/chat.css" />
</head>
<body>
<div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="/img/avatar2.jpg" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
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
          <div class="type_msg">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
            </div>
          </div>
        </div>
      </div>
      
    
    </body>
    </html>