@include('/partials/header')
@include('/partials/navbar')

        <div class="container user-profile-details">
            <div class="row">
                <div class="col-3">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Personal Details</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Class Details</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Society Details</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Event Reqistered</a>
                  </div>
                </div>
                <div class="col-9">
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="personal-details d-flex flex-column">
                            <h2 class="personal-detail-title"> Personal Details </h2>
                            <form action="profile/personaldetails" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="Enter First Name" value="{{ $user->first_name }}">
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Last Name</label>
                                            <input type="text"  name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="Enter last Name" value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Gender</label>
                                            <input type="text" name="gender" class="form-control" id="exampleFormControlInput1" placeholder="Your Gender" value="male">
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Phone Number</label>
                                            <input type="number" name="phone_number" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number" value="{{ $user->phone_number }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter last Name" value="{{ $user->email }}" disabled>
                                </div>
                                <button class="btn btn-md btn-primary" > Save </button>
                              </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="class-details">
                            <h2 class="class-detail-title">Class Details</h2>
                            <form action="profile/classdetails" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Department</label>
                                            <input type="text" name="department" class="form-control" id="exampleFormControlInput1" placeholder="Your Department" value="{{ $user->department }}">
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Current Year Of Study</label>
                                            <input type="number" name="current_year" class="form-control" id="exampleFormControlInput1" placeholder="Your Year Of study" value="{{ $user->current_year }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Class</label>
                                            <input type="number" name="class" class="form-control" id="exampleFormControlInput1" placeholder="Your Class" value="{{ $user->class }}">
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Roll No.</label>
                                            <input type="number" name="roll_no" class="form-control" id="exampleFormControlInput1" placeholder="Your Roll No" value="{{ $user->roll_no }}">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-md btn-primary"> Save </button>
                              </form>
                        </div>
                    </div>
                    {{-- Society Details --}}
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <div class="society-details">
                            <h2 class="society-detail-title">Society Details</h2>
                            <form action="profile/societydetails" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="label">Society Name(From Which you belong)</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="society">
                                                @php
                                                   $society_name = array('None', 'Isa' , 'Ieee', 'Csi' , 'Iste');
                                                @endphp
                                                @if(!$council_member)
                                                    <option selected>NONE</option>
                                                    <option>ISA</option>
                                                    <option>IEEE</option>
                                                    <option>CSI</option>
                                                    <option>ISTE</option>
                                                @else
                                                    @foreach($society_name as $society)
                                                    @if($society == $council_member->society_name)
                                                        <option selected>{{ strtoupper($council_member->society_name) }}</option>
                                                        @else
                                                        <option> {{ strtoupper($society) }} </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="label">Role(What is your role in that society)</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                             @php
                                                $roles = array('None', 'Normal-member' , 'council-member', 'council-head');
                                             @endphp
                                             @if(!$council_member)
                                                    <option selected>NONE</option>
                                                    <option>NORMAL-MEMBER</option>
                                                    <option>COUNCIL-MEMBER</option>
                                                    <option>COUNCIL-HEAD</option>
                                             @else
                                                @foreach($roles as $role)
                                                    @if($role == $council_member->role)
                                                    <option selected>{{ strtoupper($role) }}</option>
                                                    @else
                                                        <option> {{ strtoupper($role) }} </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-md btn-primary"> Save </button>
                              </form>
                        </div>
                    </div>

                    {{-- Event Registered session --}}
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="event-details">
                            <h2 class="event-detail-title">Registered Event Details</h2>
                            <div class="all-event-cards">
                                <div class="row">
                                    @if(count($events) == 0 )
                                        <div class="nothing-is-their d-flex justify-content-center align-items-center">
                                            <div>
                                                <p class="no-event-text">No Events</p>
                                                <p class="no-event-box-icon"><i class="fas fa-box-open"></i></p>
                                            </div>
                                        </div>
                                    @else
                                        @foreach($events as $event)
                                        <div class="col-4">
                                            <div class="each-event-card d-flex flex-column">
                                                <div class="event-text-details">
                                                    <p class="event-title">{{$event->name}}</p>
                                                    <p class="date-and-time">
                                                        <span><i class="far fa-calendar-alt"></i>{{$event->date}}</span>
                                                        <span><i class="far fa-clock"></i>{{$event->time}}</span>
                                                    </p>
                                                    <a id="each-event-register-button"  class="btn btn-md btn-warning" href="{{route('event_page',$event->id)}}">View Details</a>
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

@include('/partials/footer')

