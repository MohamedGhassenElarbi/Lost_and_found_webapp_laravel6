@extends('base')
@section('content')
 <!-- section -->
 <div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
			<div class="header-search">
					</div>
				<form id="checkout-form" class="clearfix" method="Post" action="/annonce/{{$annonce->id}}/update">
                @csrf
                @method('PUT')
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Modifier une Annonce</h3>
                            </div>
							<div class="form-group">
								<input class="input" type="text" name="title"id="title" placeholder="Titre" value="{{$annonce->title}}" >
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="typeObjet"id="typeObjet" placeholder="Type d'objet"value="{{$annonce->typeObjet}}">
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="image"id="image" placeholder="image"value="{{$annonce->image}}">
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="localisation"id="localisation" placeholder="localisation"value="{{$annonce->localisation}}">
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="body"id="body" placeholder="description"value="{{$annonce->body}}">
							</div>
							<div class="form-group">
							<button type="submit" class="primary-btn">Modifier l'annonce</button>
							</div>
						</div>
					</div>
					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection