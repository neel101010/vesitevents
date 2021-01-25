@include('/partials/header')
@include('/partials/navbar')
  

   
     
		<div class="our-login-page-content">
			<div id="login-container">
				<div class="login-page-contant">
					@if(session('status'))
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							{{ session('status') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
					<form class="submit-forms" action={{route('login_check')}} method="POST">
                        @csrf
						<center><h1 class="new-h1">Log in</h1></center>
						<div class="form-group">
						  <label for="email"  class="label">Email</label>
						  <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Your email address"
								 name="email">
						</div>
						<div class="form-group">
						 <label for="login-login"  class="label">Password</label>
							<div class="password">
							<input type="password" class="form-control" id="login-login" aria-describedby="emailHelp"  placeholder="Enter Your Password"
								   name="password">
							</div>
						 </div>
                        <button type="submit" class="btn btn-primary btn-md btn-block">Login</button>
						{{-- <button type="submit" class="btn btn-primary btn-md btn-block">Login</button> --}}
						<div class="d-flex justify-content-between" id="forgotpassword">
							<div>
								<a href="{{ url('/') }}">Go back</a>
							</div>
							<div>
								<a id="forgotbuttonlink" href="{{url('reset')}}">Forgot Password</a>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>

		@include('/partials/footer')
