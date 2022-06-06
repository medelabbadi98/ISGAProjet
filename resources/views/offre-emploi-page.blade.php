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
        <div class="container gt-4">
            <div class="row sticky-parent ">
                <!-- Sidebar -->
                
                <div class="col-12 col-md-12 col-xl-12">
				    <div class="box shadow pb-5">
                        <h1 class="title title--h1 first-title title__separate">offres d'emploi</h1>
                        <div class="pb-0 box-inner">
                            <div class="row">
                                <div class="box box__second mb-4">
		                            <h1 class="title title--h1 first-title title__separate">À propos de Nous</h1>
						            <p>{{$offre->About}}</p>
                                </div>
                                 <!--case-item-->
                                <div class="case-item box box__second">
                                    <div>
                                        <h3 class="title title--tone">{{$offre->Intitule}}</h3>
                                        <h6 class="title title--h6">Secteur d'activité :<span class="case-item__text">{{$offre->Nom_Sec}}</span></h6>
                                        <h6 class="title title--h6">Date Publication :<span class="timeline__period">{{$offre->Date_pub}}</span></h6>
                                        <h6 class="title title--h6">Date d'Experation :<span class="timeline__period">{{$offre->Date_Exp}}</span></h6>
                                        <h6 class="title title--h6">Type de Contart :<span class="case-item__text">{{$offre->Type_CT}}</span></h6>
                                        <h6 class="title title--h6">Description :</h6>
                                        <p class="case-item__caption">{!!$offre->Description_offre!!}</p>
                                        
                                    </div>
                                </div>
                                @guest
                                <div class="box box__second d-flex justify-content-center mb-4">
                                    <button type="button" onclick="location.href='/login' " class="btn-postuler">Postuler</button>
                                </div>
                                @else
                                @if(candidat())
                                @if(isset($postuler))
                                <div class="box box__second d-flex justify-content-center mb-4">
                                    <button type="button" onclick="location.href='postuler/delete/{{$offre->Id_Offre}}' " class="btn-postuler">Annuler la demande</button>
                                </div>
                                @else
                                <div class="box box__second d-flex justify-content-center mb-4">
                                    <button type="button" onclick="location.href='postuler/{{$offre->Id_Offre}}' " class="btn-postuler">Postuler</button>
                                </div>
                                @endif
                                @endif
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
@endsection  