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
				<form id="checkout-form" class="clearfix" method="Get" action="/user/verifMotDePasse">
                @csrf
                
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Saisir votre ancient Mot de Passe </h3>
                            </div>
							<div class="form-group">
								<input class="input" type="password" name="mdp"id="mdp" placeholder="Mot de passe" value="" >
							</div>
							<div class="form-group">
							<button type="submit" class="primary-btn">Vérifier votre mot de passe</button>
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