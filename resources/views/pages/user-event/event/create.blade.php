@extends('layouts.user-event')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Data Masuk') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Event</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('event.store') }}"  id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group focused">
                                    <input type="hidden" id="id_userEvent" name="id_userEvent"
                                        value="{{ Auth::user()->id }}">

                                    <label class="form-control-label" for="nama_event">Nama event<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="nama_event" class="form-control" name="nama_event"
                                        placeholder="Isikan Nama event">
                                    <label class="form-control-label" for="deskripsi_event">Deskripsi<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="deskripsi_event" class="form-control" name="deskripsi_event"
                                        placeholder="Isikan Deskripsi_event">
                                    <label class="form-control-label" for="foto_event">Foto<span
                                            class="small text-danger">*</span></label>
                                    <input type="file" id="foto_event" class="form-control" name="foto_event"
                                        placeholder="Isikan foto_event">
                                    <label class="form-control-label" for="lokasi">Lokasi<span
                                            class="small text-danger">*</span></label>
                                    <input type="text" id="lokasi" class="form-control" name="lokasi"
                                        placeholder="Isikan lokasi">
                                    <label class="form-control-label" for="waktu">Waktu<span
                                            class="small text-danger">*</span></label>
                                    <input type="time" id="waktu" class="form-control" name="waktu">
                                    <label class="form-control-label" for="tanggal_event">Tanggal<span
                                            class="small text-danger">*</span></label>
                                    <input type="date" id="tanggal_event" class="form-control" name="tanggal_event">

                                    <label class="form-control-label"
                                            for="kategori_id">Kategori<span
                                                class="small text-danger">*</span></label>
                                    <select id="kategori_id" class="form-control"
                                        name="kategori_id">
                                        <option value="" selected disabled hidden>--Pilih Kategori--</option>                                        
                                        @foreach ($kategori as $Kategori)
                                            <option value="{{ $Kategori->id }}">{{ $Kategori->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Button -->
                <div class="p-2">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
@endsection
