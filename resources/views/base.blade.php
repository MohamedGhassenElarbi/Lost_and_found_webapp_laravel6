
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-SHOP HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
	

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="/css/style.css" />
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="index.php">
							<img src="/img/logo_farkess.png" alt="" height="150px">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form action="/search" method="get">
							<input class="input search-input" type="text" placeholder="Chercher ici" name="search">
							<select class="input search-categories" name="typeAnnonce">
								<option value="lost">Recherche sur annonces de type Lost</option>
								<option value="found">Recherche sur annonces de type Found</option>
								
							</select>
							<button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
					
					<!-- Cart -->
					<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-bell"></i>
									<span class="qty">{{count(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ReponseSurAnnonce'))}}</span>
								</div>
							</a>
							
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
									@if((count(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ReponseSurAnnonce')))!=null)
										@foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ReponseSurAnnonce') as $notification)
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="annonce_affichage/fetch_image/{{$notification->data['identifiant']}}" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name">{{$notification->data['typeObjet']}}</h3>
												<h2 class="product-name"><a href="/annonce/{{$notification->data['identifiant']}}">{{$notification->data['title']}}</a></h2>
											</div>
											<button class="cancel-btn">{{$notification->markAsRead()}}<i class="fa fa-eye"></i></button>
										</div>
										@endforeach
									@else
									<h5>Pas de notifications</h5>
									@endif
									</div>
									<div class="shopping-cart-btns">
										<a href="/notifications"><button class="main-btn"style="width: 100%;">Afficher tous</button></a>
										
									</div>
								</div>
							</div>
						</li>
					<!-- /Cart -->
					<!-- messages -->
					<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-envelope"></i>
									<span class="qty">{{count(auth()->user()->unreadNotifications->where('type', 'App\Notifications\MessageNotification'))}}</span>
								</div>
							</a>
							
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
									@if((count(auth()->user()->unreadNotifications->where('type', 'App\Notifications\MessageNotification')))!=null)
										@foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\MessageNotification') as $notification)
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="/img/avatar.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-name">{{$notification->data['name']}}</h3>
												<h2 class="product-name"><a href="">{{$notification->data['message']}}</a></h2>
											</div>
											<button class="cancel-btn">{{$notification->markAsRead()}}<i class="fa fa-eye"></i></button>
										</div>
										@endforeach
									@else
									<h5>Pas de Messages</h5>
									@endif
									</div>
									<div class="shopping-cart-btns">
										<a href="/messages"><button class="main-btn"style="width: 100%;">Afficher tous</button></a>
										
									</div>
								</div>
							</div>
						</li>
					<!-- /messages -->
					<!-- Account -->
					@guest
					<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Login <i class="fa fa-caret-down"></i></strong>
							</div>
							
						</li>
					@else
					<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<a><i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></strong>
							</div>
							<a class="text-uppercase" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
							<ul class="custom-menu">
								<li><a href="/user/edit"><i class="fa fa-user-o"></i> Modifier mes Données</a></li>
								<li><a href="/user/affVerifMotDePasse"><i class="fa fa-lock"></i></i> Changer mot de passe</a></li>
								<li><a href="/annonces"><i class="fa fa-file"></i> Mes Annonces</a></li>
							</ul>
						</li>
						
					@endguest
					<!-- /Account -->
					
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="/annonce/create">Déposer une annonce</a></li>
                        <li><a href="/annoncel?type=lost">Les annonces des objets perdus</a></li>
                        <li><a href="/annoncel?type=found">Les annonces des objets trouvées</a></li>



					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	
	@yield('content')

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="./img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Compare</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="#">Login</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->
	

	<!-- jQuery Plugins -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/slick.min.js"></script>
	<script src="../js/nouislider.min.js"></script>
	<script src="../js/jquery.zoom.min.js"></script>
	<script src="../js/main.js"></script>

</body>

</html>
