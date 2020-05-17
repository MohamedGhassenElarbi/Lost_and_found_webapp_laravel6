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
				<form id="checkout-form" class="clearfix" method="Post" action="/user/{{$user->id}}/update">
                @csrf
                @method('PUT')
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Modifier Mes Données Personnelles</h3>
                            </div>
							<div class="form-group">
								<input class="input" type="text" name="name"id="name" placeholder="name" value="{{$user->name}}" >
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="email"id="email" placeholder="email"value="{{$user->email}}">
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="adress"id="adress" placeholder="adress"value="{{$user->adress}}">
							</div>
							<div class="form-group">
                                <input class="input" type="text" name="phone_number"id="phone_number" placeholder="phone_number"value="{{$user->phone_number}}">
							</div>
							<div class="form-group">
							<button type="submit" class="primary-btn">Modifier Mes Données</button>
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