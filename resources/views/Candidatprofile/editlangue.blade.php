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

    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-xl-12">
                    <div class="box shadow">
            
                        <!-- About -->
                        <div class="pb-2">
                            <h1 class="title title--h1 first-title title__separate">Modifier Langue</h1>
                        </div>
            
                        <form id="contact-form" method="POST" action="langue/{{$langue->ID_Lg}}" class="contact-form" data-toggle="validator" novalidate="true">
                        @csrf
                        
                            <div class="row">
                                <div class="form-group col-12 col-md-6">

                                    <input type="text" class="input form-control" name="langue" autocomplete="on" placeholder="Langue" required="required" value="{{$langue->Nom_Lg}}" readonly="readonly">

                                    <div class="help-block with-errors"></div>
                                </div>
            
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control" name="niveau" placeholder="niveau" required="required" value="{{$langue->Niveau}}">
                                    <div class="help-block with-errors"></div>
                                </div>                    
                               
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-3 order-1 order-md-2 d-flex justify-content-between">
                                    <button type="submit" class="btn disabled">Modifier</button>

                                    <a href="{{ route('pagecandidat') }}" class="btn btn-secondary ">Annuler</a>

                                </div>
                            </div>
                        </form>
                    
                        
                    </div>
                    
                    
                    <!-- Footer -->
                    <footer class="footer">© 2022</footer>
                </div>
            
            </div>
        </div>
    </div>
    
    

@endsection