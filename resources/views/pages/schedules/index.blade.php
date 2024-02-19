@extends('layouts.app')

@section('title', 'Schedules')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard Jadwal Matakuliah</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Jadwal Absensi</a></div>
                    <div class="breadcrumb-item">Mata kuliah</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Mahasiswa</h4>
                            <!--  <div class="section-header-button">
                                    <a href="{{ route('user.create') }}" class="btn btn-primary">New User</a>
                                </div> -->
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET", action="{{ route('subject.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Hari</th>
                                        <th>Jam masuk</th>
                                        <th>Jam keluar</th>
                                        <th>Ruangan</th>
                                        <th>Kode Absensi</th>
                                        <th>Action</th>
                                       <!-- <th>Kode Matakuliah</th> -->
                                    <!--    <th>Description</th> -->
                                         
                                    </tr>
                                        </thead>
                                    
                                    <tbody>
                                        @forelse ($schedules as $schedule)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $schedule->subject->title }}</td>
                                            <td>{{ $schedule->hari }}</td>
                                            <td>{{ $schedule->jam_mulai }}</td>
                                            <td>{{ $schedule->jam_selesai }}</td>
                                            <td>{{ $schedule->ruangan }}</td>

                                            <td><a href="{{ route('generate-qrcode',$schedule->id) }}" 
                                                    class="btn btn-primary btn-sm">Generate QRcode</a>
                                            </td>
                                
                                            <!--<td>{{ $schedule->tahun_akademik }}</td>
                                            <td>{{ $schedule->semester }}</td> -->
                                            <td>
                                                <a href="{{ route('schedule.edit', $schedule->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <form action="{{ route('schedule.destroy', $schedule->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No Data</td>
                                        </tr>
                                        @endforelse
                                       </tbody>

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $schedules->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
