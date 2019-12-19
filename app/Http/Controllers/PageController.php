<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function notFound() {
        return view("pages.404");
    }

    public function about() {
        return view("pages.About");
    }

    public function contact() {
        return view("pages.Contact");
    }

    public function contact2() {
        return view("pages.Contact2");
    }

    public function faq() {
        return view("pages.FAQ");
    }
    
    public function howItWork() {
        return view("pages.HowItWork");
    }
    
    public function pricing() {
        return view("pages.Pricing");
    }
    public function register() {
        return view("pages.Register");
    }
    public function termAndCondition() {
        return view("pages.termAndCondition");
    }
}
