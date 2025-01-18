<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="JoelGuerra" content="">

    <title>SG-NGANGULA</title>

    <!-- css -->
    <link href="{{ asset('estilo/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('estilo/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('estilo/plugins/cubeportfolio/css/cubeportfolio.min.css')}}">
	<link href="{{ asset('estilo/css/nivo-lightbox.css') }}" rel="stylesheet" />
	<link href="{{ asset('estilo/css/nivo-lightbox-theme/default/default.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('estilo/css/owl.carousel.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('estilo/css/owl.theme.css') }}" rel="stylesheet" media="screen" />
	<link href="{{ asset('estilo/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('estilo/css/style.css') }}" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="{{ asset('estilo/bodybg/bg1.css') }}" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="{{ asset('estilo/color/default.css') }}" rel="stylesheet">


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">


<div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="top-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
					<p class="bold text-left" >
                        <p id="dataHora" style="font-weight: bold;">
                            <?php
                            // Define o fuso horário
                            date_default_timezone_set('Africa/Luanda');
                            // Exibe a data e hora atuais
                            echo date('d/m/Y H:i:s');
                            ?>
                        </p>

                    </p>
					</div>
					<div class="col-sm-6 col-md-6">
					<p class="bold text-right">Linha de Atendimento: +244 942 788 029</p>
					</div>
				</div>
			</div>
		</div>
        <div class="container navigation">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('estilo/ngangula.jpg') }}" alt="" width="200" height="50" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#intro">Início</a></li>
				<li><a href="#doctor">Atendimento</a></li>
				<li><a href="#facilities">Sobre</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="badge custom-badge red pull-right">Extra</span>Serviços<b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="{{ route('agendar.index') }}">Agendamento de Consulta</a></li>
				  </ul>
				</li>
                    @guest
                    <a href="{{ route('register') }}" class="btn btn-skin btn-lg" style="background-color:#28a745">Registrar<i class="fa-solid fa-right-to-bracket"></i></a>
                    <a href="{{ route('login') }}" class="btn btn-skin btn-lg" style="background-color: #007BFF">Fazer login <i class="fa-solid fa-right-to-bracket"></i></a>
                    @endguest

                    @auth

                    @if (auth()->user()->tipo === 'admin')

                    <li class="ml-3"><a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Painel Administrador<i class="fa-solid fa-right-to-bracket"></i></a></li>
                    @endif
                    @if (auth()->user()->tipo === 'med')

                    <li><a href="{{ route('view.medico.dashboard') }}" class="btn btn-skin btn-lg">Painel Medico<i class="fa-solid fa-right-to-bracket"></i></a></li>
                    @endif

                    @if (auth()->user()->tipo === 'recep')

                    <li><a href="{{ route('recepcionista.dashboard') }}" class="btn btn-skin btn-lg">Painel Recepcionista<i class="fa-solid fa-right-to-bracket"></i></a></li>
                    @endif

                    @if (auth()->user()->tipo === 'user')
                    <li><a href="{{ route('agendar.index') }}" class="btn btn-skin btn-lg">Agendar Consulta<i class="fa-solid fa-right-to-bracket"></i></a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger btn-lg" type="submit">Sair
                            </button>
                        </form>
                        </li>

                    @endauth
			  </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<!-- Section: intro -->
    <section id="intro" class="intro">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
					<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
					<h1 class="h-ultra">HOSPITAL ESPECIALIZADO AUGUSTO N´GANGULA</h1>
					</div>
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
					<h5 class="h-light">Benefícios do Agendamento Online para Consultas Médicas</h5>
					</div>
						<div class="well well-trans">
						<div class="wow fadeInRight" data-wow-delay="0.1s">

						<ul class="lead-list">
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Praticidade</strong><br />Agende de qualquer lugar.</span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Otimização de Tempo</strong><br />Reduz filas e melhora a organização na clínica</span></li>
							<li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Acessibilidade</strong><br/>Disponível 24/7.</span></li>
						</ul>
						<p class="text-right wow bounceIn" data-wow-delay="0.4s">
						<a href="{{ route('agendar.index') }}" class="btn btn-skin btn-lg">Agendar Consulta <i class="fa fa-angle-right"></i></a>
						</p>
						</div>
						</div>


					</div>
					<div class="col-lg-6">
						<div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
						<img src="img/dummy/img-1.png" class="img-responsive" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>

	<!-- /Section: intro -->

	<!-- Section: boxes -->
    <section id="boxes" class="home-section paddingtop-80">

		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">

							<i class="fa fa-check fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Make an appoinment</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">

							<i class="fa fa-list-alt fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Choose your package</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">
							<i class="fa fa-user-md fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Help by specialist</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="wow fadeInUp" data-wow-delay="0.2s">
						<div class="box text-center">

							<i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
							<h4 class="h-bold">Get diagnostic report</h4>
							<p>
							Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- /Section: boxes -->


	<section id="callaction" class="home-section paddingtop-40">
           <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="callaction bg-gray">
							<div class="row">
								<div class="col-md-8">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<h3>In an emergency? Need help now?</h3>
									<p>Lorem ipsum dolor sit amet consectetur adipiscing elit uisque interdum ante eget faucibus. </p>
									</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="wow lightSpeedIn" data-wow-delay="0.1s">
										<div class="cta-btn">
										<a href="#" class="btn btn-skin btn-lg">Book an appoinment</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
	</section>

	<!-- Section: works -->
    <section id="facilities" class="home-section paddingbot-60">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Our facilities</h2>
					<p>Ea melius ceteros oportere quo, pri habeo viderer facilisi ei</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>

