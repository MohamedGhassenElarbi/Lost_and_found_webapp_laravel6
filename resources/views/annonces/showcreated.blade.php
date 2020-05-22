@extends('base')
@section('content')
<!--<table class="table table-hover">
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
    </table>-->
    <div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Mes Annonces</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Annonce</th>
										<th></th>
										<th class="text-center">Type d'objet</th>
										<th class="text-center">Localisation</th>
										<th class="text-center">Body</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
                                @foreach($annonces as $annonce)
									<tr>
										<td class="thumb"><img src="annonce_affichage/fetch_image/{{ $annonce->id }}" alt=""></td>
										<td class="details">
											<a href="#">{{$annonce->title}}</a>
											<ul>
												<li><span>Type D'annonce:{{$annonce->typeAnnonce}} </span></li>
												
											</ul>
										</td>
                                        <td class="price text-center"><strong>{{$annonce->typeObjet}}</strong><br><!--<del class="font-weak"><small>sous type</small></del>--></td>
                                        <td class="total text-center"><strong class="primary-color">{{$annonce->localisation}}</strong></td>
										<td class="text-center"><span>{{$annonce->body}} </span></td>
										
										<td class="text-right">
                                            <a href="/annonce/{{$annonce->id}}">
                                                <button type="button" class="btn btn-primary">plus de détails</button>
                                            </a>
                                             <a href="/annonce/{{$annonce->id}}/edit">
                                                <button type="button" class="btn btn-warning">Modification</button>
                                            </a>
                                            <a href="/annonce/{{$annonce->id}}/destroy">
                                                <button type="button" class="btn btn-danger">Supprimer</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
								</tbody>
							</table>
							
						</div>

					</div>
@endsection