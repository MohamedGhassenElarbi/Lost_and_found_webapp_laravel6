@extends('base')
@section('content')
<table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Titre</th>
            <th scope="col">Type d'annonce</th>
            <th scope="col">Type d'objet</th>
            <th scope="col">Localisation</th>
            <th scope="col">Description</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach($annonces as $annonce)
            <tr> 
                <th>{{$annonce->id}}</th>
                <th>{{$annonce->title}}</th>
                <th>{{$annonce->typeAnnonce}}</th>
                <th>{{$annonce->typeObjet}}</th>
                <th>{{$annonce->localisation}}</th>
                <th>{{$annonce->body}}</th>
                <th>
                    <a href="/annonce/{{$annonce->id}}">
                        <button type="button" class="btn btn-primary">plus de détails</button>
                    </a>
                    <a href="/annonce/{{$annonce->id}}/edit">
                        <button type="button" class="btn btn-warning">Modification</button>
                    </a>
                    <a href="/annonce/{{$annonce->id}}/destroy">
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection