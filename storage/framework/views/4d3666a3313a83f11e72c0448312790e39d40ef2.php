<?php echo $__env->make('/partials/header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('/partials/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="each-society-information d-flex justify-content-center">
            <div class="society-details-society-page d-flex flex-column">
                <div class="society-img-session">
                    <img src="<?php echo e(url("/asserts/$society->image")); ?>" style="width:130px; height:130px; object-fit:cover;">
                </div>
                <h4><?php echo e($society->name); ?> Society</h4>
                <p> <?php echo e($society->description); ?> </p>
                <div class="button-session">
                    <button class="btn btn-sm btn-light"><i class="fas fa-users"></i> <?php echo e($society->total_members); ?> Employees </button>
                </div>
            </div>
        </div>



        <ul class="nav nav-pills mb-3 society-nav-session" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Events</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Society Members</a>
            </li>
          </ul>
          <div class="tab-content all-event-details-tab container-fluid" id="pills-tabContent">
            <div class="event-div-session tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-3">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">On Going Details</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Upcoming Events</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Event History</a>
                      </div>
                    </div>
                    <div class="col-9">
                      <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="event-details">
                                <h2 class="event-detail-title">Todays Event</h2>
                                <hr/>
                                <div class="all-event-cards">
                                    <div class="row">
                                        <?php if(count($ongoing_events) == 0 ): ?>
                                            <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                            <div>
                                                    <p class="no-event-text">No Ongoing Events</p>
                                                    <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $ongoing_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ongoing_event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-3">
                                                <div class="each-event-card d-flex flex-column">
                                                    <div class="today-event-img-session">
                                                        <img width="150px" src="<?php echo e(url("/event_images/$ongoing_event->profile_image")); ?>" alt="">
                                                    </div>
                                                    <div class="event-text-details">
                                                        <p class="event-title"><?php echo e($ongoing_event->name); ?></p>
                                                        <p class="date-and-time">
                                                            <span><i class="far fa-calendar-alt"></i><?php echo e($ongoing_event->date); ?></span>
                                                            <span><i class="far fa-clock"></i> <?php echo e($ongoing_event->time); ?></span>
                                                        </p>
                                                        <a id="each-event-register-button"  class="btn btn-md btn-success" href="<?php echo e(url('event/'.$ongoing_event->id)); ?>">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="event-details">
                                <h2 class="event-detail-title">Upcoming Event</h2>
                                <hr/>
                                <div class="all-event-cards">
                                    <div class="row">
                                        <?php if(count($upcoming_events) == 0 ): ?>
                                            <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                            <div>
                                                    <p class="no-event-text">No Upcoming Events</p>
                                                    <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $upcoming_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upcoming_event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-3">
                                                    <div class="each-event-card d-flex flex-column">
                                                        <div class="today-event-img-session">
                                                            <img  width="150px" src="<?php echo e(url("/event_images/$upcoming_event->profile_image")); ?>" alt="">
                                                        </div>
                                                        <div class="event-text-details">
                                                            <p class="event-title"><?php echo e($upcoming_event->name); ?></p>
                                                            <p class="date-and-time">
                                                                <span><i class="far fa-calendar-alt"></i> <?php echo e($upcoming_event->date); ?></span>
                                                                <span><i class="far fa-clock"></i> <?php echo e($upcoming_event->time); ?></span>
                                                            </p>
                                                            <a id="each-event-register-button"  class="btn btn-md btn-success" href="<?php echo e(url('event/'.$upcoming_event->id)); ?>">View Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="event-details">
                                <h2 class="event-detail-title">All Event History</h2>
                                <hr/>
                                <div class="all-event-cards">
                                    <div class="row">
                                            <?php if(count($past_events) == 0 ): ?>
                                                <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                                <div>
                                                        <p class="no-event-text">No Past Events</p>
                                                        <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $past_events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $past_event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-3">
                                                        <div class="each-event-card d-flex flex-column">
                                                                    <div class="today-event-img-session">
                                                                        <img width="150px" src="<?php echo e(url("/event_images/$past_event->profile_image")); ?>" alt="">
                                                                    </div>
                                                                    <div class="event-text-details">
                                                                        <p class="event-title"><?php echo e($past_event->name); ?></p>
                                                                        <p class="date-and-time">
                                                                            <span><i class="far fa-calendar-alt"></i> <?php echo e($past_event->date); ?></span>
                                                                            <span><i class="far fa-clock"></i> <?php echo e($past_event->time); ?></span>
                                                                        </p>
                                                                        <a id="each-event-register-button"  class="btn btn-md btn-success" href="<?php echo e(url('event/'.$past_event->id)); ?>">View Details</a>
                                                                    </div>
                                                                </div>


                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="All-Members-details">
                    <center><h2 class="all-member-header">All Members Details</h2><center>
                    <div class="council-heads container">
                        <h5>Council Heads <hr></h5>
                        <?php
                                    $head = $society_members->where('role','council-head')->first();
                                if($head){
                                    $member = \App\Models\User::where('email',$head->email)->first();
                                 }
                        ?>
                        <?php if(!$head): ?>
                            <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="no-event-text">No Council Head</p>
                                    <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="card" style="width: 18rem;">
                                <?php if($head): ?>
                                    <img src="<?php echo e(url("/profile_images/$member->profile_image")); ?>" class="card-img-top" alt="..." style="width : 100%; height : 250px; object-fit:cover">
                                <?php endif; ?>
                                    <div class="card-body">
                                    <?php if($head): ?>
                                        <p class="card-text" style="font-weight : 600; color:blue; font-size : 20px"><?php echo e($head->first_name." ".$head->last_name); ?></p>
                                        <p class="card-text"><?php echo e($head->email); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="council-members container">
                        <center><h5 id="all-memeber-session">All Council Members <hr></h5><center>
                        <div class="row">
                            <?php
                                $council_members_arr = [];
                            ?>
                            <?php $__currentLoopData = $society_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $society_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($society_member->role == 'council-head'): ?>
                                        <?php continue; ?>
                                    <?php else: ?>
                                        <?php
                                           array_push($council_members_arr , $society_member)
                                        ?>
                                    <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(count($council_members_arr) == 0): ?>
                                <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                    <div>
                                        <p class="no-event-text">No Council Members</p>
                                        <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <?php $__currentLoopData = $society_members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $society_member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($society_member->role == 'council-head'): ?>
                                        <?php continue; ?>
                                    <?php endif; ?>
                                    <?php
                                       $member = \App\Models\User::where('email',$society_member->email)->first()
                                    ?>
                                    <div class="col-4">
                                        <div class="card" style="width: 18rem;">
                                            <img src="<?php echo e(url("/profile_images/$member->profile_image")); ?>" class="card-img-top" alt="..." style="width : 100%; height : 250px; object-fit:cover">
                                            <div class="card-body">
                                            <p class="card-text" style="font-weight : 600; color:blue; font-size : 20px"><?php echo e($member->first_name." ".$member->last_name); ?></h1>
                                            <p class="card-text"><?php echo e($member->email); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
          </div>

 <?php echo $__env->make('/partials/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\vesitevents\resources\views/Society/society.blade.php ENDPATH**/ ?>