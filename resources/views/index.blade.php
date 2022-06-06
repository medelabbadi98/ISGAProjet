<!DOCTYPE HTML>
<html>
	<head>
		<title>E-JOB</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{URL::asset('assetsA/css/main.css')}}" />
		
	</head>
    
	<body class="is-preload">

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Bienvenue</a></li>
                            @if(session()->get('type')!=null) 								                         
								<li><a href="#rec">Recommandations</a></li>																
                            @endif
							<li><a href="#pro">À propos du site Web</a></li>

						</ul>
					</nav>					
				</div>								
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>E-JOB</h1>							
							<p>Vous êtes un candidat qui cherche à appliquer son CV ou un recruteur qui veut publier ses offres?<br />
								Bienvenue sur le meilleur site d'emploi !</p>
							<ul class="actions">
							@if(session()->get('type')!=null)
								<li><a href="/login" class="button scrolly" >Ma page</a></li>
								@if(session()->get('type')=='Candidat')
									<li><a href="/offre-emploi" class="button scrolly" >Les offres</a></li>
									<li><a href="#" class="button scrolly" >Mes demandes</a></li>
									<li><a href="/lesRecruteurs" class="button scrolly" >Les recruteurs</a></li>
								@else 
									<li><a href="/lesCandidats" class="button scrolly" >Les candidats</a></li>
									<li><a href="/offre-emploi" class="button scrolly" >Les offres</a></li>
								@endif                
								<li><a href="{{ route('logout') }}" class="button scrolly" onclick="return confirm('Voulez-vous se deconnecter ?')">Deconnexion</a></li>
							@else
								<li><a href="/registration" class="button scrolly">S'inscrire</a></li>
								<li><a href="/login" class="button scrolly">Connexion</a></li>
							@endif
							</ul>
						</div>
					</section>



					<!-- REC -->
                    @if(session()->get('type')!=null)
					<section id="rec" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Recommandations pour vous</h2>
							@if(session()->get('type')=='Candidat')
								@foreach($offres as $offre)
								<section>
																
									<div class="content">
										<div class="inner">
											<h2>{{$offre->Intitule}}</h2>
											Type de contrat : {{$offre->Type_CT}}
											<ul class="actions" style="margin-top:10px">
												<li><a href="{{ route('offre-page',[$offre->Id_Offre]) }}" class="button">plus de détails</a></li>
											</ul>
										</div>
									</div>
								</section>
								@endforeach
							@endif
							@if(session()->get('type')=='Recruteur')
								@foreach($candidats as $candidat)
								<section>
																
									<div class="content">
										<div class="inner">
											<h2>{{$candidat->Nom}} {{$candidat->Prenom}}</h2>
											Secteur d'activité : {{$candidat->Nom_Sec}}
											<ul class="actions" style="margin-top:10px">
												<li><a href="candidat-page/{{$candidat->CIN}}" class="button">plus de détails</a></li>
											</ul>
										</div>
									</div>
								</section>
								@endforeach
							@endif
							
						</div>
					</section>
                    @endif



				<!-- PRO -->
					 <section id="pro" class="wrapper style2 spotlights">
						<section>
							
							<div class="content">
								<div class="inner">
									<h2><h2>Notre site aide <i>les recruteurs</i> a : </h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									
								</div>
							</div>
						</section>
						<section>
							
							<div class="content">
								<div class="inner">
									<h2><h2>Notre site aide <i>les candidats</i> a :</h2>
									<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus.</p>
									
								</div>
							</div>
						</section>						
					</section> 


			</div>

		

		<!-- Scripts -->
			<script src="{{ URL::asset('assetsA/js/jquery.min.js')}}"></script>
			<script src="{{ URL::asset('assetsA/js/jquery.scrollex.min.js')}}"></script>
			<script src="{{ URL::asset('assetsA/js/jquery.scrolly.min.js')}}"></script>
			<script src="{{ URL::asset('assetsA/js/browser.min.js')}}"></script>
			<script src="{{ URL::asset('assetsA/js/breakpoints.min.js')}}"></script>
			<script src="{{ URL::asset('assetsA/js/util.js')}}"></script>
			<script src="{{ URL::asset('assetsA/js/main.js')}}"></script>

	</body>
</html>