<div class="container">
			<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
					<div class="wow bounceInUp" data-wow-delay="0.2s">
                    <div id="owl-works" class="owl-carousel">
                        <div class="item"><a href="img/photo/1.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="img/photo/1.jpg" class="img-responsive" alt="img"></a></div>
                        <div class="item"><a href="img/photo/2.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="img/photo/2.jpg" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="img/photo/3.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="img/photo/3.jpg" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="img/photo/4.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="img/photo/4.jpg" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="img/photo/5.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="img/photo/5.jpg" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="img/photo/6.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="img/photo/6.jpg" class="img-responsive " alt="img"></a></div>
                    </div>
					</div>
                </div>
            </div>
		</div>
	</section>
	<!-- /Section: works -->


	<!-- Section: testimonial -->
    <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

<div class="carousel-reviews broun-block">
    <div class="container">
        <div class="row">
            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="item active">
                	    <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        <a title="" href="#">Emergency Contraception</a>
							    <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
						        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel text-light">
								<img src="img/testimonials/1.jpg" alt="" class="person img-circle" />
								<a title="" href="#">Anna</a>
								<span>Chicago, Illinois</span>
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">
						        <a title="" href="#">Orthopedic Surgery</a>
							    <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
						        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel text-light">
				                <img src="img/testimonials/2.jpg" alt="" class="person img-circle" />
								<a title="" href="#">Matthew G</a>
								<span>San Antonio, Texas</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">
								<a title="" href="#">Medical consultation</a>
								<div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
						        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel text-light">
								<img src="img/testimonials/3.jpg" alt="" class="person img-circle" />
								<a title="" href="#">Scarlet Smith</a>
								<span>Dallas, Texas</span>
							</div>
						</div>
                    </div>
                    <div class="item">
                        <div class="col-md-4 col-sm-6">
        				    <div class="block-text rel zmin">
						        <a title="" href="#">Birth control pills</a>
							    <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
						        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
					        </div>
							<div class="person-text rel text-light">
								<img src="img/testimonials/4.jpg" alt="" class="person img-circle" />
								<a title="" href="#">Lucas Thompson</a>
								<span>Austin, Texas</span>
							</div>
						</div>
            			<div class="col-md-4 col-sm-6 hidden-xs">
						    <div class="block-text rel zmin">
						        <a title="" href="#">Radiology</a>
							    <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span><span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>  </span></div>
						        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
				            </div>
							<div class="person-text rel text-light">
								<img src="img/testimonials/5.jpg" alt="" class="person img-circle" />
						        <a title="" href="#">Ella Mentree</a>
								<span>Fort Worth, Texas</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
							<div class="block-text rel zmin">
								<a title="" href="#">Cervical Lesions</a>
								<div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span><span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span>  </span></div>
						        <p>Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud ...</p>
							    <ins class="ab zmin sprite sprite-i-triangle block"></ins>
							</div>
							<div class="person-text rel text-light">
								<img src="img/testimonials/6.jpg" alt="" class="person img-circle" />
								<a title="" href="#">Suzanne Adam</a>
								<span>Detroit, Michigan</span>
							</div>
						</div>
                    </div>


                </div>

                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
