@include('/partials/header')
@include('/partials/navbar')

		<div class="our-login-page-content">
			<div id="login-container">
				<div class="login-page-contant">
					<form class="submit-forms" action="{{ url('addevent/aboutevent/add') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                        <center><h1 class="new-h1">Add New Event</h1></center>
						<div class="form-group">
						    <label for="username" class="label">Event Name</label>
						    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Event Name"
								 name="eventname">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="label">Event-Short Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="short_desc" placeholder="Short description about Event"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="label">Event-Full Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="full_desc" placeholder="Full description about Event"></textarea>
                        </div>
                         <div class="form-group">
                            <label for="exampleFormControlSelect1" class="label">Event Category</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category">
                              <option>Technical Event</option>
                              <option>Non-technical Event</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username"  class="label">Profile Image</label>
                            <input type="file" class="form-control" aria-describedby="emailHelp" accept="image/*" name="image">
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="username" class="label">Event Date</label>
                                <input type="Date" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Date"
                                     name="date">
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="username" class="label">Event Timining</label>
                                <input type="time" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter timining"
                                     name="time">
                            </div>

                        </div>
                        <div class="d-flex justify-content-between" id="forgotpassword">
							<div>
								<a id="our-back-button" class="btn btn-md btn-light" href="/">Back</a>
							</div>
							<div>
{{--								<a id="our-next-button" class="btn btn-md btn-primary" href="{{ url('/addevent/aboutguest') }}">Next</a>--}}
                                <button type="submit" class="btn btn-primary btn-md btn-block">Next</button>

                            </div>
						</div>

					</form>
				</div>
			</div>
        </div>

        @include('/partials/footer')
