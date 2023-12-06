<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
        $kategori = Kategori::all();
        return view('pages.user-event.event.index', compact('event','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pages.user-event.event.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_userEvent' => 'required',
            'nama_event' => 'required',
            'deskripsi_event' => 'required',
            'foto_event' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'lokasi' => 'required',
            'waktu' => 'required',
            'tanggal_event' => 'required',
            'kategori_id' =>'required',
            
        ]);

        $input = $request->all();
  
        if ($image = $request->file('foto_event')) {
            $destinationPath = 'images/event/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto_event'] = "$profileImage";
        }
        $input['status'] = "pending";
    
        Event::create($input);

        
        return redirect()->route('event.index')->with('success', 'Data event Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('pages.user-event.event.detail', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $kategori = Kategori::all();
        $event = Event::find($id);
        return view('pages.user-event.event.edit', compact('event','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_userEvent' => 'required',
            'nama_event' => 'required',
            'deskripsi_event' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'tanggal_event' => 'required',
            'kategori_id' => 'required',
        ]);
        
        $input = $request->all();
        
        if ($image = $request->file('foto_event')) {
            $destinationPath = 'images/event/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['foto_event'] = $profileImage;
        }
        
        // Hapus baris berikut karena kita tidak ingin mengubah status saat melakukan update
        // $input['status'] = "pending";
        
        // Gantilah bagian ini dengan kode update
        $event = Event::findOrFail($id);
        $event->update($input);
        
        return redirect()->route('event.index')->with('success', 'Data event Berhasil Diperbarui');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();
        return redirect()->route('event.index')->with('success', 'Data event Berhasil Di Hapus');
    }
}
