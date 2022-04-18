<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="assets/styles/style.css"/>

    <title>Modifier Diplôme</title>
</head>
<body>
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
                            <h1 class="title title--h1 first-title title__separate">Modifier Diplôme</h1>
                        </div>
            
                        <form id="contact-form" class="contact-form" data-toggle="validator" novalidate="true">
                            <div class="row">
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control" autocomplete="on" name="type_d"  placeholder="Diplome" required="required" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control" autocomplete="on" name="specialite" placeholder="Spécialité" required="required" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control" autocomplete="on" name="option" placeholder="Option" required="required" >
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control" name="année-diplome" placeholder="Année" required="required">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group col-12 col-md-6">
                                    <input type="text" class="input form-control" name="etablissement" placeholder="Etablissement" required="required">
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
    
    


    <!-- JavaScripts -->
	<script src="assets/js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="assets/js/plugins.min.js"></script>
    <script src="assets/js/common.js"></script>
</body>
</html>