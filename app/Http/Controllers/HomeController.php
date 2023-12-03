<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.users.home');
    }
    public function event() {
        return view('pages.users.event');
    }
    public function detail() {
        return view('pages.users.detail');
    }
    public function order() {
        return view('pages.users.order');
    }
}
