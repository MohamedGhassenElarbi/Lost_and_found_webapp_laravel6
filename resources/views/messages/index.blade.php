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
                <th>{{$message->sender_id}}</th>
                <th>{{$message->message}}</th>
                <th>
                    <a href="#">
                        <button type="button" class="btn btn-primary">plus de détails</button>
                    </a>
                    <a href="#">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
 @endsection