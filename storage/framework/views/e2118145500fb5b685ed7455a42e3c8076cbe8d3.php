<div class="my-content">
    <nav id="my-navbar" class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand d-flex align-items-center" href="<?php echo e(url('')); ?>">
              <img id="VES_logo" src="<?php echo e(url('/asserts/VES_logo.png')); ?>">
              <span id="vesit-logo">VESIT EVENT</span>
          </a>
          <a id="addevent-button-home-page" class="navbar-item d-flex align-items-center" href="<?php echo e(url('addevent/aboutevent')); ?>">
            <span class="add-event-button">Add Event</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <?php if(!session()->has('email')): ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle navlink-header-text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All Societies
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(url("/society/isa")); ?>">ISA</a>
                        <a class="dropdown-item" href="<?php echo e(url("/society/ieee")); ?>">IEEE</a>
                        <a class="dropdown-item" href="<?php echo e(url("/society/iste")); ?>">ISTE</a>
                        <a class="dropdown-item" href="<?php echo e(url("/society/csi")); ?>">CSI</a>
                      </div>
                  </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                  <li id="login-li" class="nav-item d-flex align-items-center">
                        <a class="nav-link btn btn-md btn-primary my-login-button" href="<?php echo e(url('login')); ?>">Login</a>
                  </li>
                  <li class="nav-item d-flex align-items-center">
                      <a class="nav-link btn btn-md btn-primary my-login-button" href="<?php echo e(url('register')); ?>">Sign Up</a>
                  </li>
                </ul>
          </div>
        <?php else: ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle navlink-header-text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      All Societies
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="/society/isa">ISA</a>
                      <a class="dropdown-item" href="/society/ieee">IEEE</a>
                      <a class="dropdown-item" href="/society/iste">ISTE</a>
                      <a class="dropdown-item" href="/society/csi">CSI</a>
                    </div>
                </li>
              </ul>
                <ul class="navbar-nav ml-auto">
                    <li id="login-li" class="nav-item" >
                      <a href="<?php echo e(url('/user/profile')); ?>">
                          <div class="user-details-navbar">
                              <div class="d-flex justify-content-start align-items-center">
                                <div class="user-profile-image">
                                  <img style="width:50px; height:50px; border-radius:25px; margin-right:5px" src="<?php echo e(url('/profile_images/'.$user->profile_image)); ?>" alt="" >
                                </div>
                                <p><?php echo e(substr($user->first_name.' '.$user->last_name, 0 , 8)); ?>..</p>
                              </div>
                          </div>
                      </a>
                    </li>
                    <li id="login-li" class="nav-item d-flex align-items-center">
                        <a class="nav-link btn btn-md btn-primary my-login-button" href="<?php echo e(url('logout')); ?>">Logout</a>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </nav>
</div>
<?php /**PATH C:\xampp\htdocs\vesitevents\resources\views//partials/navbar.blade.php ENDPATH**/ ?>