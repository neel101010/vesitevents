@include('/partials/header')
@include('/partials/navbar')

        <div class="each-society-information d-flex justify-content-center">
            <div class="society-details-society-page d-flex flex-column">
                <div class="society-img-session">
                    <img src="{{url("/asserts/$society->image")}}" style="width:130px; height:130px; object-fit:cover;">
                </div>
                <h4>{{$society->name}} Society</h4>
                <p> {{$society->description}} </p>
                <div class="button-session">
                    <button class="btn btn-sm btn-light"><i class="fas fa-users"></i> {{$society->total_members}} Employees </button>
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
                                        @if(count($ongoing_events) == 0 )
                                            <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                            <div>
                                                    <p class="no-event-text">No Ongoing Events</p>
                                                    <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                                </div>
                                            </div>
                                        @else
                                            @foreach($ongoing_events as $ongoing_event)
                                            <div class="col-3">
                                                <div class="each-event-card d-flex flex-column">
                                                    <div class="today-event-img-session">
                                                        <img width="150px" src="{{url("/event_images/$ongoing_event->profile_image")}}" alt="">
                                                    </div>
                                                    <div class="event-text-details">
                                                        <p class="event-title">{{$ongoing_event->name}}</p>
                                                        <p class="date-and-time">
                                                            <span><i class="far fa-calendar-alt"></i>{{$ongoing_event->date}}</span>
                                                            <span><i class="far fa-clock"></i> {{$ongoing_event->time}}</span>
                                                        </p>
                                                        <a id="each-event-register-button"  class="btn btn-md btn-success" href="{{url('event/'.$ongoing_event->id)}}">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif
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
                                        @if(count($upcoming_events) == 0 )
                                            <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                            <div>
                                                    <p class="no-event-text">No Upcoming Events</p>
                                                    <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                                </div>
                                            </div>
                                        @else
                                            @foreach($upcoming_events as $upcoming_event)
                                                <div class="col-3">
                                                    <div class="each-event-card d-flex flex-column">
                                                        <div class="today-event-img-session">
                                                            <img  width="150px" src="{{url("/event_images/$upcoming_event->profile_image")}}" alt="">
                                                        </div>
                                                        <div class="event-text-details">
                                                            <p class="event-title">{{$upcoming_event->name}}</p>
                                                            <p class="date-and-time">
                                                                <span><i class="far fa-calendar-alt"></i> {{$upcoming_event->date}}</span>
                                                                <span><i class="far fa-clock"></i> {{$upcoming_event->time}}</span>
                                                            </p>
                                                            <a id="each-event-register-button"  class="btn btn-md btn-success" href="{{url('event/'.$upcoming_event->id)}}">View Details</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
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
                                            @if(count($past_events) == 0 )
                                                <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                                <div>
                                                        <p class="no-event-text">No Past Events</p>
                                                        <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach($past_events as $past_event)
                                                    <div class="col-3">
                                                        <div class="each-event-card d-flex flex-column">
                                                                    <div class="today-event-img-session">
                                                                        <img width="150px" src="{{url("storage/event_images/$past_event->profile_image")}}" alt="">
                                                                    </div>
                                                                    <div class="event-text-details">
                                                                        <p class="event-title">{{$past_event->name}}</p>
                                                                        <p class="date-and-time">
                                                                            <span><i class="far fa-calendar-alt"></i> {{$past_event->date}}</span>
                                                                            <span><i class="far fa-clock"></i> {{$past_event->time}}</span>
                                                                        </p>
                                                                        <a id="each-event-register-button"  class="btn btn-md btn-success" href="{{url('event/'.$past_event->id)}}">View Details</a>
                                                                    </div>
                                                                </div>


                                                    </div>
                                                @endforeach
                                            @endif
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
                        @php
                                    $head = $society_members->where('role','council-head')->first();
                                if($head){
                                    $member = \App\Models\User::where('email',$head->email)->first();
                                 }
                        @endphp
                        @if(!$head)
                            <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                <div>
                                    <p class="no-event-text">No Council Head</p>
                                    <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                </div>
                            </div>
                        @else
                            <div class="card" style="width: 18rem;">
                                @if($head)
                                    <img src="{{url("storage/profile_images/$member->profile_image")}}" class="card-img-top" alt="..." style="width : 100%; height : 250px; object-fit:cover">
                                @endif
                                    <div class="card-body">
                                    @if($head)
                                        <p class="card-text" style="font-weight : 600; color:blue; font-size : 20px">{{  $head->first_name." ".$head->last_name }}</p>
                                        <p class="card-text">{{$head->email}}</p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="council-members container">
                        <center><h5 id="all-memeber-session">All Council Members <hr></h5><center>
                        <div class="row">
                            @php
                                $council_members_arr = [];
                            @endphp
                            @foreach($society_members as $society_member)
                                    @if($society_member->role == 'council-head')
                                        @continue
                                    @else
                                        @php
                                           array_push($council_members_arr , $society_member)
                                        @endphp
                                    @endif
                            @endforeach
                            @if(count($council_members_arr) == 0)
                                <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                    <div>
                                        <p class="no-event-text">No Council Members</p>
                                        <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                                    </div>
                                </div>
                            @else
                                @foreach($society_members as $society_member)
                                    @if($society_member->role == 'council-head')
                                        @continue
                                    @endif
                                    @php
                                       $member = \App\Models\User::where('email',$society_member->email)->first()
                                    @endphp
                                    <div class="col-4">
                                        <div class="card" style="width: 18rem;">
                                            <img src="{{url("storage/profile_images/$member->profile_image")}}" class="card-img-top" alt="..." style="width : 100%; height : 250px; object-fit:cover">
                                            <div class="card-body">
                                            <p class="card-text" style="font-weight : 600; color:blue; font-size : 20px">{{$member->first_name." ".$member->last_name}}</h1>
                                            <p class="card-text">{{$member->email}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
          </div>

 @include('/partials/footer')
