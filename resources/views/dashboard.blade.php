@extends('layouts.navbar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    @section('header')
    <div class="container mt-3">
        <div class="header">
            <h1>Dashboard</h1>
            <br>
            <p>Halaman ini menampilkan <span style="color: pink">SIAKAD</span> </p>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Dosen</h5>
                          <p class="card-text">Jumlah Dosen</p>
                          <p> {{ $dosen }} Dosen</p>
                          <a href="{{ route('dosen.index') }}" class="btn btn-primary">Lihat Data</a>
                        </div>
                      </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Mahasiswa</h5>
                          <p class="card-text">Jumlah Mahasiswa</p>
                          <p>{{ $mahasiswa }} Mahasiswa</p>
                          <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Lihat Data</a>
                        </div>
                      </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Mata Kuliah</h5>
                          <p class="card-text">Jumlah Mata Kuliah</p>
                          <p>{{ $matakuliah }} Mata Kuliah</p>
                          <a href="{{ route('matakuliah.index') }}" class="btn btn-primary">Lihat Data</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>