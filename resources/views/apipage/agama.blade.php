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

    <div class="col-xl-5 mt-5">
        <h5 class="card-title"><b>Demografi Berdasarkan Agama</b></h5>
        {{ $desa->nama }}</h5>
        {!! $chart->container() !!}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    </div>




    <!-- Table -->
    <div class="col-xl-5 mt-5">
        <h5>Tabel Data Agama</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Dusun</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agama_detail as $agama)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $agama->harvested_at }}</td>
                    <td>{{ $agama->dusun_nama }}</td>
                    <td>{{ $agama->agama }}</td>
                    <td>{{ $agama->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- End Table -->
    <br><br>
</center>


@endsection
{{-- @section('page-scripts') --}}
{{-- @endsection --}}