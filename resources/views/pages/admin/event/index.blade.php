@extends('layouts.admin')

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
                    <div class="table-responsive">
                        <table class="table table-bordered align-items-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Event</th>
                                    <th>User Event</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($event as $Event)
                                <tbody>
                                    <tr>
                                        <td class="text-center col-1">{{ $loop->iteration }}</td>
                                        <td>{{ $Event->nama_event }}</td>
                                        <td>{{ $Event->userEvent->name_user_event }}</td>
                                        <td>{{$Event->status}}</td>
                                        <td>
                                            @if ($Event->status == 'pending')
                                                <form action="{{ route('admin.accept', $Event->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="btn btn-success">Terima</button>
                                                </form>
                                            
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
