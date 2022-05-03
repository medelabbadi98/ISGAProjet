<<<<<<< HEAD
@extends('layout')
=======
@extends('layoutAuth')
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
  
@section('content')
    <div class="main-w3layouts wrapper">
		
		<div class="main-agileinfo">
			<h1>S'Inscrire</h1>
			<div class="agileits-top">
  
                      <form action="{{ route('register.post') }}" method="POST">
                          @csrf
                          <div >
                              <div >
                                  <input type="text" id="name" class="text" name="name" placeholder="&#xf007; Nom d'utilisateur" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div>
                              <div >
                                  <input type="text" id="email_address" class="text email " placeholder="&#xf0e0; Email" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div >
                              <div >
                                  <input type="password" id="password"placeholder="&#xf084; Mot de passe"  class="text w3lpass" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="wrapper1">
<<<<<<< HEAD
                        <input type="radio" name="select" id="option-1" value="condidat" checked >
                        <input type="radio" name="select" id="option-2" value="recruteur">
=======
                        <input type="radio" name="select" id="option-1" value="0" checked >
                        <input type="radio" name="select" id="option-2" value="1">
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
                          <label for="option-1" class="option option-1">
                            <div class="dot"></div>
                             <span>Candidat</span>
                             </label>
                          <label for="option-2" class="option option-2">
                            <div class="dot"></div>
                             <span>Recruteur</span>
                          </label>
                       </div>
                          <div class="">
                              <div class="">
                                  <div class="checkbox">
                                      <label>
<<<<<<< HEAD
                                          <input type="checkbox" name="remember"> Remember Me
=======
                                          <!-- <input type="checkbox" name="remember"> Remember Me -->
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
                                      </label>
                                  </div>
                              </div>
                          </div>
  
                          <div class="">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                        
                      </div>
		</div>
		
<<<<<<< HEAD
		<!-- <ul class="colorlib-bubbles">
=======
		<ul class="colorlib-bubbles">
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
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
<<<<<<< HEAD
		</ul> -->
=======
		</ul>
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
	</div>
@endsection