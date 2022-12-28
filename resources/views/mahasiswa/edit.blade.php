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
                <h2>Data Mahasiswa</h2>
                <p>Masukkan data mahasiswa dengan lengkap</p>
               @if (session()->has('message'))
               <div class="my-3">
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            </div> 
            
               @endif 
               <form action="{{ route('mahasiswa.update',['mahasiswa' => $mahasiswa->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="npm" placeholder="masukkan npm" id="npm" value="{{ old('npm') ?? $mahasiswa->npm}}" class="form-control">
                        <label for="npm">npm</label>
                        @error('npm')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="nama" placeholder="masukkan nama" id="nama" 
                        class="form-control" value="{{ old('nama') ?? $mahasiswa->nama }}">
                        <label for="nama">Nama</label>
                        @error('nama')
                        <div class="text-danger">
                        {{ $message }}    
                        </div> 
                        @enderror
                    </div>
                    

                <div class="form-floating mb-3  ">
                    <select name="jenis_kelamin" placeholder="masukkan jenis kelamin" id="jeniskelamin" class="form-select">
                        <option value="Laki-Laki" {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == "Laki-Laki" ? "selected" : "" }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') ?? $mahasiswa->jenis_kelamin == "Perempuan" ? "selected" : "" }}>Perempuan</option>
                    </select>
                    <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
                    @error('jenis_kelamin')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="alamat" id="alamat" placeholder="masukkan alamat" value="{{old('alamat')  ?? $mahasiswa->alamat }}"  class="form-control">
                    <label for="alamat">Alamat</label>
                    @error('alamat')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tempat_lahir" placeholder="masukkan tempat lahir" id="tempatlahir" 
                   value=" {{ old('tempat_lahir')  ?? $mahasiswa->tempat_lahir  }}" class="form-control">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    @error('tempat_lahir')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="tanggal_lahir" placeholder="masukkan tanggal lahir" id="tanggal" value="{{old('tanggal_lahir',$mahasiswa->tanggal_lahir)}}" class="form-control">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    @error('tanggal_lahir')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" value="{{ old('photo')  ?? $mahasiswa->photo  }}" class="form-control">
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