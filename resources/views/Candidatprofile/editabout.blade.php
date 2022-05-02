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
                <div class="col-12 col-md-12 col-xl-9" style="width: 100%;">
                    <div class="box shadow">
            
                        <!-- About -->
                        <div class="pb-2">
                            <h1 class="title title--h1 first-title title__separate">Modifier A propos de moi</h1>
                        </div>
            
                        <!-- Contact -->
                        <form id="contact-form" action="{{ route('editabout.post') }}" method="POST" class="contact-form" data-toggle="validator" novalidate="true">
                        @csrf
                            <div class="row">
                                <div class="form-group col-12 col-md-12">
                                    <textarea class="textarea form-control" placeholder="About" rows="4" required="required" tabindex="1" style="overflow: hidden; overflow-wrap: break-word; height: 118px; outline: none;"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-3 order-1 order-md-2 d-flex justify-content-between">
                                    <button type="submit" class="btn disabled">Modifier</button>
                                    <a href="page_candidat.html" class="btn btn-secondary ">Annuler</a>
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
    

    <script src="assets/js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="assets/js/plugins.min.js"></script>
    <script src="assets/js/common.js"></script>
@endsection