@extends('base')
@section('content')
<!-- section -->
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Les Annonces</h2>
					</div>
				</div>
				<!-- section title -->

			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- Product Single -->
				@foreach($annonces as $annonce)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
							</div>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i><a href="/annonce/{{$annonce->id}}"> Quick view</a></button>
							<img src="annonce_affichage/fetch_image/{{ $annonce->id }}" alt="erreur" width="200" height="250">
						</div>
						<div class="product-body">
							<h3 class="product-price">{{$annonce->title}}</h3>
							<h2 class="product-name"><a href="#">{{$annonce->typeAnnonce}}</a></h2>
							<h3 class="product-name"><a href="#">{{$annonce->typeObjet}}</a></h3>
                            <h3 class="product-name"><a href="#"><i class="fa fa-map-marker"></i>{{$annonce->localisation}}</a></h3>
							<div class="product-btns">
								
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
				@endforeach
			</div>
			
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection