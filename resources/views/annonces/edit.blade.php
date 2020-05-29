@extends('base')
@section('content')
 <!-- section -->
 <div class="section">
		<!-- container -->
		<div class="container">
			
			<!-- row -->
			<div class="row">
					<div class="col-md-4 image_update">
						<div id="product-main-view">
							<div class="product-view">
								<img src="/annonce_affichage/fetch_image/{{ $annonce->id }}" alt="something went wrong">
							</div>
							
						</div>
					
					</div>
			
				<form id="checkout-form" class="clearfix" method="Post" action="/annonce/{{$annonce->id}}/update"enctype="multipart/form-data">
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
							<!--<div class="form-group">
                                <input class="input" type="text" name="typeObjet"id="typeObjet" placeholder="Type d'objet"value="{{$annonce->typeObjet}}">
							</div>-->
							<div style="margin-bottom: 15px">
							<select class="input search-categories" name="typeObjet" >
								@foreach($typeObjets as $typeObjet)
								<option value="{{$typeObjet->nomTypeObjet}}" 
								@if(($typeObjet->nomTypeObjet)==$annonce->typeObjet)
									selected
								@endif
								>{{$typeObjet-> nomTypeObjet}}</option>
								
								@endforeach
							</select>
							</div>
							<!--<div class="form-group">
                                <input class="input" type="text" name="image"id="image" placeholder="image"value="{{$annonce->image}}">
							</div>-->
							<div class="form-group">
								<div class="custom-file">
									<input type="file" name="image"id="image" class="custom-file-input">
								</div>
							</div>
							<!--<div class="form-group">
                                <input class="input" type="text" name="localisation"id="localisation" placeholder="localisation"value="{{$annonce->localisation}}">
							</div>-->
							<div style="margin-bottom: 15px">
							<select class="input search-categories" name="localisation" >
								@foreach($gouvernorats as $gouvernorat)
								<option value="{{$gouvernorat->nomGouvernorat}}" 
								@if($gouvernorat->nomGouvernorat==$annonce->localisation)
									selected
								@endif
								>{{$gouvernorat->nomGouvernorat}}</option>
								
								@endforeach
							</select>
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