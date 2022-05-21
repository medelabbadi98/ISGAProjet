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
        <div class="container gt-5">
            <div class="row sticky-parent ">
                <!-- Sidebar -->
                <aside class="col-12 col-md-12 col-xl-3">
				    <div class="sidebar box shadow pb-5 sticky-column">
                                <h3 class="title title--h4">Recherche par mots clés</h3>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="keyword" value="" placeholder="Intitulé du poste,Secteur...">
                                        <button type="submit" class="btn-default"><i class="font-icon icon-search"></i></button>
                                </div>
                               
                                <div class="list-group mt-5">
                                    <h3 class="title title--h4">Recherche par Secteurs</h3>
                                    <ul class="list-group list-group-flush">
                                        @foreach($secteurs as $sec)
                                        <li class="list-group-item"><a href="#">{{$sec->Nom_Sec}}</a></li>
                                        @endforeach
                                      </ul>
                                      
                                </div>
                            </div>
		        </aside>

                <div class="col-12 col-md-12 col-xl-9">
				    <div class="box shadow pb-5">
                        <h1 class="title title--h1 first-title title__separate">Les Candidats</h1>
                        <div class="pb-0 box-inner">
                            <div class="row">
                                <!--case-item-->
                                @foreach($candidats as $candidat)
                                <div class="case-item box box__second">
                                    <div class="text-center case-item-image">
                                    <img src="{{$candidat->Photo_C}}" class="rec-image">
                                        
						            </div>
                                    <div>
                                    <!-- <a href="#" ><h5 class="title title--tone">{{$candidat->Nom }} {{$candidat->Prenom}}</h5></a> -->
                                    <a href="candidat-page/{{$candidat->CIN}}" style="text-decoration: none; color: inherit; "><h4 class="title title--h4 mt-0">{{$candidat->Nom }}
                                            <span class="weight--500">{{$candidat->Prenom}}</span></h4>
                                    </a>
                                            <h5 class="title title--h5">Adresse :<span class="case-item__text">{{$candidat->Adresse}}</span></h5>
                                        <h5 class="title title--h5">Secteur d'activité :<span class="case-item__text">{{$candidat->Nom_Sec}}</span></h5>
                                        
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
@endsection    
