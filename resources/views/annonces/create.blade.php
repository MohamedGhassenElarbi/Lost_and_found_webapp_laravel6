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
				<form id="checkout-form" class="clearfix" method="Post" action="{{ url('annonce/store') }}"enctype="multipart/form-data">
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
							<!--<div class="form-group">
                                <input class="input" type="text" name="typeObjet"id="typeObjet" placeholder="Type d'objet"value=>
                                <p class="danger">{{$errors->first('typeObjet')}}</p>
							</div>-->
							<div style="margin-bottom: 15px">
							<select class="input search-categories" name="typeObjet">
								@foreach($typeObjets as $typeObjet)
								<option value="{{$typeObjet->nomTypeObjet}}">{{$typeObjet-> nomTypeObjet}}</option>
								
								@endforeach
							</select>
							</div>

							<!--<div class="form-group">
                                <input class="input" type="text" name="image"id="image" placeholder="image"value=>
                                <p class="danger">{{$errors->first('image')}}</p>
							</div>-->
							<div class="form-group">
								<div class="custom-file">
									<input type="file" name="image"id="image" class="custom-file-input">
								</div>
							</div>

							<div class="input-checkbox">
								<input type="radio" name="typeAnnonce" id="lost" value="lost">
								<label for="payments-2">Déposer une annonce de type Lost</label>
								<div class="caption">
									<p>Vous avez perdu quelque chose ? Déposer une annonce de type "Lost"<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="typeAnnonce" id="found" value="found">
								<label for="payments-3">Déposer une annonce de type Found</label>
								<div class="caption">
									<p>Vous avez trouvé quelque chose ? Déposer une annonce de type "Found"<p>
								</div>
							</div>
							<!--<div class="form-group">
                                <input class="input" type="text" name="localisation"id="localisation" placeholder="localisation"value=>
                                <p class="danger">{{$errors->first('localisation')}}</p>
							</div>-->
							<div style="margin-bottom: 15px">
							<select class="input search-categories" name="localisation">
								@foreach($gouvernorats as $gouvernorat)
								<option value="{{$gouvernorat->nomGouvernorat}}">{{$gouvernorat-> nomGouvernorat}}</option>
								
								@endforeach
							</select>
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