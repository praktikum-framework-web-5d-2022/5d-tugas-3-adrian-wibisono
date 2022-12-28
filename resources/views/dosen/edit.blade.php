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
                <h2>Data Dosen</h2>
                <p>Masukkan data dosen dengan lengkap</p>
               @if (session()->has('message'))
               <div class="my-3">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div> 
            
               @endif 
                <form action="{{ route('dosen.update',['dosen' => $dosen->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="nama" placeholder="masukkan nama" id="nama" 
                        class="form-control" value="{{ old('nama') ?? $dosen->nama }}">
                        <label for="nama">Nama</label>
                        @error('nama')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="nidn" placeholder="masukkan nidn" id="nidn" value="{{ old('nidn') ?? $dosen->nidn}}" class="form-control">
                        <label for="nidn">NIDN</label>
                        @error('nidn')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>

                <div class="form-floating mb-3  ">
                    <select name="jenis_kelamin" placeholder="masukkan jenis kelamin" id="jeniskelamin" class="form-select">
                        <option value="Laki-Laki" {{ old('jenis_kelamin') ?? $dosen->jenis_kelamin == "Laki-Laki" ? "selected" : "" }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') ?? $dosen->jenis_kelamin == "Perempuan" ? "selected" : "" }}>Perempuan</option>
                    </select>
                    <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                    @error('jenis_kelamin')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="alamat" id="alamat" placeholder="masukkan alamat" value="{{old('alamat')  ?? $dosen->alamat }}"  class="form-control">
                    <label for="alamat">Alamat</label>
                    @error('alamat')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tempat_lahir" placeholder="masukkan tempat lahir" id="tempatlahir" 
                   value=" {{ old('tempat_lahir')??$dosen->tempat_lahir  }}" class="form-control">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    @error('tempat_lahir')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="tanggal_lahir" placeholder="masukkan tanggal lahir" id="tanggal" value="{{ old('tanggal_lahir', $dosen->tanggal_lahir) }}" class="form-control">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    @error('tanggal_lahir')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" value="{{ old('photo', $dosen->photo) }}" class="form-control">
                    @error('photo')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
@endsection