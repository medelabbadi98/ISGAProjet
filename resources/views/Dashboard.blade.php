@extends('layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
                <div class="card-header">{{ __('Dashboard') }}</div>
=======
                <!-- <div class="card-header">{{ __('Dashboard') }}</div>
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    You are Logged In
                </div>
<<<<<<< HEAD
            </div>
=======
            </div> -->
>>>>>>> 1ac13f426cbcf607cf35a45285835c619ed08e3b
        </div>
    </div>
</div>
@endsection