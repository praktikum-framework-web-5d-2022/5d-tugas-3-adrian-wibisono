@extends('layouts.navbar')
@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-8">
                <h2>Data Mata Kuliah</h2>
                <p>Masukkan data mata kuliah dengan lengkap</p>
               @if (session()->has('message'))
               <div class="my-3">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div> 
            
               @endif 
                <form action="{{ route('matakuliah.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="kode_mk" placeholder="masukkan kode mata kuliah" id="kode_mk"
                        value="{{ old('kode_mk') }}" 
                        class="form-control">
                        <label for="kode_mk">Kode Mata Kuliah</label>
                        @error('kode_mk')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="nama_mk" placeholder="masukkan nama mata kuliah" id="nama_mk" 
                        class="form-control" value="{{ old('nama_mk') }}">
                        <label for="nama_mk">Nama Mata Kuliah</label>
                        @error('nama_mk')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection