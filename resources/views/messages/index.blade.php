@extends('base')
@section('content')
<table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Nom</th>
            <th scope="col">Message</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach($messages as $message)
            <tr> 
                
                <th><img src="/img/avatar2.jpg" width="50px"></img></th>
                <th>{{$message->name}}</th>
                <th>{{$message->message}}</th>
                <th>
                    <a href="/messages/{{$message->sender_id}}">
                        <button type="button" class="btn btn-primary">Accéder au conversation</button>
                    </a>
                    
                    <a href="/message/destroy/{{$message->id}}">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </a>
                    
                </th>
                
            </tr>
            @endforeach
        </tbody>
    </table>
 @endsection