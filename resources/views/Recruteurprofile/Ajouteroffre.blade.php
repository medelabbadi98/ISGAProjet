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
                            <h1 class="title title--h1 first-title title__separate">Ajouter Offre</h1>
                        </div>
            
                        <form id="contact-form" method="POST" action="{{ route('ajouteroffre.post') }}" class="contact-form" data-toggle="validator" novalidate="true">
                        @csrf
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="offre" class="form_label">Offre :</label>
                                    <input type="text" class="input form-control" autocomplete="on" name="Intitule" placeholder="Offre" required="required" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <label for="secteur" class="form_label">Secteurs :</label>
									<select class="input " name="secteur"  required="required">
									@foreach($secteurs as $sec)
										<option value="{{$sec->Id_Sec}}">{{$sec->Nom_Sec}}</option>
									@endforeach
									</select>
								    <div class="help-block with-errors"></div>
				                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <label for="date_exp" class="form_label">Date d'Expiration :</label>
                                    <input type="date" class="input form-control" autocomplete="on" name="date_exp" required="required" >
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label for="date_exp" class="form_label">Date Publication :</label>
                                    <input type="date" class="input form-control" autocomplete="on" name="date_pub" required="required" >
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-12 col-md-6">
                                    <label for="contrat" class="form_label">Contrats :</label>
									<select class="input " name="contrat"  required="required">
									@foreach($contrats as $con)
										<option value="{{$con->Id_CT}}">{{$con->Type_CT}}</option>
									@endforeach
									</select>
								    <div class="help-block with-errors"></div>
				                </div>

                                <div class="form-group col-12 col-md-12">
                                    <label for="Description" class="form_label">Description :</label>
                                    <textarea class="textarea form-control" id="editor" name="Description" placeholder="Description" required="required" tabindex="1" style="overflow: hidden; overflow-wrap: break-word; height: 118px; outline: none;"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-3 order-1 order-md-2 d-flex justify-content-between">
                                    <button type="submit" class="btn disabled">Ajouter</button>
                                    <a href="{{route('pagerecruteur')}}" class="btn btn-secondary ">Annuler</a>
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
    <script>
        CKEDITOR.replace('editor',{
            width:1000
        });
    </script> 
@endsection