@extends('layouts.navbar')
@section('header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dosen</title>
</head>
<div class="container mt-3">
    <div class="header">
        <h1>Dosen</h1>
        <br>
        <div class="d-flex justify-content-between">
        <p>Halaman ini menampilkan data <span style="color: pink">Dosen</span></p>
            <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    <br>
               @if (session()->has('message'))
               <div class="my-3">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div> 
            </div> 
               @endif 
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                <th>Nomor</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>  
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Photo</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($dosens as $dosen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama}}</td>
                        <td>{{ $dosen->jenis_kelamin }}</td>
                        <td>{{ $dosen->alamat }}</td>
                        <td>{{ $dosen->tempat_lahir }}</td>
                        <td>{{ $dosen->tanggal_lahir }}</td>
                        <td><img src="{{ asset('storage/' . $dosen->photo) }}" width="50"></td>
                        <td>
                            <a href="{{ route('dosen.edit',['dosen' => $dosen->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('dosen.destroy',['dosen' => $dosen->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <td colspan="9">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection











