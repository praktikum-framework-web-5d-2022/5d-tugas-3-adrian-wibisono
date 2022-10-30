@extends('layouts.link')

<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #800000; color: white">
    <div class="container">
        <a class="navbar-brand" href="#" style="color: #ffffff;">
            <img src="{{ asset('assets/img/logounsika.png') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Sistem Informasi Akademik UNSIKA
          </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" style="color: #ffffff;" href="/">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #ffffff;" href="/dosen">Dosen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #ffffff;" href="/mahasiswa">Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: #ffffff;" href="/matakuliah">Mata Kuliah</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('header')