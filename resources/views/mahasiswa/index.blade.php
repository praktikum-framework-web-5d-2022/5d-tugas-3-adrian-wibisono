@extends('layouts.navbar')
@section('header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahasiswa</title>
</head>
<div class="container mt-3">
    <div class="header">
        <h1>Mahasiswa</h1>
        <br>
        <div class="d-flex justify-content-between">
        <p>Halaman ini menampilkan data <span style="color: pink">mahasiswa</span></p>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah</a>
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
                <th>NPM</th>
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
                @forelse ($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->npm }}</td>
                        <td>{{ $mahasiswa->nama}}</td>
                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                        <td>{{ $mahasiswa->alamat }}</td>
                        <td>{{ $mahasiswa->tempat_lahir }}</td>
                        <td>{{ $mahasiswa->tanggal_lahir }}</td>
                        <td><img src="{{ asset('storage/' . $mahasiswa->photo) }}" width="50"></td>
                        <td>
                            <a href="{{ route('mahasiswa.edit',['mahasiswa' => $mahasiswa->id]) }}" class="btn btn-warning">Edit</a>
                            {{--  <a href="{{ route('mahasiswa.destroy',['mahasiswa' => $mahasiswa->id]) }}" class="btn btn-danger">Delete</a>  --}}
                            <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mahasiswa->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-2">
                                    Delete
                                </button>
                            </form>
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











