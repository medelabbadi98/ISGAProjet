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
                                <form action="{{ route('find') }}" method="GET">
                                    @csrf
                                <div class="input-group">
                                <input class="form-control" type="text" name="query" placeholder="Nom,Prenom ou Adresse..." value="{{ request()->input('query') }}">
                                        <button type="submit" class="btn-default"><i class="font-icon icon-search"></i></button>
                                </div>  
                                </form>                              
                            </div>
		        </aside>

                <div class="col-12 col-md-12 col-xl-9">
				    <div class="box shadow pb-5">
                        <h1 class="title title--h1 first-title title__separate">Les Recruteurs</h1>
                        <div class="pb-0 box-inner">
                            <div class="row">
                                <!--case-item-->
                                @if(count($recruteurs)>0)
                                @foreach($recruteurs as $recruteur)
                                <div class="case-item box box__second">
                                    <div class="text-center case-item-image">
                                    <img src="{{$recruteur->photo_rec}}" class="rec-image">
                                        
						            </div>
                                    <div>                    
                                    <a href="recruteur-page/{{$recruteur->CIN}}" style="text-decoration: none; color: inherit; "><h4 class="title title--h4 mt-0">{{$recruteur->Nom }}
                                            <span class="weight--500">{{$recruteur->Prenom}}</span></h4>
                                    </a>
                                            <h5 class="title title--h5">Adresse :<span class="case-item__text">{{$recruteur->Adresse}}</span></h5>                                        
                                    </div>
                                </div>

                                
                                @endforeach
                                @else
                                <div style="text-align:center; padding-bottom:20px">
                                <h3 class="title title--h2 first-title ">Oups !</h3>
                                <h5 class="title title--h5">Aucun résultat n été trouve pour votre recherche <br> <span class="case-item__text"><a href="/lesRecruteurs"> veuillez essayer de nouveau </a></span></h5>
                                @endif
                                <div class="pagination-block">
                                    {{$recruteurs->links('paginationLinks')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                   
            </div>
        </div>
    </div>
@endsection    
