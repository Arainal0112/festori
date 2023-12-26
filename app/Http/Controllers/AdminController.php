<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::All();
        $event = Event::all();

        $widget = [
            'users' => $users,
            //...
        ];
        return view('pages.admin.home', compact('widget', 'event'));
    }
    public function order()
    {
        $event = Event::all();
        return view('pages.admin.event.index', compact('event'));
    }
    public function acceptEvent($id)
    {
        $event = Event::find($id);

        if ($event) {
            // Perbarui status menjadi "success"
            $event->status = 'success';
            $event->save();
        }

        return redirect()->route('admin.order')->with('success', 'Event Berhasil DiTerima');
    }
}
