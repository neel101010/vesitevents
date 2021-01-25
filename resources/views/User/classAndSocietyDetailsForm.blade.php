@include('/partials/header')
@include('/partials/navbar')

		<div class="our-login-page-content">
			<div id="login-container">
				<div class="login-page-contant">
					<form class="submit-forms" action="classdetails/add" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <center><h1 class="new-h1">Class & Society Details</h1></center>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="label">College Department</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="department">
                              <option>CMPN</option>
                              <option>IT</option>
                              <option>EXTC</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="label">Current Year of Study</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="current_year">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label" for="exampleFormControlSelect1">Class</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="class">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                        </div>
						<div class="form-group">
						  <label for="username"  class="label">Roll No</label>
						  <input type="number" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter your Roll No"
								 name="roll_no">
						</div>
						<div class="form-group">
						 <label for="login-login"  class="label">Semester</label>
							<div class="password">
							<input type="number" class="form-control" id="login-login" aria-describedby="emailHelp"  placeholder="Enter Your Current Semester"
								   name="semester">
							</div>
                         </div>
                         <div class="small-message-related-to-text">
                             <p>If You are a member/council-member/society-head/HOD then fill the details otherwise you
                                can skip this part.</p>
                         </div>
                         <div class="form-group">
                            <label for="exampleFormControlSelect1" class="label">Society Name(From Which you belong)</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="society">
                              <option>None</option>
                              <option>ISA</option>
                              <option>IEEE</option>
                              <option>CSI</option>
                              <option>ISTE</option>
{{--                              <option>CODECELL</option>--}}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="label">Role(What is your role in that society)</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                              <option>None</option>
                              <option>Normal-member</option>
                              <option>council-member</option>
                              <option>council-head</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between" id="forgotpassword">
                            <div>
                                <button type="submit" class="btn btn-primary btn-md btn-block">Next</button>
                            </div>

						</div>

					</form>
				</div>
			</div>
        </div>

	
@include('/partials/footer')