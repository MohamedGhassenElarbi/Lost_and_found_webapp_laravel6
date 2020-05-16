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
								<img src="{{$annonce->image}}" alt="something went wrong">
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
							

							<div class="product-btns">
								<button class="primary-btn add-to-cart"><i class="fa fa-user"></i> Contacter</button>
							</div>
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