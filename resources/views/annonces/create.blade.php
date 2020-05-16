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
				<form id="checkout-form" class="clearfix" method="Post" action="/annonce/store">
                @csrf
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Ajouter une Annonce</h3>
                            </div>
							<div class="form-group">
								<input class="input" type="text" name="title"id="title" placeholder="Titre" value= >
                                <p class="danger">{{$errors->first('title')}}</p>
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="typeObjet"id="typeObjet" placeholder="Type d'objet"value=>
                                <p class="danger">{{$errors->first('typeObjet')}}</p>
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="image"id="image" placeholder="image"value=>
                                <p class="danger">{{$errors->first('image')}}</p>
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="localisation"id="localisation" placeholder="localisation"value=>
                                <p class="danger">{{$errors->first('localisation')}}</p>
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="body"id="body" placeholder="description"value=>
                                <p class="danger">{{$errors->first('body')}}</p>
							</div>
							<div class="form-group">
							<button type="submit" class="primary-btn">Ajouter l'annonce</button>
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