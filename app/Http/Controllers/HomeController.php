<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Preference;
use App\SecurityQuestion;
use App\Event;
use App\PreferenceList;
use Hash;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()) {
            $preferences = Preference::where('user_id',Auth::user()->id)->get();
            $events = Event::all();
            //$events = Event::whereIn('event_type',$preferences)->get();
        }
        else {
            $events = Event::all();
        }
            return view('home')->with(['events' => $events]);
    }

    public function register() {
        return view('auth.register')->with(['security_questions' => SecurityQuestion::all()]);
    }

    public function registerSave(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $confirm_password = $request->password_confirmation;
        $account_type = $request->type;
        $preferences = $request->preferences;
        $security_question = $request->security_question;
        $question_answer = $request->question_answer;

        if($password == $confirm_password) {
            $user = User::create(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'role_id' => $account_type,
                    'security_question' => $security_question,
                    'question_answer' => Hash::make($question_answer)
                ]
            );

            foreach($preferences as $preference) {
                Preference::create(
                    [
                        'user_id' => $user->id,
                        'preference_id' => $preference
                    ]
                );
            }
            return redirect('/login');
        }
        else {
            return back()->withMessage('ERROR TRY AGAIN!');
        }
    }

    public function login() {
        return view('auth.login');
    }

    public function logout() {
        return redirect('/')->with(Auth::logout());
    }

    public function resetPassword(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $password_confirm = $request->password_confirm;
        $question_confirm = $request->question_confirm;

        if($password == $password_confirm) {
            User::where('email',$email)->update(['password' => Hash::make($password)]);
            return redirect('/login');
        }
    }

    public function showEvent($id) {
        $event = Event::find($id);
        return view('event')->with(['event' => $event]);
    }

    public function createEvent() {
        if(Auth::user()->role_id == 3) {
            $music_types = PreferenceList::all();
            return view('create-event')->with(['music_types' => $music_types]);
        }
        else {
            return redirect('/');
        }
    }

    public function saveEvent(Request $request) {
        $name = $request->name;
        $address = $request->address;
        $city = $request->city;
        $state = $request->state;
        $zipcode = $request->zipcode;
        $description = $request->description;
        $type = $request->type;

        Event::create(
            [
                'user_id' => Auth::user()->id,
                'event_name' => $name,
                'description' => $description,
                'event_type' => $type,
                'address' => $address,
                'city' => $city,
                'state' => $state,
                'zipcode' => $zipcode
            ]
        );
        return redirect('/');
    }

    public function search(Request $request) {
        $search = $request->search;
        $events = Event::where('event_name','LIKE',"%$search%")->orWhere('description','LIKE',"%$search%")->get();
        return view('home')->with(['events' => $events, 'search' => $search]);
    }
}
