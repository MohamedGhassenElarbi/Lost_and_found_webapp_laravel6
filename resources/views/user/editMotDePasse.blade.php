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
				<form id="checkout-form" class="clearfix" method="Post" action="/user/updateMotDePasse">
                @csrf
                @method('PUT')
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Ancient Mot de passe vérifiée </h3>
                                <h4 class="title">Saisir le nouveau Mot de passe </h4>
                            </div>
							<div class="form-group">
								<input class="input" type="text" name="mdp"id="mdp" placeholder="Mot de passe" value="" >
							</div>
							<div class="form-group">
							<button type="submit" class="primary-btn">Confirmer</button>
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