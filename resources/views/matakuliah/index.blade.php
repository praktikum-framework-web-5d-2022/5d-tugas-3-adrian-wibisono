@extends('layouts.navbar')
@section('header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mata Kuliah</title>
</head>
<div class="container mt-3">
    <div class="header">
        <h1>Mata Kuliah</h1>
        <br>
        <div class="d-flex justify-content-between">
        <p>Halaman ini menampilkan data <span style="color: pink">mata kuliah</span></p>
            <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">Tambah</a>
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
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @forelse ($matakuliahs as $matakuliah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $matakuliah->kode_mk}}</td>
                        <td>{{ $matakuliah->nama_mk }}</td>
                        <td>
                            <a href="{{ route('matakuliah.edit',['matakuliah' => $matakuliah->id]) }}" class="btn btn-warning">Edit</a>
                            {{--  <a href="{{ route('matakuliah.destroy',['matakuliah' => $matakuliah->id]) }}" class="btn btn-danger">Delete</a>  --}}
                            <form action="{{ route('matakuliah.destroy',['matakuliah'=>$matakuliah->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-2">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td colspan="4">Tidak ada data...</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection











