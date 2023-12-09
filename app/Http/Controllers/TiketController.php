<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\Event;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'id_event' => 'required',
            'jumlah_tiket' => 'required',
            'harga_tiket' => 'required',
        ]);
    
        // Logika penyimpanan data ke dalam tabel tiket
        Tiket::create([
            'id_event' => $request->id_event,
            'jumlah_tiket' => $request->jumlah_tiket,
            'harga_tiket' => $request->harga_tiket,
        ]);

        // Berikan respons ke klien (misalnya, redirect atau pesan sukses)
        return redirect()->back()->with('success', 'Tiket berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id_event' => 'required',
            'jumlah_tiket' => 'required|numeric',
            'harga_tiket' => 'required|numeric',
        ]);
    
        // Temukan tiket berdasarkan ID event
        $tiket = Tiket::where('id_event', $request->id_event)->first();
    
        // Periksa apakah tiket ditemukan
        if ($tiket) {
            // Update nilai tiket
            $tiket->update([
                'jumlah_tiket' => $request->jumlah_tiket,
                'harga_tiket' => $request->harga_tiket,
            ]);
    
            return redirect()->back()->with('success', 'Tiket berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Tiket tidak ditemukan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
