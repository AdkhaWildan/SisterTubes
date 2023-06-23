@extends('layout.main')

@section('container')

<form action="/logout" method="post">
    @csrf
    <button type="submit">LogOut</button>
</form>

<div class="container-fluid mb-5" style="margin-bottom: 150px !important">
    <div class="row mr-4">

        <ul>
            <a href="/agama">API Agama</a>
        </ul>
        <ul>
            <a href="/disabilitas">API Disabilitas</a>
        </ul>
        <ul>
            <a href="/statuskawin">API Status Kawin</a>
        </ul>
        <ul>
            <a href="/kelassosial">API Kelas Sosial</a>
        </ul>

    </div>
</div>
@endsection