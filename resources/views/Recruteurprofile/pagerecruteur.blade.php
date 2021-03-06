@extends('layout')
  
@section('content')
    <!-- Preloader -->
    <div class="preloader">
	    <div class="preloader__wrap">
		    <div class="circle-pulse">
                <div class="circle-pulse__1"></div>
                <div class="circle-pulse__2"></div>
            </div>
		    <div class="preloader__progress"><span></span></div>
		</div>
	</div>
    <div class="main">
        <div class="container gutter-top">
            <div class="row sticky-parent ">
                <!-- Sidebar -->
                <aside class="col-12 col-md-12 col-xl-3">
				    <div class="sidebar box shadow pb-0 sticky-column">
						<svg class="avatar avatar--180" viewBox="0 0 188 188">
                            <g class="avatar__box">
                                <image xlink:href="assets/img/profile-picture.jpg"  height="100%" width="100%" />
                            </g>
                        </svg>
						<div class="text-center">
                        <h3 class="title title--h3 sidebar__user-name"><span class="weight--500">{{$recruteur->Nom }}</span> {{$recruteur->Prenom}}
							<div class="badge badge--gray">{{$recruteur->Nom_Sec}}</div>
						</div>
						
						<div class="sidebar__info box-inner box-inner--rounded">
		                    <ul class="contacts-block">
						        <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="Address">
							        <i class="font-icon icon-location"></i>{{$recruteur->Adresse}}
							    </li>
						        <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="E-mail">
							        <a href="mailto:example@mail.com"><i class="font-icon icon-envelop"></i>{{$recruteur->email}}</a>
							    </li>
						        <li class="contacts-block__item" data-toggle="tooltip" data-placement="top" title="Phone">
							        <i class="font-icon icon-phone"></i>{{$recruteur->telephone_rec}}
							    </li>
					        </ul>
						</div>
					</div>	
		        </aside>

                <div class="col-12 col-md-12 col-xl-9">
				    <div class="box shadow pb-0">
                        <div class="pb-0 pb-sm-2 position-relative">
		                    <h1 class="title title--h1 first-title title__separate">?? propos de Nous</h1>
                            <div class="btn-edit-del">			
                                <a href="editabout" role="button"><i class="font-icon icon-tool"></i></a>

							</div>
                            @if(isset($about) and $about!="")
									<p style="overflow-wrap: break-word;">{{$about}}</p>
									@else									
									<h5 class="title title--h5" style="text-align:center">Aucune description!</h5>							
								@endif                        </div>

                        <div class="pb-0 box-inner">
		                    <h1 class="title title--h1 first-title title__separate">Offres <a title="ajouter Offre" href="{{route('ajouteroffre')}}" role="button"><i class="btn-add font-icon icon-add"></i></a></h1>

                            <div class="row">
                                @if(count($offre)>0)
									@foreach($offre as $offr)
                                        <div class="case-item box box__second">
                                            <div class="position-relative">
                                                   <div class="btn-edit-del">
                                                       
                                                            <input name="sect" hidden value="{{$offr -> Nom_Sec}}">
                                                            <a href="#" role="button"><i class="font-icon icon-trashcan"></i></a>
                                                            <a href="woffre/<?php                                                             
                                                             foreach($secteurs as $sec){
                                                                 if($sec->Nom_Sec == $offr -> Nom_Sec){
                                                                    echo($sec -> Id_Sec);
                                                                    break;
                                                                 }
                                                             } 
                                                            ?>" role="button" ><i class="font-icon icon-tool"></i></a>
                                                        
                                                    </div>
                                                <h3 class="title title--h5">{{$offr -> Intitule}}</h3>
                                                <span class="case-item__secteur" >{{$offr -> Nom_Sec}}</span>
                                                <h6 class="title title--h6">Date Publication :<span class="timeline__period">{{$offr -> Date_pub}}</span></h6>
                                                <h6 class="title title--h6">Date d'Experation :<span class="timeline__period">{{$offr -> Date_Exp}}</span></h6>
                                                <p class="case-item__caption"> {{$offr -> Description_offre}} </p>
                                            </div>	
                                        </div>
                                    @endforeach
								@else
                                    <div class="case-item box box__second">
                                        <div class="position-relative">
                                        <h5 class="title title--h5" style="text-align:center">Aucune offre  <br> n'a ??t?? ajout?? </span></h5>

                                        </div>	
                                    </div>
                                @endif
                                
                            </div>
					    </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <!-- SVG masks -->
    <svg class="svg-defs">
        <clipPath id="avatar-box">
            <path d="M1.85379 38.4859C2.9221 18.6653 18.6653 2.92275 38.4858 1.85453 56.0986.905299 77.2792 0 94 0c16.721 0 37.901.905299 55.514 1.85453 19.821 1.06822 35.564 16.81077 36.632 36.63137C187.095 56.0922 188 77.267 188 94c0 16.733-.905 37.908-1.854 55.514-1.068 19.821-16.811 35.563-36.632 36.631C131.901 187.095 110.721 188 94 188c-16.7208 0-37.9014-.905-55.5142-1.855-19.8205-1.068-35.5637-16.81-36.63201-36.631C.904831 131.908 0 110.733 0 94c0-16.733.904831-37.9078 1.85379-55.5141z"/>
        </clipPath>
        <clipPath id="avatar-hexagon">
             <path d="M0 27.2891c0-4.6662 2.4889-8.976 6.52491-11.2986L31.308 1.72845c3.98-2.290382 8.8697-2.305446 12.8637-.03963l25.234 14.31558C73.4807 18.3162 76 22.6478 76 27.3426V56.684c0 4.6805-2.5041 9.0013-6.5597 11.3186L44.4317 82.2915c-3.9869 2.278-8.8765 2.278-12.8634 0L6.55974 68.0026C2.50414 65.6853 0 61.3645 0 56.684V27.2891z"/>
        </clipPath>		
    </svg>   
@endsection