</div>
	</section>
	<!-- /Section: testimonial -->


	<footer>

		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>About Medicio</h5>
						<p>
						Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
						</p>
					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Information</h5>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Laboratory</a></li>
							<li><a href="#">Medical treatment</a></li>
							<li><a href="#">Terms & conditions</a></li>
						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Medicio center</h5>
						<p>
						Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
						</p>
						<ul>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Monday - Saturday, 8am to 10pm
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> +62 0888 904 711
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
								</span> hello@medicio.com
							</li>

						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Our location</h5>
						<p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Follow us</h5>
						<ul class="company-social">
								<li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
								<li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
						</ul>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInLeft" data-wow-delay="0.1s">
					<div class="text-left">
					<p>&copy;Copyright 2015 - Medicio. All rights reserved.</p>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInRight" data-wow-delay="0.1s">
					<div class="text-right">
						<p><a href="http://bootstraptaste.com/">Bootstrap Themes</a> by BootstrapTaste</p>
					</div>
                    <!--
                        All links in the footer should remain intact.
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                    -->
					</div>
				</div>
			</div>
		</div>
		</div>
	</footer>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->
    <script src="{{ asset('estilo/js/jquery.min.js') }}"></script>
    <script src="{{ asset('estilo/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('estilo/js/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('estilo/js/wow.min.js') }}"></script>
	<script src="{{ asset('estilo/js/jquery.scrollTo.js') }}"></script>
	<script src="{{ asset('estilo/js/jquery.appear.js') }}"></script>
	<script src="{{ asset('estilo/js/stellar.js') }}"></script>
	<script src="{{ asset('estilo/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}') }}"></script>
	<script src="{{ asset('estilo/js/owl.carousel.min.js') }}') }}"></script>
	<script src="{{ asset('estilo/js/nivo-lightbox.min.js') }}') }}"></script>
    <script src="{{ asset('estilo/js/custom.js') }}"></script>
    <script>
        function atualizarHora() {
            const dataHoraElement = document.getElementById('dataHora');

            // Obtém a hora atual do cliente (JavaScript)
            const agora = new Date();

            // Formata a data e hora como DD/MM/YYYY HH:mm:ss
            const dia = String(agora.getDate()).padStart(2, '0');
            const mes = String(agora.getMonth() + 1).padStart(2, '0'); // Janeiro é 0
            const ano = agora.getFullYear();
            const horas = String(agora.getHours()).padStart(2, '0');
            const minutos = String(agora.getMinutes()).padStart(2, '0');
            const segundos = String(agora.getSeconds()).padStart(2, '0');

            const dataHoraFormatada = `${dia}/${mes}/${ano} ${horas}:${minutos}:${segundos}`;

            // Atualiza o conteúdo do elemento na página
            dataHoraElement.textContent = dataHoraFormatada;
        }

        // Atualiza a hora imediatamente e define um intervalo para atualizações automáticas
        setInterval(atualizarHora, 1000);
        atualizarHora(); // Chama imediatamente para sincronizar
    </script>

</body>

</html>
