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
						<div class="product-body">
							<h2 class="product-name">{{$user->name}} </h2>
                            
							<h3 class="product-price"><i class="fa fa-envelope"></i><strong> Email:  </strong>{{$user->email}}</h3>
                            <h3 class="product-price"><i class="fa fa-phone"></i><strong> Telephone:  </strong>{{$user->phone_number}}</h3>
                            <h3 class="product-price"><i class="fa fa-map-marker"></i><strong> Localisation:  </strong>{{$user->adress}}</h3>
							
							
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