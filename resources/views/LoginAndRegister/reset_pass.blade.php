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
            <form class="submit-forms" action="{{url('reset/check')}}" method="POST">
                @csrf
                <center><h1 class="new-h1">Password Reset</h1></center>
                <div class="form-group">
                    <label for="username"  class="label">Email</label>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your email address"
                           name="email" required>
                </div>
                <button type="submit" class="btn btn-primary btn-md btn-block">Send Password Rest Link</button>
            </form>
        </div>
    </div>
</div>

@include('/partials/footer')
