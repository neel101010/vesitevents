@include('/partials/header')
@include('/partials/navbar')

    <div class="container home-main-header">
        <div class="row">
            <div class="home-content col-md-6">
                <p class="home-main-title">VESIT Event Portal, One Platform for All Events.</p>
                <p class="home-description">This is all in one platform for VESIT events, you will
                  get here all the events from all the society's as well
                  from college. Here you will easily able to register for any
                  events which is held by college or society.</p>
            </div>
            <div class="col-md-6">
                <div class="home-img-session d-flex justify-content-center align-items-center">
                    <div class="home-ad-event-pic">
                        <img src="{{url("/asserts/eventpic3.png")}}" alt="Event-pic">
                    </div>
                    <div class="home-ad-left-right-arrow">
                        <img src="{{url("/asserts/left-right-arrow.jpg")}}" alt="Left-right-arrow">
                    </div>
                    <div class="home-ad-ves_logo">
                        <img src="{{url("/asserts/VES_logo.png")}}" alt="VES-logo">
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="home-page-all-society d-flex justify-content-center">
        <h4>All Societies</h4>
    </div>
    <div class="my-all-socierty-div d-flex justify-content-center">
        <div class="row my-society-content container">
            @foreach($societies as $society)
            <div class="col-6 col-md-3 d-flex justify-content-center">
                <a href="{{url('society',$society->name)}}">
                    <div class="CSI-society d-flex flex-column">
                        <img src="{{url("/asserts/$society->image ")}}">
                        <h4>{{$society->name}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <h4 class="my-ongoing-title-index-page">Today's Events</h4>
    </div>
    @php
        $req_arr = [];
        foreach($registered_events as $reg){
           array_push($req_arr , $reg->event_id);
        }
    @endphp
    <div class="MY-on-going-evenets-session">
        <div class="row">
            @if(count($ongoing_events) == 0 )
                <div class="nothing-is-their d-flex justify-content-center align-items-center">
                    <div>
                        <p class="no-event-text">No Todays Events</p>
                        <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                    </div>
                </div>
            @else
                @for($i=0; $i < sizeof($ongoing_events); $i++)
                <div class="col-12 col-md-4">
                    <div class="each-event-container">
                        <div class="img-session">
                            <img src="{{url("/event_images/".$ongoing_events[$i]->profile_image)}}" alt="event-img">
                        </div>
                        <div class="content-session">
                            <div class="upper-content d-flex flex-column">
                                <p class="main-title">{{$ongoing_events[$i]->name}}</p>
                                <p class="short-desc">{{$ongoing_events[$i]->short_description}}</p>
                                @php
                                    $guests_ids = \App\Models\Takenby::where('event_id',$ongoing_events[$i]->id)->get('guest_id');
                                    $guest_data = "";
                                @endphp
                                <p class="guest-text"><span>Guest:</span>

                                        @for($j=0 ; $j < sizeof($guests_ids) ; $j++)
                                            @php
                                            $guest = \App\Models\Guest::find($guests_ids[$j])->first();
                                            if(sizeof($guests_ids) == 1){
                                                $guest_data = $guest->name.".";
                                                break;
                                            }
                                            if($j == 0){
                                                $guest_data = $guest->name;
                                                continue;
                                            }
                                            @endphp

                                            @if($j < sizeof($guests_ids) - 1)
                                                @php
                                                    $guest_data = $guest_data.", ".$guest->name;
                                                @endphp
                                            @endif
                                            @if($j == sizeof($guests_ids) - 1)
                                                @php
                                                    $guest_data = $guest_data.", ".$guest->name.".";
                                                @endphp
                                            @endif
                                        @endfor
                                        {{$guest_data}}
                                </p>
                                <div class="date-time-div d-flex justify-content-start align-items-center">
                                    <p class="date-session"><span><i class="far fa-calendar-alt"></i></span>{{$ongoing_events[$i]->date}}</p>
                                    <p><span><i class="far fa-clock"></i></span> {{$ongoing_events[$i]->time}}</p>
                                </div>
                                <div class="register-button-div">
                                    @if(in_array($ongoing_events[$i]->id  , $req_arr))
                                        <a id="each-event-register-button" class="btn btn-md btn-success" href="/event/{{ $ongoing_events[$i]->id }}">Register</a>
                                    @else
                                        <a id="each-event-register-button" class="btn btn-md btn-primary" href="/event/{{ $ongoing_events[$i]->id }}">Register</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            @endif
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <h4 class="my-upcoming-title">Upcoming Events</h4>
    </div>
    <div class="MY-on-going-evenets-session">
            <div class="row">
                @if(count($upcoming_events) == 0 )
                    <div class="nothing-is-their d-flex justify-content-center align-items-center">
                        <div>
                            <p class="no-event-text">No Upcoming Events</p>
                            <p class="no-event-box-icon d-flex justify-content-center"><i class="fas fa-box-open"></i></p>
                        </div>
                    </div>
                @else
                    @for($i = 0; $i<sizeof($upcoming_events); $i++)
                        <div class="col-12 col-md-4">
                            <div class="each-event-container">
                                <div class="img-session">
                                    <img src="{{url("asserts/event_images/".$upcoming_events[$i]->profile_image )}}" alt="event-img">
                                </div>
                                <div class="content-session">
                                    <div class="upper-content d-flex flex-column">
                                        <p class="main-title">{{$upcoming_events[$i]->name}}</p>
                                        <p class="short-desc">{{$upcoming_events[$i]->short_description}}</p>
                                        @php
                                            $guests_ids = \App\Models\Takenby::where('event_id',$upcoming_events[$i]->id)->get('guest_id');
                                            $guest_data = "";
                                        @endphp
                                        <p class="guest-text"><span>Guest:</span>
                                            @for($j=0 ; $j < sizeof($guests_ids) ; $j++)
                                                @php
                                                    $guest = \App\Models\Guest::find($guests_ids[$j])->first();
                                                    if(sizeof($guests_ids) == 1){
                                                        $guest_data = $guest->name.".";
                                                        break;
                                                    }
                                                    if($j == 0){
                                                        $guest_data = $guest->name;
                                                        continue;
                                                    }
                                                @endphp

                                                @if($j < sizeof($guests_ids) - 1)
                                                    @php
                                                        $guest_data = $guest_data.", ".$guest->name;
                                                    @endphp
                                                @endif
                                                @if($j == sizeof($guests_ids) - 1)
                                                    @php
                                                        $guest_data = $guest_data.", ".$guest->name.".";
                                                    @endphp
                                                @endif
                                            @endfor
                                            {{$guest_data}}
                                        </p>
                                        <div class="date-time-div d-flex justify-content-start align-items-center">
                                            <p class="date-session"><span><i class="far fa-calendar-alt"></i></span>{{$upcoming_events[$i]->date}}</p>
                                            <p><span><i class="far fa-clock"></i></span> {{$upcoming_events[$i]->time}}</p>
                                        </div>
                                        <div class="register-button-div">
                                            @if(in_array($upcoming_events[$i]->id  , $req_arr))
                                            <a id="each-event-register-button" class="btn btn-md btn-success" href="event/{{ $upcoming_events[$i]->id }}">Register</a>
                                            @else
                                                <a id="each-event-register-button" class="btn btn-md btn-primary" href="event/{{ $upcoming_events[$i]->id }}">Register</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
    </div>

@include('/partials/footer')
