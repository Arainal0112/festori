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
                    <a class="btn btn-primary" href="{{ route('event.create') }}">Tambah Event</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-items-center" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Event</th>
                                    <th>Lokasi</th>
                                    <th>Waktu</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            @foreach ($event as $Event)
                                @if ($Event->id_userEvent == Auth::id()) <!-- Filter event berdasarkan id_userEvent -->
                                    <tbody>
                                        <tr>
                                            <td class="text-center col-1">{{$i}}</td>
                                            <td>{{$Event->nama_event}}</td>
                                            <td>{{$Event->lokasi}}</td>
                                            <td>{{$Event->waktu}}</td>
                                            {{-- <td><img src="{{ asset('images/event/' . $Event->foto_event) }}" width="100px"></td> --}}
                                            <td>{{$Event->tanggal_event}}</td>
                                            @if ($Event->status == 'success')
                                            <td><span class="status-success">{{$Event->status}}</span></td>
                                            @else
                                            <td><span class="status">{{$Event->status}}</span></td>
                                            @endif
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('event.show', $Event->id) }}"><i class="fa-solid fa-circle-info"></i></a>
                                                <a class="btn btn-secondary" href="{{ route('event.edit', $Event->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#hapusModal"><i class="fa-solid fa-trash"></i></a>
                                                @include('components.alert.delete', ['route' => route('event.destroy', $Event->id), 'modalId' => 'hapusModalevent_' . $Event->id])
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php $i++; ?>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
