@extends('layouts.app')

@section('title', 'Absensi Mata kuliah Mahasiswa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Absensi Mata kuliah Mahasiswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Users</a></div>
                    <div class="breadcrumb-item">Show Qrcode</div>
                </div>
            </div>

            <div class="section-body">

               
              <div class="visible-print text-center">
    {!! QrCode::size(100)->generate( $code ); !!}
    <p>Scan untuk absensi</p>
</div>             
</div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
