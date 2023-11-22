@extends('user.master.master')
@section('content')
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" id="registerForm" method="post" action="{{route('user.register')}}">
                @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="name">Your Name <span class="text-danger">*</span></label>
                             <input type="text" name="name" id="name" class="form-control" />
                             <span style="color:red;"> @if($errors->has('name')) {{$errors->first('name')}} @endif </span>
                             <span style="color:red;" id="errorName" display="none;"> </span>
                         </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example3c">Your Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" />
                            <span style="color:red;"> @if($errors->has('email')) {{$errors->first('email')}} @endif </span>
                            <span style="color:red;" id="errorEmail" display="none;"> </span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example3c">Your Phone <span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control" />
                            <span style="color:red;"> @if($errors->has('phone')) {{$errors->first('phone')}} @endif </span>
                            <span style="color:red;" id="errorPhone" display="none;"> </span>
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="form3Example4c">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" />
                            <span style="color:red;"> @if($errors->has('password')) {{$errors->first('password')}} @endif </span>
                            <span style="color:red;" id="errorPassword" display="none;"> </span>
                        </div>
                    </div>
                 
                    <div class="alert alert-danger" role="alert" id="message" style="display:none;">
                       
                    </div> 
                    <div class="alert alert-success" role="alert" id="success" style="display:none;">
                       
                       </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button id="signUp" type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>
               </form>
               <div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-check-label" for="form2Example3">
                         Already have an account. <a href="{{route('user.login.redirect')}}">LogIn Here</a>
                        </label>
                    </div> 
              </div>
             
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="{{asset('user/js/register.js')}}"  rel="stylesheet"></script>
@endsection