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
<center>
    <!-- <div class="container-fluid">
        <div class="row"> -->
    <div class="col-xl-5 mt-5">
        <h5 class="card-title"><b>Demografi Berdasarkan Status Perkawinan</b></h5>
        {{ $desa->nama }}</h5>
        {!! $chart->container() !!}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8">
        </script>
        {!! $chart->script() !!}
    </div>

    <!-- Table -->
    <div class="col-xl-5 mt-5">
        <h5>Tabel Data Status Perkawinan</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Dusun</th>
                    <th scope="col">Status Kawin</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($status_kawin_detail as $status)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $status->harvested_at }}</td>
                    <td>{{ $status->dusun_nama }}</td>
                    <td>{{ $status->status_kawin }}</td>
                    <td>{{ $status->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- End Table -->
    <!-- </div>
    </div> -->
    <br><br>
</center>



@endsection
{{-- @section('page-scripts') --}}
{{-- @endsection --}}