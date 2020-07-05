@extends('base')
@section('content')
<!-- section -->
<p>&nbsp;</p>
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="/annonce_affichage/fetch_image/{{ $annonce->id }}" alt="something went wrong">
							</div>
							
						</div>
					
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<h2 class="product-name">{{$annonce->title}} </h2>
                            <h4>{{$annonce->typeAnnonce}}</h4>
							<h3 class="product-price">{{$annonce->typeObjet}}</h3>
						
							<p><i class="fa fa-map-marker"></i><strong> Localisation:</strong> {{$annonce->localisation}}</p>
							<p>{{$annonce->body}}</p>
							<p><strong> Auteur de l'annonce:</strong>{{$user->name}}</p>
							@if((auth()->user()->id)!=$user->id)
							<strong>Envoyer un message:</strong>
							<form id="checkout-form" class="clearfix" method="Post" action="{{ url('message/store') }}"enctype="multipart/form-data">
							@csrf
							<div class="form-group">
                                <input class="input" type="text" name="message"id="message" placeholder="message"value=>
                                <p class="danger"></p>
							</div>
							<input type="hidden" id="receiver_id" name="receiver_id" value="{{$user->id}}">
							<div class="form-group">
							<button type="submit" class="primary-btn"><i class="fa fa-envelope"></i> Envoyer</button>
							</div>
							</form>
							<div class="product-btns">
								
								<a href="/user/show/{{$user->id}}"><button class="primary-btn add-to-cart"><i class="fa fa-user"></i> Consulter son Profil</button></a>
							</div>
							@endif
						</div>
					</div>
					

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection