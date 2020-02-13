<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactForm;

class PageController extends Controller
{
    public function about(){
        return "ABOUT US PAGE";
    }
    public function profile ($id){
        $user = User::with(['questions','answers','answers.question'])->find($id);
        return view('profile')->with('user',$user);
    }
    public function contact(){
        return view('contact');
    }
    public function Sendcontact(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=> 'required|email',
            'subject'=>'required|min:3',
            'message'=> 'required|min:10'
        ]);
        Mail::to('wilfriedmambou300@gmail.com')->send(new ContactForm($request));
        return redirect('/');

    }
}
