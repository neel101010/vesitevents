@include('/partials/header')
@include('/partials/navbar')

		<div class="our-login-page-content">
			<div id="login-container">
				<div class="login-page-contant">
					<form class="submit-forms" action="personaldetails/add" method="POST"  enctype="multipart/form-data">
                        @csrf
						<center><h1 class="new-h1">Personal Details</h1></center>
						<div class="form-group">
						  <label for="username"  class="label">First Name</label>
						  <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Your First Name"
								 name="firstname" >
						</div>
						<div class="form-group">
						 <label for="login-login"  class="label">Last Name</label>
							<input type="text" class="form-control" id="login-login" aria-describedby="emailHelp"  placeholder="Enter Your Last Name"
								   name="lastname" >
                         </div>
                         <div class="form-group">
                            <label for="username"  class="label">Profile Image</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" accept="image/*" name="image">
                          </div>
                          <div class="form-group">
                            <label for="username"  class="label">Phone Number</label>
                            <input type="number" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Phone Number"
                                   name="phonenumber">
                          </div>
						  <div class="d-flex justify-content-between" id="forgotpassword">
							<div>
								<a id="our-back-button" class="btn btn-md btn-light" href="{{ url('/') }}">Back</a>
							</div>
                              <div>
                                  <button type="submit" class="btn btn-primary btn-md btn-block">Next</button>
                              </div>
						</div>
					</form>
				</div>
			</div>
        </div>

		@include('/partials/footer')
