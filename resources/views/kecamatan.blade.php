@extends('layout.main')
<!-- Main Awal -->
@section('container')

<style>
body {
    background-color: white;
}
</style>
<nav class="navbar navbar-expand-lg bg-primary navbar-dark shadow h-100">
    <div class="container">
        <a class="navbar-brand" href="/dashboard">Open<b>SID</b></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="/logout" id="logout" method="post">
                        @csrf
                        <a class="nav-link" href="/logout"
                            onclick="event.preventDefault();document.getElementById('logout').submit();">Log
                            Out</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Content -->
<div class="container-fluid">

    <div class="row">
        @foreach ($daftar_kecamatan as $kecamatan)
        <!-- Card1 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 mb-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kecamatan
                                {{ $kecamatan->nama }}</div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a class="btn btn-primary btn-sm"
                                href="/dashboard/kecamatan/{{ $kecamatan->url_kecamatan }}/desa" role="button">See
                                Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection