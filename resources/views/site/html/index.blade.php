<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Armonya</title>
		<meta charset="utf-8">
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Armonya Société de fiscalisation.">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Merriweather:300,400,700%7CBarlow:400,400i,600,700' rel='stylesheet'>
		<!-- Css -->
		<link rel="stylesheet" href="{{asset('/site/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('/site/css/font-icons.css')}}" />
		<link rel="stylesheet" href="{{asset('/site/css/cookieconsent.min.css')}}" />
		<link rel="stylesheet" href="{{asset('/site/css/style.css')}}" />
		<!-- Favicons -->
		<link rel="shortcut icon" href="{{asset('/favicon.ico')}}">
		<link rel="apple-touch-icon" href="https://deothemes.com/envato/casumi/html/img/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">
	</head>

	<body>
		<!-- Preloader -->
		<div class="loader-mask">
			<div class="loader">
				"Loading..."
			</div>
		</div>
		<main class="main-wrapper">
			<!-- Navigation -->
			<header class="nav">
				<div class="nav__holder nav--sticky">
					<div class="container-fluid container-semi-fluid nav__container">
						<div class="flex-parent">
							<div class="nav__header">
								<!-- Logo -->
								<a href="/" class="logo-container">
									<img class="logo" src="{{ url('common/logo.png') }}"  alt="logo">
								</a>

								<!-- Mobile toggle -->
								<button type="button" class="nav__icon-toggle" id="nav__icon-toggle" data-toggle="collapse" data-target="#navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="nav__icon-toggle-bar"></span>
									<span class="nav__icon-toggle-bar"></span>
									<span class="nav__icon-toggle-bar"></span>
								</button> 
							</div>                      

							<!-- Navbar -->
							<nav id="navbar-collapse" class="nav__wrap collapse navbar-collapse nav--align-right">
								<ul class="nav__menu">
									<li class="nav__dropdown active">
										<a href="{{url('/')}}" aria-haspopup="true">Home</a>
									</li>
									<li class="nav__dropdown">
										<a href="{{url('/')}}" aria-haspopup="true">Qui Somme Nous?</a>
									</li>
									<li class="nav__dropdown">
										<a href="{{url('/')}}" aria-haspopup="true">Devenir Partenaire</a>
									</li>
									<li class="nav__dropdown">
										<a href="{{url('/')}}" aria-haspopup="true">Contact</a>
									</li>
								</ul> <!-- end menu -->

								<!-- Mobile Phone -->
								<div class="nav__phone-mobile d-lg-none">
									<a href="#" class="">Espace Partenaire</a>
									@auth
										<a href="{{ url('/dashboard') }}">Application</a>
									@else
										<a href="{{ route('login') }}">Application</a>
										<a href="{{ route('register') }}">Espace Partenaire</a>
										{{-- @if (Route::has('register'))
											<a href="{{ route('register') }}">Register</a>
										@endif --}}
									@endauth
								</div>
								
								

								<!-- Mobile Search -->
								{{-- <div class="nav__search-mobile d-lg-none">
									<form role="search" method="get" class="search-form relative">
										<input type="search" class="search-input" placeholder="Search" />
										<button type="submit" class="search-button" aria-label="search button"><i class="ui-search search-icon"></i></button>
									</form>
								</div> --}}

							</nav> <!-- end nav-wrap -->            


							<!-- Nav Right -->
							<div class="nav__right d-none d-lg-flex">
								<div class="nav__right-item">
									
									<a href="#" class="">Espace Partenaire</a>
									@guest
									<a href="{{ route('login') }}" class="" style="margin-left: 20px;">Connexion</a>
									@else
									<a href="{{ route('login') }}" class="" style="margin-left: 20px;">{{ Auth::user()->name }}</a>
									@endguest
								</div>
							</div> <!-- end nav right -->
							
						</div> <!-- end flex-parent -->
					</div> <!-- end container -->

				</div>
			</header> <!-- end navigation -->

			<div class="content-wrapper oh">

				<!-- Hero -->
				<section class="hero">
					<div class="slick-custom-arrows">

						<div class="hero__item slick-slide">
							<div class="row no-gutters">
								<div class="col-lg-4 order-lg-1 order-2">
									<div class="hero__img" style="background-image: url('{{ url('/site/img/hero/hero_slide_1.jpg') }}')" >
										<img src="{{ url('/site/img/hero/hero_slide_1.jpg') }}" alt="" class="d-none">
									</div>                

									<!-- Slider nav -->
									<div class="slick-custom-nav">
										<button class="slick-custom-nav__prev slick-prev slick-arrow" type="button" aria-label="prev">Prev ></button>
										<button class="slick-custom-nav__next slick-next slick-arrow" type="button" aria-label="next">Next ></button>
									</div>

								</div>                
								<div class="col-lg-8 order-1 order-lg-2">
									<div class="hero__text-holder">
										<h3 class="hero__subtitle">Rendez-vous gratuit</h3>
										<h1 class="hero__title hero__title--boxed">Experts en finance<span class="hero__dot">.</span></h1>
										<a href="index.html#" class="btn btn--lg btn--color">
											<span>Rendez-vous Gratuit</span>
										</a>                  
									</div>
								</div>            
							</div>
						</div> <!-- .hero__item -->

						<div class="hero__item slick-slide">
							<div class="row no-gutters">
								<div class="col-lg-4 order-lg-1 order-2">
									<div class="hero__img" style="background-image: url({{ url('site/img/hero/hero_slide_2.jpg') }})" >
										<img src="{{ url('site/img/hero/hero_slide_2.jpg') }}" alt="" class="d-none">
									</div>
						
									<!-- Slider nav -->
									<div class="slick-custom-nav">
										<button class="slick-custom-nav__prev slick-prev slick-arrow" type="button" aria-label="prev">Prev ></button>
										<button class="slick-custom-nav__next slick-next slick-arrow" type="button" aria-label="next">Next ></button>
									</div>
						
								</div>
								<div class="col-lg-8 order-1 order-lg-2">
									<div class="hero__text-holder">
										<h3 class="hero__subtitle">Advanced Consulting Services</h3>
										<h1 class="hero__title hero__title--boxed">Invest In Your Future<span class="hero__dot">.</span></h1>
										<a href="index.html#" class="btn btn--lg btn--color">
											<span>Rendez-vous Gratuit</span>
										</a>
									</div>
								</div>
							</div>
						</div> <!-- .hero__item -->
						
						{{-- 
						<div class="hero__item slick-slide">
							<div class="row no-gutters">
								<div class="col-lg-4 order-lg-1 order-2">
									<div class="hero__img" style="background-image: url('img/hero/hero_slide_3.jpg')" >
										<img src="img/hero/hero_slide_3.jpg" alt="" class="d-none">
									</div>

									<!-- Slider nav -->
									<div class="slick-custom-nav">
										<button class="slick-custom-nav__prev slick-prev slick-arrow" type="button" aria-label="prev">Prev ></button>
										<button class="slick-custom-nav__next slick-next slick-arrow" type="button" aria-label="next">Next ></button>
									</div>

								</div>                
								<div class="col-lg-8 order-1 order-lg-2">
									<div class="hero__text-holder">
										<h3 class="hero__subtitle">Advanced Consulting Services</h3>
										<h1 class="hero__title hero__title--boxed">Financial Advisors At Your Service<span class="hero__dot">.</span></h1>
										<a href="index.html#" class="btn btn--lg btn--color">
											<span>Contact Us</span>
										</a>                  
									</div>
								</div>            
							</div>
						</div> <!-- .hero__item --> --}}
						
					</div> <!-- .owl -->
				</section> <!-- end hero -->

				<!-- Services Title -->
				<section class="section-wrap bg-dark">
					<div class="container">
						<div class="title-row mb-56">
							<h2 class="section-title text-center">Competency and Quality Services</h2>
						</div>
					</div>        
				</section> <!-- end services title -->

				<!-- Service Boxes -->
				<div class="offset-top-100">
					<div class="container">      
						<div class="slick-service-boxes slick-slider-row">

							<div class="slick-slide slick-slider-col slick-service-boxes__item">
								<a href="index.html#" class="service box-shadow hover-line hover-down">
									<i class="service__icon o-business-report-1"></i>
									<h4 class="service__title">Strategy & Planning</h4>
									<p class="service__text">We also provide tangible results and measurable long-term value business.</p>
								</a>
							</div>

							<div class="slick-slide slick-slider-col slick-service-boxes__item">
								<a href="index.html#" class="service box-shadow hover-line hover-down">
									<i class="service__icon o-sales-performance-up-1"></i>
									<h4 class="service__title">Finance Services</h4>
									<p class="service__text">We also provide tangible results and measurable long-term value business.</p>
								</a>
							</div>

							<div class="slick-slide slick-slider-col slick-service-boxes__item">
								<a href="index.html#" class="service box-shadow hover-line hover-down">
									<i class="service__icon o-social-1"></i>
									<h4 class="service__title">Management</h4>
									<p class="service__text">We also provide tangible results and measurable long-term value business.</p>
								</a>
							</div>

							<div class="slick-slide slick-slider-col slick-service-boxes__item">
								<a href="index.html#" class="service box-shadow hover-line hover-down">
									<i class="service__icon o-strategy-1"></i>
									<h4 class="service__title">Sales growth</h4>
									<p class="service__text">We also provide tangible results and measurable long-term value business.</p>
								</a>
							</div>

						</div> <!-- end slick-service-boxes -->
					</div>
				</div>

				{{-- <!-- Promo Section -->
				<section class="section-wrap promo section-wrap--pt-180">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 mb-md-72">
								<h2 class="promo__title">We bring the right people together</h2>
								<p class="promo__text lead">As you may already know, there are an infinite number of things you can test on your site to help you increase sales. 
								From layout to copy to design, there are limitless combinations of changes that may improve your visitor-to-sale conversion rate.</p>
								<a href="index.html#" class="btn btn--lg btn--color">
									<span>Contact Us</span>
								</a>
							</div>
							<div class="col-lg-7 offset-lg-1 mt-md-72">
								<img src="img/promo/promo_img_1.jpg" class="promo__img promo__img-1" alt="">
								<img src="img/promo/promo_img_2.jpg" class="promo__img promo__img-2" alt="">
							</div>
						</div>
					</div> 
				</section> <!-- end promo section -->


				<!-- Testimonials -->
				<section class="section-wrap pt-48">
					<div class="slick-custom-arrows">

						<div class="slick-slide ">
							<div class="testimonial">
								<div class="testimonial__img-holder" style="background-image: url('img/testimonials/testimonial_1.jpg')">
									<img src="img/testimonials/testimonial_1.jpg" class="testimonial__img d-none" alt="">
									<!-- Slider nav -->
									<div class="slick-custom-nav">
										<button class="slick-custom-nav__prev slick-prev slick-arrow" type="button" aria-label="prev">Prev ></button>
										<button class="slick-custom-nav__next slick-next slick-arrow" type="button" aria-label="next">Next ></button>
									</div> 
								</div>
								<div class="testimonial__info">
									<div class="testimonial__info-container">
										<h2 class="section-title">Service Is Top-notch</h2>
										<p class="testimonial__text">Every detail has been taken care these team are realy amazing and talented! They can help me with fast and accurate
										solutions to all kinds of issues. Love it! Five stars for them.</p>
										<span class="testimonial__author">Joeby Ragpa</span>
										<span class="testimonial__company">DeoThemes</span>
									</div>
								</div>
							</div>
						</div> <!-- end slide -->

						<div class="slick-slide ">
							<div class="testimonial">
								<div class="testimonial__img-holder" style="background-image: url('img/testimonials/testimonial_2.jpg')">
									<img src="img/testimonials/testimonial_2.jpg" class="testimonial__img d-none" alt="">
									<!-- Slider nav -->
									<div class="slick-custom-nav">
										<button class="slick-custom-nav__prev slick-prev slick-arrow" type="button" aria-label="prev">Prev ></button>
										<button class="slick-custom-nav__next slick-next slick-arrow" type="button" aria-label="next">Next ></button>
									</div> 
								</div>
								<div class="testimonial__info">
									<div class="testimonial__info-container">
										<h2 class="section-title">They Are The Best</h2>
										<p class="testimonial__text">Every detail has been taken care these team are realy amazing and talented! They can help me with fast and accurate
										solutions to all kinds of issues. Love it! Five stars for them.</p>
										<span class="testimonial__author">Mick Jagger</span>
										<span class="testimonial__company">Google</span>
									</div>
								</div>
							</div>
						</div> <!-- end slide -->

						<div class="slick-slide ">
							<div class="testimonial">
								<div class="testimonial__img-holder" style="background-image: url('img/testimonials/testimonial_3.jpg')">
									<img src="img/testimonials/testimonial_3.jpg" class="testimonial__img d-none" alt="">
									<!-- Slider nav -->
									<div class="slick-custom-nav">
										<button class="slick-custom-nav__prev slick-prev slick-arrow" type="button" aria-label="prev">Prev ></button>
										<button class="slick-custom-nav__next slick-next slick-arrow" type="button" aria-label="next">Next ></button>
									</div> 
								</div>
								<div class="testimonial__info">
									<div class="testimonial__info-container">
										<h2 class="section-title">100% Satisfied</h2>
										<p class="testimonial__text">Every detail has been taken care these team are realy amazing and talented! They can help me with fast and accurate
										solutions to all kinds of issues. Love it! Five stars for them.</p>
										<span class="testimonial__author">Jessica Lopez</span>
										<span class="testimonial__company">Apple</span>
									</div>
								</div>
							</div>
						</div> <!-- end slide -->

					</div>
				</section> <!-- end testimonials -->

				<!-- From Blog -->
				<section class="section-wrap pt-0 pb-0">
					<div class="container">
						<div class="title-row text-center">
							<h2 class="section-title">Latest News</h2>
						</div>
						<div class="row">

							<div class="col-lg-4">
								<article class="entry entry-card">
									<div class="entry__header">
										<a href="single-post-1.html">
											<img src="img/blog/masonry/blog_post_1.jpg" class="entry__img" alt="">
										</a>
										<div class="entry__category">
											<a href="single-post-1.html" class="entry__category-item">Finance</a>
											<a href="single-post-1.html" class="entry__category-item">Management</a>
										</div>
									</div>
									<div class="entry__body">                    
										<h4 class="entry__title">
											<a href="single-post-1.html">Business Mistakes to Avoid When Starting a Business</a>
										</h4>
										<div class="entry__meta">
											<span class="entry__meta-item entry__meta-author">
												<a href="index.html#" class="entry__meta-author-url">
													<img src="img/blog/author.png" class="entry__meta-author-img" alt="">
													<span class="entry__meta-author-name">Alexander Samokhin</span>
												</a>
											</span>
											<span class="entry__meta-item entry__meta-date">July 06, 2019</span>
										</div>
									</div>
								</article>
							</div>

							<div class="col-lg-4">
								<article class="entry entry-card">
									<div class="entry__header">
										<a href="single-post-1.html">
											<img src="img/blog/masonry/blog_post_2.jpg" class="entry__img" alt="">
										</a>
										<div class="entry__category">
											<a href="single-post-1.html" class="entry__category-item">Taxes</a>
										</div>
									</div>
									<div class="entry__body">                    
										<h4 class="entry__title">
											<a href="single-post-1.html">Utilize these nine resources to help you take the stress out of preparing your taxes</a>
										</h4>
										<div class="entry__meta">
											<span class="entry__meta-item entry__meta-author">
												<a href="index.html#" class="entry__meta-author-url">
													<img src="img/blog/author.png" class="entry__meta-author-img" alt="">
													<span class="entry__meta-author-name">Alexander Samokhin</span>
												</a>
											</span>
											<span class="entry__meta-item entry__meta-date">July 06, 2019</span>
										</div>
									</div>
								</article>
							</div>

							<div class="col-lg-4">
								<article class="entry entry-card">
									<div class="entry__header">
										<a href="single-post-1.html">
											<img src="img/blog/masonry/blog_post_3.jpg" class="entry__img" alt="">
										</a>
										<div class="entry__category">
											<a href="single-post-1.html" class="entry__category-item">Productivity</a>
										</div>
									</div>
									<div class="entry__body">                    
										<h4 class="entry__title">
											<a href="single-post-1.html">Investment Update, Successful people ask better questions</a>
										</h4>
										<div class="entry__meta">
											<span class="entry__meta-item entry__meta-author">
												<a href="index.html#" class="entry__meta-author-url">
													<img src="img/blog/author.png" class="entry__meta-author-img" alt="">
													<span class="entry__meta-author-name">Alexander Samokhin</span>
												</a>
											</span>
											<span class="entry__meta-item entry__meta-date">July 06, 2019</span>
										</div>
									</div>
								</article>
							</div>

						</div>
					</div>
				</section> <!-- end from blog -->


				<!-- CTA -->
				<section class="section-wrap call-to-action text-center section-wrap--pb-140 bg-white-gradient" style="background-image: url('img/cta/cta_img_1.jpg');">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-6">

								<h3 class="call-to-action__title">
									Ready to get started? Get your Finance out of the way
								</h3>
								<p class="call-to-action__text lead">If you deliver enough value, making money becomes the easy part. Why should you be stressful? Let us make this easier
								for you.</p>
								<a href="index.html#" class="btn btn--lg btn--color">
									<span>Contact Us</span>
								</a>               

							</div>
						</div>
					</div> 
				</section> <!-- end cta --> --}}

				<!-- Footer -->
				<footer class="footer">
					<div class="container">
						<div class="footer__widgets">
							<div class="row">

								<div class="col-lg-3 col-md-6">
									<div class="widget widget-about-us">
										<!-- Logo -->
										<a href="index.html" class="logo-container flex-child">
											<img class="logo" src="{{url('common/logo_black.png')}}" alt="logo">
										</a>
										<div class="socials mt-32">
											<a href="{{url('/')}}" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>
											<a href="{{url('/')}}" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
											<a href="{{url('/')}}" class="social social-google-plus" aria-label="google plus" title="google plus" target="_blank"><i class="ui-google"></i></a>
										</div>
									</div>
								</div> <!-- end about us -->

								<div class="col-lg-3 offset-lg-3 col-md-6">
									<div class="widget widget_nav_menu">
										<h5 class="widget-title">Solutions</h5>
										<ul>
											<li><a href="{{url('/')}}">Finance Strategy</a></li>
											<li><a href="{{url('/')}}">Finance Strategy</a></li>
											<li><a href="{{url('/')}}">Finance Strategy</a></li>
										</ul>
									</div>
								</div>

								<div class="col-lg-3 col-md-6">
									<div class="widget widget-address">
										<h5 class="widget-title">ARMONYA</h5>
										<ul>
											<li><address>7147, rue de La Fleur, Paris</address></li>
											<li>
												<span>Phone: </span>
												<a href="tel:+ 0000000">+ 0000000  </a>
											</li>
											<li>
												<span>Email: </span>
												<a href="mailto:contact@armonya.fr">contact@armonya.fr</a>
											</li>
										</ul>
									</div>
								</div>

							</div>
						</div>
					</div> <!-- end container -->

					<div class="footer__bottom">
						<div class="container">
							<div class="row">              
								<div class="col-lg-6">
									<div class="widget widget_nav_menu">
										<ul>
											<li><a href="{{url('/')}}">About</a></li>
											<li><a href="{{url('/')}}">Services</a></li>
											<li><a href="{{url('/')}}">Rendez-vous</a></li>
											<li><a href="{{url('/')}}">Politique de confidentialité</a></li>
											<li><a href="{{url('/')}}">Contact</a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-6 text-right text-md-center">
									<span class="copyright">
										&copy; 2019, Armonya Made by <a href="#">JRB</a>
									</span>
								</div>
							</div>            
						</div>
					</div> <!-- end footer bottom -->
				</footer> <!-- end footer -->

				<div id="back-to-top">
					<a href="{{url('/')}}#top"><i class="ui-arrow-up"></i></a>
				</div>

			</div> <!-- end content wrapper -->
		</main> <!-- end main wrapper -->

		<!-- jQuery Scripts -->
		<script src="{{asset('/site/js/jquery.min.js')}}"></script>
		<script src="{{asset('/site/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('/site/js/plugins.js')}}"></script>
		<script src="{{asset('/site/js/scripts.js')}}"></script>

		<!-- Cookies -->
		<script src="{{asset('/site/js/plugins/cookieconsent.min.js')}}"></script>
		<script src="{{asset('/site/js/cookies.js')}}"></script>
	</body>
</html>