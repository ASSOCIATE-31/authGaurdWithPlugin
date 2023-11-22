@extends('user.master.master')
@section('content')

@if(!isset(Auth::user()->name))  <script>window.location = "{{ route('index') }}";</script> @endif  
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> Dashboard</p>
                 
                <div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-check-label" for="form2Example3">
                           Welcome, @if(isset(Auth::user()->name)) {{Auth::user()->name}}  @endif  
                        </label>
                 </div> 

                 <div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-check-label" for="form2Example3">
                          Go to your profile page <a href="{{route('user.profile')}}">Profile</a>
                        </label>
                 </div> 
                   
               <div class="form-check d-flex justify-content-center mb-5">
                        <label class="form-check-label" for="form2Example3">
                         Logout from here <a href="{{route('user.logout')}}">LogOut</a>
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