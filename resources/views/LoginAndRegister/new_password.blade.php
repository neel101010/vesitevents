@include('/partials/header')
@include('/partials/navbar')

<div class="our-login-page-content">
    <div id="login-container">
        <div class="login-page-contant">
            <form class="submit-forms" action="{{route('new_password_check',$id)}}" method="POST">
                @csrf
                <center><h1 class="new-h1">New Password</h1></center>
                <div class="form-group">
                    <label for="password"  class="label">New Password</label>
                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Your email address"
                           name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-md btn-block">Change Password</button>
            </form>
        </div>
    </div>
</div>

@include('/partials/footer')