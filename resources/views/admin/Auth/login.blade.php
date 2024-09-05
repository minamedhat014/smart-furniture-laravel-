<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>  Admin Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
</head>
<style>
body {
  font-family: "Roboto", sans-serif;
  background-color: #f8fafb; }

p {
  color: #b3b3b3;
  font-weight: 300; }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: "Roboto", sans-serif; }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a:hover {
    text-decoration: none !important; }

.content {
  padding: 7rem 0; 
  zoom: 0.75;
    -moz-transform: scale(0.75);
    -moz-transform-origin: 0 0;
  }
h2 {
  font-size: 20px; }

@media (max-width: 991.98px) {
  .content .bg {
    height: 500px; } }

.content .contents, .content .bg {
  width: 50%; }
  @media (max-width: 1199.98px) {
    .content .contents, .content .bg {
      width: 100%; } }
  .content .contents .form-group, .content .bg .form-group {
    overflow: hidden;
    margin-bottom: 5%;
    padding: 15px 15px;
    border-bottom: none;
    position: relative;
    background: #edf2f5;
    border-bottom: 1px solid #e6edf1; }
    .content .contents .form-group label, .content .bg .form-group label {
      position: absolute;
      top: 60%;
      -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
      -webkit-transition: .3s all ease;
      -o-transition: .3s all ease;
      transition: .3s all ease; }
    .content .contents .form-group input, .content .bg .form-group input {
      background: transparent;
      height: 20px;

    }
    .content .contents .form-group.first, .content .bg .form-group.first {
      border-top-left-radius: 7px;
      border-top-right-radius: 7px; }
    .content .contents .form-group.last, .content .bg .form-group.last {
      border-bottom-left-radius: 7px;
      border-bottom-right-radius: 7px; }
    .content .contents .form-group label, .content .bg .form-group label {
      font-size: 13px;
      display: block;
      margin-bottom: 0;
      color: #b3b3b3; }
    .content .contents .form-group.focus, .content .bg .form-group.focus {
      background: #fff; }
    .content .contents .form-group.field--not-empty label, .content .bg .form-group.field--not-empty label {
      margin-top: -20px; }
  .content .contents .form-control, .content .bg .form-control {
    border: none;
    font-size: 15px;
   font-style: italic;
   text-align: center;
    border-radius: 0; }
    .content .contents .form-control:active, .content .contents .form-control:focus, .content .bg .form-control:active, .content .bg .form-control:focus {
      outline: none;
      -webkit-box-shadow: none;
      box-shadow: none; }

.content .bg {
  background-size: cover;
  background-position: center; }

.content a {
  color: #888;
  text-decoration: underline; }

.content .btn {
  height: 54px;
  padding-left: 30px;
  padding-right: 30px; }


.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 12px; }
  .control .caption {
    position: relative;
    top: .2rem;
    color: #888; }

.control input {
  position: absolute;
  z-index: -1;
  opacity: 0; }

.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
  border-radius: 4px; }

  input::placeholder{
    text-align: center;
    font-size: 15px;
    font-style: italic;
  }

  .password-container {
    position: relative;
    width: 100%;
}

.form-control {
    padding-right: 40px; /* Space for the eye icon */
}

.eye-icon {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    user-select: none;
    font-size: 1.2em;
}

</style>



<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> 
    <lottie-player src="https://lottie.host/e04aedf7-cf39-450d-a971-4c6178e46e2e/xyPFjjL5at.json" background="transparent" speed="1" style="width: 350px; height: 350px;" loop autoplay></lottie-player>
      </div>
      <div class="col-md-6 contents">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="mb-4">
              <img src="{{asset('assets/dist/img/log.png')}}" alt="logo" style="opacity: .9;">
            <p class="mb-4">welcome to smart furniture Admin login </p>
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
              
          </div>
         
          <form action="{{route('admin.login')}}" method="post">
            @csrf

            <div class="form-group first">
              <label for="username">Email</label>
              <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
               @error('email')
            <span class="text-danger">{{$message}}</span>
                @enderror
                
                <div class="form-group first">
                  <label for="username">password</label>
                  <input type="password"   id="password"  class="form-control" placeholder="Password" name="password" required>
                  <span id="toggle-password" class="eye-icon">👀</span>
                </div>
                         @error('password')
                             <span class="text-danger">{{$message}}</span>
                          @enderror

            
        

            <input type="submit" value="Log In" class="btn btn-block btn-primary">

      
            </div>
          </form>
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<!-- AdminLTE App -->
{{-- <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script> --}}

<script>
$(function() {
	'use strict';
	
  $('.form-control').on('input', function() {
	  var $field = $(this).closest('.form-group');
	  if (this.value) {
	    $field.addClass('field--not-empty');
	  } else {
	    $field.removeClass('field--not-empty');
	  }
	});

});

$(document).ready(function()
{ 
       $(document).bind("contextmenu",function(e){
              return false;
       }); 
})

document.getElementById('toggle-password').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    // Optionally, change the eye icon to show "open" or "closed" eye
    this.textContent = type === 'password' ? '👀' : '🙈';
});

</script>
</body>
</html>
