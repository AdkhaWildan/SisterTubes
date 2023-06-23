@extends('layout.main')

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


<center>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Desa</h5>

            <!-- Table with hoverable rows -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Data</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar_api as $api)
                    <tr>
                        <th scope="row">1</th>
                        <td>Data {{ ucfirst($api->path_api) }}</td>
                        <td>
                            <div class="mx-auto">
                                <a class="btn btn-primary btn-sm" role="button"
                                    href="/dashboard/kecamatan/{{ $kecamatan->url_kecamatan }}/desa/{{ $desa->url_desa }}/daftar-api/{{ $api->path_api }}">>See
                                    Detail</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- End Table with hoverable rows -->

        </div>
    </div>
</center>
@endsection