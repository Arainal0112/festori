<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
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

    // USER
    public function index()
    {
        $kategori = Kategori::all();
        $event = Event::all();
        $latestEvent = Event::latest()->take(2)->get();
        return view('pages.users.home', compact('event', 'kategori', 'latestEvent'));
    }

    public function event()
    {
        $kategori = Kategori::all();
        $event = Event::all();
        return view('pages.users.event', compact('event', 'kategori'));
    }
    public function detail(Request $request, $id)
    {

        $event = Event::find($id);
        return view('pages.users.detail', compact('event'));
    }
    public function eventAll(){
        return view('pages.users.event');
    }
    // USER EVENT
    public function user_event()
    {
        return view('pages.user-event.home');
    }


    //ADMIN
    public function order()
    {
        return view('pages.users.order');
    }
}
