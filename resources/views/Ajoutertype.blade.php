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
	    <div class="container gutter-top ">
		    <div class="row ">
				<!-- Content -->
		        <div class="col-12 col-md-12 col-xl-12">
				    <div class="box shadow">
					   
						<div class="pb-2">
		                    <h1 class="title title--h1 first-title title__separate">paramètres</h1>
					    </div>
							@if(candidat())
						<form id="contact-form" method="POST" enctype="multipart/form-data" action="{{route('ajouterCandidat.post')}}"  class="contact-form" data-toggle="validator" novalidate="true">
							@else
						<form id="contact-form" method="POST" enctype="multipart/form-data" action="{{route('ajouterRecruteur.post')}}"  class="contact-form" data-toggle="validator" novalidate="true">
							@endif
                        @csrf
						
			
							<div class="row">
							<div class="row justify-content-center">
								<div class="form-group col-12 col-md-2"> 
									<svg class="avatar avatar--180"  viewBox="0 0 188 188">
										<g class="avatar__box">
											<image id="profil_image" xlink:href="../assets/img/profile-picture.jpg"  height="100%" width="100%" />
										</g>
									</svg>
									<input type="file" hidden id="image_upload" name="Photo" class="input form-control" >
				                </div>
							</div>
							</div>
                            <div class="row">
								<div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control"  name="cin"  placeholder="CIN" required="required" autocomplete="on" >
								    <div class="help-block with-errors"></div>
				                </div>
                                
				                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control"  name="nom"  placeholder="Nom" required="required" autocomplete="on" >
								    <div class="help-block with-errors"></div>
				                </div>

                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control"  name="prenom" placeholder="Prénom" required="required" >
								    <div class="help-block with-errors"></div>
				                </div>

								<div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control"  name="adresse"  placeholder="Adresse" >
								    <div class="help-block with-errors"></div>
				                </div>

								<div class="form-group col-12 col-md-6">
                                    <input type="tel" class="input form-control"  name="tel"  placeholder="Telphone" >
								    <div class="help-block with-errors"></div>
				                </div>
								@if(candidat())
								<div class="form-group col-12 col-md-6">
									<select class="input " name="secteur"  required="required">
									@foreach($secteurs as $sec)
										<option value="{{$sec->Id_Sec}}">{{$sec->Nom_Sec}}</option>
									@endforeach
									</select>
								    <div class="help-block with-errors"></div>
				                </div>
								@endif
						    </div>
							<div class="row justify-content-center">
                                <div class="col-12 col-md-3 order-1 order-md-2 d-flex justify-content-between">
                                    <button type="submit" class="btn disabled">Valider l'inscription</button>                            
                                </div>
                            </div>
		                </form>
					</div>
					
					<!-- Footer -->
					<footer class="footer">© 2022</footer>
		        </div>
			</div>
		</div>	
    </main>
	<!-- SVG masks -->
    <svg class="svg-defs">
        <clipPath id="avatar-box">
            <path d="M1.85379 38.4859C2.9221 18.6653 18.6653 2.92275 38.4858 1.85453 56.0986.905299 77.2792 0 94 0c16.721 0 37.901.905299 55.514 1.85453 19.821 1.06822 35.564 16.81077 36.632 36.63137C187.095 56.0922 188 77.267 188 94c0 16.733-.905 37.908-1.854 55.514-1.068 19.821-16.811 35.563-36.632 36.631C131.901 187.095 110.721 188 94 188c-16.7208 0-37.9014-.905-55.5142-1.855-19.8205-1.068-35.5637-16.81-36.63201-36.631C.904831 131.908 0 110.733 0 94c0-16.733.904831-37.9078 1.85379-55.5141z"/>
        </clipPath>
        <clipPath id="avatar-hexagon">
             <path d="M0 27.2891c0-4.6662 2.4889-8.976 6.52491-11.2986L31.308 1.72845c3.98-2.290382 8.8697-2.305446 12.8637-.03963l25.234 14.31558C73.4807 18.3162 76 22.6478 76 27.3426V56.684c0 4.6805-2.5041 9.0013-6.5597 11.3186L44.4317 82.2915c-3.9869 2.278-8.8765 2.278-12.8634 0L6.55974 68.0026C2.50414 65.6853 0 61.3645 0 56.684V27.2891z"/>
        </clipPath>		
    </svg>
    

	<script>
		$('#profil_image').on('click', function() {
    		$('#image_upload').click();
		});

		function fasterPreview( uploader ) {
    		if ( uploader.files && uploader.files[0] ){
          		$('#profil_image').attr('xlink:href', 
            	 window.URL.createObjectURL(uploader.files[0]) );
    		}
		}
		$("#image_upload").change(function(){
    		fasterPreview( this );
		});
	</script>

@endsection