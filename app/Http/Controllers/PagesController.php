<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function viewIndexPage(){
        $title = 'Match To Be One!';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function viewAboutPage(){
        $title = 'About';
        //return view('pages.index', compact('title'));
        return view('pages.about')->with('title', $title);
    }

    
    public function viewCodeOfConductPage(){
        $title = 'Code Of Conduct';
        //return view('pages.index', compact('title'));
        return view('pages.codeOfConduct')->with('title', $title);
    }

    public function viewContactPage(){
        $title = 'Contact';
        //return view('pages.index', compact('title'));
        return view('pages.contact')->with('title', $title);
    }

    public function viewStayingSafePage(){
        $title = 'Staying Safe';
        //return view('pages.index', compact('title'));
        return view('pages.stayingSafe')->with('title', $title);
    }

    public function viewLoginPage(){
        $title = 'Login';
        //return view('pages.index', compact('title'));
        return view('auth.login')->with('title', $title);
    }


}
