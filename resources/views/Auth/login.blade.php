@extends('layoutAuth')
  
@section('content')
<div class="main-w3layouts wrapper">
		<div class="main-agileinfo">
			<h1>Connexion</h1>
			<div class="agileits-top">
  
                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf

                          <div>
                              <div >
                                  <input type="text" id="email_address" class="text email" name="email"  placeholder="&#xf0e0; Email" required >
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div >
                              <div >
                                  <input type="password" id="password" class="text w3lpass" name="password" placeholder="&#xf084; Mot de passe"  required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          
  
                          <input type="submit" value="VALIDER">
                      </form>
                      <p>Nouvel utilisateur? <a href="registration"> Créer un compte!</a></p>
                      </div>
		</div>
		
		<!-- <ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul> -->
	</div>
@endsection