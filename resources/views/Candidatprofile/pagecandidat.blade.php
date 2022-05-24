@extends('layout')
  
@section('content')

    <div class="preloader">
	    <div class="preloader__wrap">
		    <div class="circle-pulse">
                <div class="circle-pulse__1"></div>
                <div class="circle-pulse__2"></div>
            </div>
		    <div class="preloader__progress"><span></span></div>
		</div>
	</div>

    <main class="main">
		@csrf
	    <div class="container gutter-top">
		    <div class="row sticky-parent">
			    <!-- Sidebar -->
				<aside class="col-12 col-md-12 col-xl-3">
				    <div class="sidebar box shadow pb-0 sticky-column">
						<svg class="avatar avatar--180" viewBox="0 0 188 188">
                            <g class="avatar__box">
                                <image xlink:href="{{$candidat->Photo_C}}"  height="100%" width="100%" />
                            </g>
                        </svg>
						<div class="text-center">
						    <h3 class="title title--h3 sidebar__user-name"><span class="weight--500">{{$candidat->Nom }}</span> {{$candidat->Prenom}}</h3>
							<div class="badge badge--gray">{{$candidat->Nom_Sec}}</div>
						</div>
						
						<div class="sidebar__info box-inner box-inner--rounded">
		                    <ul class="contacts-block">
						        <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="Address">

							        <i class="font-icon icon-location"></i>{{$candidat->Adresse}}
							    </li>
							    </li>
						        <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="E-mail">
							        <a href="mailto:{{session()->get('Email')}}"><i class="font-icon icon-envelop"></i>{{$candidat->email}}</a>
							    </li>
						        <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="Phone">
							        <i class="font-icon icon-phone"></i>{{$candidat->Tel_C}}
							    </li>
					        </ul>
						</div>
					</div>	
		        </aside>
		        
				<!-- Content -->
		        <div class="col-12 col-md-12 col-xl-9">
				    <div class="box shadow pb-0">
					    <!-- About -->
						<div class="pb-0 pb-sm-2 position-relative">
		                    <h1 class="title title--h1 first-title title__separate">À propos de moi</h1>
							<div class="btn-edit-del ">
								
								<a href="editabout" role="button"><i class="font-icon icon-tool"></i></a>
							</div>
						    <p>
								@if(isset($about) and $about!="")
									{{$about}}
									@else									
									<h5 class="title title--h5" style="text-align:center">Aucune description!</h5>							
								@endif
							</p>
					    </div>
						<div class="pb-3">
		                    <h1 class="title title--h1 first-title title__separate">CV</h1>
					    </div>
						    
						<div class="pb-0">
							<div class="row">
							    <div class="col-12 col-lg-6">
								    <h2 class="title title--h3"> Diplômes et Formations <a href="ajouterdiplome" role="button"><i class="btn-add font-icon icon-add"></i></a></h2>
									@if(count($diplome)>0)
										@foreach($diplome as $dip)
										<?php
											$anneeObt= preg_split("/[-]/","$dip->Annee_obtention");										
										?>				
										<article class="timeline__item">
												<div class="btn-edit-del">
												<a href="delete/Dip/{{$dip->ID_Dip}}" onclick="return confirm('Voulez vous le supprimer !')" role="button"><i class="font-icon icon-trashcan"></i></a>
											<a href="editdiplome/{{$dip->ID_Dip}}" role="button"><i class="font-icon icon-tool"></i></a>	
												</div>
												<h5 class="title title--h5 timeline__title">Type: {{$dip->Type_Dip}}</h5>
												<h6 class="title title--h6">Spetialite : <span>{{$dip->Specialites}}</span></h6>
												<h6 class="title title--h6">Annee d'obtention : <span class="timeline__period"><?php echo $anneeObt[0] ?></span></h6>	
												<h6 class="title title--h6">Etablissement : <span >{{$dip->Etablissement}}</span></h6>
												
												<h6 class="title title--h6">Option : <span>{{$dip->_Option}}</span></h6>											
											</article>
										@endforeach
									@else
										<article>																																
											<h5 class="title title--h5" style="text-align:center">Aucun diplôme et formation <br> n'a été ajouté </span></h5>
										</article>
									@endif
								</div>
								
							    <div class="col-12 col-lg-6">
								    <h2 class="title title--h3">Expériences professionnelles <a href="ajouterexperience" role="button"><i class="btn-add font-icon icon-add"></i></a></h2>
									<div class="timeline">
									@if(count($experience)>0)
										@foreach($experience as $exp)
										<?php
										$dateD= preg_split("/[-]/",$exp->Date_Debut);
										$dateF= preg_split("/[-]/",$exp->Date_Fin);												
										?>
											<article class="timeline__item">
												<div class="btn-edit-del">
													<a href="delete/Exp/{{$exp->ID_Exp}}" onclick="return confirm('Voulez vous la supprimer !')" role="button"><i class="font-icon icon-trashcan"></i></a>
													<a href="editexperience/{{$exp->ID_Exp}}" role="button"><i class="font-icon icon-tool"></i></a>
												</div>
												<h5 class="title title--h5 timeline__title">{{ $exp->Intitule_Poste }}</h5>
												<span class="timeline__period"><?php echo $dateD[0] ?> — <?php echo $dateF[0] ?></span><br>													
												<span class="timeline__etp">{{ $exp->Nom_Etp }}<br>												
												</span>
												<p class="timeline__description">{{ $exp->Description_Ex }}</p>
											</article>									
										@endforeach
									@else
										<article>																																
											<h5 class="title title--h5" style="text-align:center">Aucune expérience professionnelle  <br> n'a été ajouté </span></h5>
										</article>
									@endif
									</div>
								</div>
							</div>
						</div>
						
						<!-- Skills -->
						<div class="box-inner box-inner--rounded">
						    <div class="row">
							    <div class="col-12 col-lg-6">
						            <h2 class="title title--h3" style="width: fit-content;">Competances <a href="ajoutercompetence" role="button"><i class="btn-add font-icon icon-add"></i></a></h2>
									<div class="box box__second">								
										<div class="timeline">
										@if(count($competence)>0)									
											@foreach($competence as $cp)
												<article class="timeline__item">
													<div class="btn-edit-del">
														<a href="delete/cmp/{{$cp->ID_Cmp}}" onclick="return confirm('Voulez vous la supprimer !')" role="button"><i class="font-icon icon-trashcan"></i></a>
														<a href="editcompetence/{{$cp->ID_Cmp}}" role="button"><i class="font-icon icon-tool"></i></a>
													</div>
													<h5 class="title title--h5 timeline__title">{{ $cp->Libelle }}</h5>
													<p class="timeline__description">{{ $cp->Description }}</p>
												</article>
												
											@endforeach
										@else
										<article>																																
											<h5 class="title title--h5" style="text-align:center">Aucune Competance <br> n'a été ajouté </span></h5>
										</article>
										@endif
										</div>
									</div>
                                </div>
								
							    <div class="col-12 col-lg-6 mt-4 mt-lg-0">
						            <h2 class="title title--h3">Langues <a href="ajouterlangue" role="button"><i class="btn-add font-icon icon-add"></i></a></h2>
									<div class="box box__second">
										<div class="timeline">
										@if(count($langue)>0)	
											@foreach($langue as $lg)
												<article class="timeline__item">
													<div class="btn-edit-del">
														<a href="delete/lang/{{$lg->ID_Lg}}" onclick="return confirm('Voulez vous la supprimer !')" role="button"><i class="font-icon icon-trashcan"></i></a>
														<a href="editlangue/{{$lg->ID_Lg}}" role="button"><i class="font-icon icon-tool"></i></a>
													</div>

													<h5 class="title title--h5 timeline__title">{{ $lg->Nom_Lg }}</h5>
													<p class="timeline__description">{{ $lg->Niveau }}</p>
												</article>
																							
											@endforeach
										@else
										<article>																																
											<h5 class="title title--h5" style="text-align:center">Aucune langue <br> n'a été ajouté </span></h5>
										</article>
										@endif
										</div>
									</div>
                                </div>
							</div>
						</div>
					</div>
					<!-- Footer -->
					<footer class="footer">© 2022 </footer>
		        </div>
			</div>
		</div>
    </main>

    <div class="back-to-top"></div>
    <svg class="svg-defs">
        <clipPath id="avatar-box">
            <path d="M1.85379 38.4859C2.9221 18.6653 18.6653 2.92275 38.4858 1.85453 56.0986.905299 77.2792 0 94 0c16.721 0 37.901.905299 55.514 1.85453 19.821 1.06822 35.564 16.81077 36.632 36.63137C187.095 56.0922 188 77.267 188 94c0 16.733-.905 37.908-1.854 55.514-1.068 19.821-16.811 35.563-36.632 36.631C131.901 187.095 110.721 188 94 188c-16.7208 0-37.9014-.905-55.5142-1.855-19.8205-1.068-35.5637-16.81-36.63201-36.631C.904831 131.908 0 110.733 0 94c0-16.733.904831-37.9078 1.85379-55.5141z"/>
        </clipPath>
        <clipPath id="avatar-hexagon">
             <path d="M0 27.2891c0-4.6662 2.4889-8.976 6.52491-11.2986L31.308 1.72845c3.98-2.290382 8.8697-2.305446 12.8637-.03963l25.234 14.31558C73.4807 18.3162 76 22.6478 76 27.3426V56.684c0 4.6805-2.5041 9.0013-6.5597 11.3186L44.4317 82.2915c-3.9869 2.278-8.8765 2.278-12.8634 0L6.55974 68.0026C2.50414 65.6853 0 61.3645 0 56.684V27.2891z"/>
        </clipPath>		
    </svg>
	@isset($CIN)
	@if(session()->get('Cin')!=$CIN)
<script>
		const btns = Array.from(
			document.querySelectorAll('.btn-add, .btn-edit-del')
		) 
		btns.forEach(btn=>{
			btn.style.display = 'none';
		})
		
	</script>
	@endif
	@endisset
@endsection