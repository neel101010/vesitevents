<?php

namespace App\Http\Controllers;

use App\Models\CouncilMember;
use App\Models\Event;
use App\Models\Member;
use App\Models\Register;
use App\Models\Society;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{

    //Main page view
    function mainPage()
    {
        $societies = Society::all();
        $user = User::where('email', session()->get('email'))->first();
        $registered_events = Register::all();
        if ($user) {
            $registered_events = Register::where("user_id", $user->id)->get();
        }
        $ongoing_events = Event::whereDate('date', '=', date('Y-m-d'))->get();
        $upcoming_events = Event::whereDate('date', '>', date('Y-m-d'))->get();
        return view('index', compact(['societies', 'user', 'upcoming_events', 'ongoing_events' , 'registered_events']));
    }


    //Society Page view
    function societyPage(Request $request)
    {
        $society = Society::where('name', $request->name)->first();
        $user = User::where('email', session()->get('email'))->first();
        $past_events = Event::where('society', $society->name)
            ->whereDate('date', '<', date('Y-m-d'))
            ->get();
        $ongoing_events = Event::where('society', $society->name)
            ->whereDate('date', '=', date('Y-m-d'))
            ->get();
        $upcoming_events = Event::where('society', $society->name)
            ->whereDate('date', '>', date('Y-m-d'))
            ->get();
        $society_members = CouncilMember::where('society_name', $request->name)->get();
        $count = CouncilMember::where('society_name', $request->name)->count();
        $society->total_members = $count;
        $society->save();
        return view('Society/society', compact(['society', 'user', 'ongoing_events', 'upcoming_events','past_events','society_members']));
    }

    //Password Reset
    function passwordResetPage()
    {
        return view('LoginAndRegister/reset_pass');
    }

    function passwordReset(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            Mail::to($user->email)->send(new MailController($user, 'MailTemplates/password_mail'));
            $status = "Email link has been send.";
            return redirect('/reset')->with('status', $status);
        } else {
            $status = "User doest not exist";
            return redirect('/reset')->with('status', $status);
        }
    }

    function newPasswordPage(Request $request, $email)
    {
        $id = User::where('email', $request->email)->first('id');
        return view('LoginAndRegister/new_password', compact(['id']));
    }

    function newPassword(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        $status = "Password Reset Complete";
        return redirect('/login')->with('status');
    }


    function personalDetailPage()
    {

        $user = User::where('email', session()->get('temp_email'))->first();
//        session()->forget('email');
        return view('User/personalDetailForm', compact(['user']));
    }

    function personalDetailAdd(Request $request)
    {
        $new_user = User::where('email', session()->get('temp_email'))->first();
        $new_user->email = session()->get('temp_email');
        $new_user->first_name = $request->firstname;
        $new_user->last_name = $request->lastname;
        $imageName = time() . '' . $request->image->getClientOriginalName();;
        $request->image->move(public_path('profile_images'), $imageName);
        $new_user->profile_image = $imageName;
        $new_user->phone_number = $request->phonenumber;
        session()->put('new_user', $new_user);
        return redirect('/classdetails');
    }

    function classDetailPage()
    {
        $user = User::where('email', session()->get('temp_email'))->first();
        return view('User/classAndSocietyDetailsForm', compact(['user']));
    }

    function classDetailAdd(Request $request)
    {
        $new_user = session()->get('new_user');
        $new_user->department = $request->department;
        $new_user->current_year = $request->current_year;
        $new_user->class = $request->class;
        $new_user->roll_no = $request->roll_no;
        if ($request->society != "None") {
            $society = Society::where('name', $request->society)->first();
            if ($request->role == "Normal-member") {
                $new_user->society()->attach($society->id);
            } else {
                $council_member = new CouncilMember();
                $council_member->first_name = $new_user->first_name;
                $council_member->last_name = $new_user->last_name;
//                $imageName = time().'.'.$request->image->extension();
//                $request->image->move(public_path('profile_images'), $imageName);
//                $council_member->profile_image = $imageName;
                $council_member->phone_number = $new_user->phone_number;
                $council_member->email = $new_user->email;
                $council_member->department = $new_user->department;
                $council_member->password = $new_user->password;
                $council_member->current_year = $new_user->current_year;
                $council_member->class = $new_user->class;
                $council_member->roll_no = $new_user->roll_no;
                $council_member->society_id = $society->id;
                $council_member->society_name = $society->name;
                $council_member->role = $request->role;
                $council_member->save();
                // $temp_society = Society::where('name',$society->name)->get();
                // $count = CouncilMember::where('society_name',$society->name)->count();
                // $temp_society->	total_members = $count;
                // $temp_society->save();
            }
        }
        $new_user->save();
        session()->forget('new_user');
        return redirect('/');
    }

    function userProfilePage()
    {
        $user = User::where('email', session()->get('email'))->first();
        $events = Register::where('user_id', $user->id)->get();
        $society_member = Society::join('members', 'members.society_id', '=', 'societies.id')
            ->where('members.user_id', $user->id)
            ->get();
        $council_member = CouncilMember::where('email', $user->email)->first();
        $events = Event::join('registers','registers.event_id','=','events.id')
            ->where('registers.user_id',$user->id)
            ->get();
        return view('User/profile', compact(['user', 'events' , 'council_member']));
    }


    function userPersonalEdit(Request $request){
        $user = User::where('email',session()->get('email'))->first();
        $council_member = CouncilMember::where('email',session()->get('email'))->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $council_member->first_name = $request->first_name;
        $council_member->last_name = $request->last_name;
        $council_member->phone_number = $request->phone_number;
        $user->save();
        $council_member->save();
        return redirect('user/profile');
    }

    function userClassEdit(Request $request){
        $user = User::where('email',session()->get('email'))->first();
        $council_member = CouncilMember::where('email',session()->get('email'))->first();
        $user->department = $request->department;
        $user->class = $request->class;
        $user->current_year = $request->current_year;
        $user->roll_no = $request->roll_no;
        $council_member->department = $request->department;
        $council_member->class = $request->class;
        $council_member->roll_no = $request->roll_no;
        $council_member->current_year = $request->current_year;
        $user->save();
        $council_member->save();
        return redirect('user/profile');
    }

    function userSocietyEdit(Request $request){
        $user = User::where('email',session()->get('email'))->first();
        $council_member = CouncilMember::where('email',session()->get('email'))->first();
        $society = Society::where('name',$request->society)->first();
        if($request->role == "Normal Member"){
            $already_member = Member::where('society_id',$society->id)
                ->where('user_id',$user->id)
                ->first();
            if(!$already_member){
                $user->society()->attach($society->id);
            }
        }
        if(!$council_member){
            $council_member = new CouncilMember();
            $council_member->first_name = $user->first_name;
            $council_member->last_name = $user->last_name;
//                $imageName = time().'.'.$request->image->extension();
//                $request->image->move(public_path('profile_images'), $imageName);
//                $council_member->profile_image = $imageName;
            $council_member->phone_number = $user->phone_number;
            $council_member->email = $user->email;
            $council_member->department = $user->department;
            $council_member->password = $user->password;
            $council_member->current_year = $user->current_year;
            $council_member->class = $user->class;
            $council_member->roll_no = $user->roll_no;
            $council_member->society_id = $society->id;
            $council_member->society_name = $society->name;
            $council_member->role = $request->role;
            $council_member->save();
            // $temp_society = Society::where('name',$society->name)->get();
            // $count = CouncilMember::where('society_name',$society->name)->count();
            // $temp_society->	total_members = $count;
            // $temp_society->save();
        }
        return redirect('user/profile');
    }

    function userEvents(){
        $user = User::where('email',session()->get('email'))->first();
    }

    public function addSponsor(){
        return view("Events/addsponsor");
    }


}
