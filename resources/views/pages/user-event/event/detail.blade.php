@extends('layouts.user-event')

@section('main-content')
<div class="row">

    <div class="col-lg-8 order-lg-2">

        <div class="card shadow mb-4">
            <div class="card-profile-image mt-4">
                <h1>{{$event->nama_event}}</h1>
                <hr>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <h6>Deskripsi :</h6>
                            <h5 class="font-weight-bold">{{$event->deskripsi_event}}</h5>
                        <h6>Lokasi :</h6>
                            <h5 class="font-weight-bold">{{$event->lokasi}}</h5>
                            <h6>Waktu :</h6>
                            <h5 class="font-weight-bold">{{$event->waktu}}</h5>
                            <h6>Tanggal :</h6>
                            <h5 class="font-weight-bold">{{$event->tanggal_event}}</h5>
                    </div>
                </div>               
            </div>
        </div>

    </div>

    <div class="col-lg-4 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
            </div>

            <div class="card-body">
                <img src="{{ asset('images/event/' . $event->foto_event) }}" width="100%">
            </div>

        </div>

    </div>

</div>
@endsection