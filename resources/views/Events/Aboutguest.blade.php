@include('/partials/header')
@include('/partials/navbar')

        @php
        $event = session()->get('event')
            @endphp
		<div class="our-login-page-content">
			<div id="login-container">
				<div class="login-page-contant">
					<form class="submit-forms" action="{{ url('addevent/aboutguest/add') }}" method="post" enctype="multipart/form-data">
                        @csrf
						<center><h1 class="new-h1">About Guest & Sponsors</h1></center>
						<div class="Add-guest-session">
							<p>Add Guests</p>
							<div class="guest-img-div">
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#guest-select-modal">
									<img src="{{url("/common/useradd2.png")}}" alt="user-image">
								</button>
							</div>
						</div>
                        <div class="about-sponsers-message d-flex justify-content-start">
							<p class="alert-icon"><i class="fas fa-exclamation-circle"></i></p>
							<p class="alert-text">If the person is not their on this portal then you can add their Details below.
								(This is for outside guest and for those people who have not registered in this portal)
								</p>
                        </div>
						<div class="form-group">
                            <label for="exampleFormControlSelect1" class="label">Event Taker Type</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="type">
                              <option>Outside-guest</option>
							  <option>Council member</option>
							  <option>Society-member</option>
							  <option>Registered-normal-student</option>
							  <option>Not-on-portal(Normal Student)</option>
                            </select>
						</div>
						<div class="form-group">
						    <label for="username" class="label">Name(Guest)</label>
						    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Event Guest Name"
								 name="guest_name">
						</div>
						<div class="form-group">
						    <label for="username" class="label">Company Name</label>
						    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter Comapny Name"
								 name="company_name">
						</div>
						<div class="form-group">
						    <label for="username" class="label">Role in the Company</label>
						    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Guest role in the Company"
								 name="role">
						</div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="label">About the Guest</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="short_desc" placeholder="Something about the Guest"></textarea>
						</div>
                        <input type="hidden" name="event_id" value="{{$event->id}}">
                        <div class="d-flex justify-content-between" id="forgotpassword">
							<div>
								<a id="our-back-button" class="btn btn-md btn-light" href="addevent/aboutevent">Back</a>
							</div>
							<div>
                                <button type="submit" class="btn btn-primary btn-md btn-block">Add</button>
                                {{--<a id="our-next-button" class="btn btn-md btn-primary" href="{{ url('addevent/aboutguest/add') }}">Add</a>--}}
							</div>
							<div>
{{--								<a id="our-next-button" class="btn btn-md btn-primary" href="{{ url('/') }}">Next</a>--}}
                                <a id="our-next-button" class="btn btn-md btn-primary" href="{{url('addevent/aboutsponsor')}}">Next</a>

                            </div>
						</div>

					</form>
				</div>
			</div>
        </div>
		<!-- Modal -->
		<div class="modal fade" id="guest-select-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLongTitle">Add Guests</h5>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>
				<div class="modal-body">
				     <div class="our-guest-list d-flex flex-column">
                         @foreach($guests as $guest)
                             @php
                             $istaken = \App\Models\Takenby::where('event_id',$event->id)
                             ->where('guest_id',$guest->id)
                             ->first();
                             @endphp
                         @if(!$istaken)
{{--						 <a class="model-each-guest-link" href="{{url('addevent/aboutguest/add',[session('event_id'),$guest->id])}}">--}}
                                 <a class="model-each-guest-link" data-id="{{$guest->id}}">

                                 <div class="each-guest d-flex justify-content-between align-items-center">
								<div class="name-and-img-session d-flex justify-content-start align-items-center">
									<img src="/asserts/useradd2.png" alt="user-image">
									<div class="user-name-and-details">
										<p>{{$guest->name}}</p>
									</div>
								</div>
								<div class="add-btn-session">
									<button class="btn btn-md btn-primary"> Add </button>
								</div>
							</div>
						 </a>
                             @endif
                         @endforeach
					 </div>
				</div>
			  </div>
			</div>
		  </div>

<meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
<script>
    $(document).ready(function() {
        $(".model-each-guest-link").click(function() {
            $(this).hide();
            $.ajax({
                type:'get',
                url:'http://localhost:800/myevent/public/addevent/aboutguest/addexisting',
                data: {
                    guest_id : $(this).attr('data-id')
                },
                // success:function(data) {
                //     alert(JSON.stringify(data));
                // }
            });
        });
    })
</script>
</html>

