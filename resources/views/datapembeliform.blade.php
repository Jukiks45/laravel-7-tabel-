@extends('extend.kepala')
@section('datapembeliform')
    <!-- Sidebar (start) -->
    <div class="sidebar-wrapper float-left bg-white sidebar-open" id="sidebar-window">
        <div class="sidebar-header">
            <div class="sidebar-header_title text-center my-3 fs-3 text-secondary">
                <span>Laptop store</span>
                <button class="close-sidebar-button" id="sidebar-window-close"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="sidebar-menu my-4">
            <div class="nav-list my-3">
                <p class="nav-title text-secondary mx-3 my-1">Menu</p>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/dashboard"><i
                                class="fas fa-home mx-3"></i>Dashboard</a>
                    </li>
                    @if (Auth::user()->level == 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/stocklaptop"><i class="fas fa-grip-horizontal mx-3"></i>Stock
                            Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laptopdijual"><i class="fas fa-grip-horizontal mx-3"></i>
                        Laptop Dijual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/datapembeli"><i class="fas fa-grip-horizontal mx-3"></i>Data
                            pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/datakaryawan"><i class="fas fa-grip-horizontal mx-3"></i>Data
                            karyawan</a>
                    </li>
                    @endif
                    @if (Auth::user()->level == 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="/laptopdijualuser"><i class="fas fa-grip-horizontal mx-3"></i>List Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/datapembeli"><i class="fas fa-grip-horizontal mx-3"></i>Pesanan anda</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

    </div>
    </div>
    <!-- Sidebar (end) -->
    <div class="main bg-light float-right" id="main-content">
        <!-- Topbar (start) -->
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav d-flex justify-content-between container-fluid">
                        <li class="nav-item my-1">
                            <a class="nav-link" href="#" id="sidebar-window-button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item nav-item-right d-flex">
                            <a class="nav-link mx-2 my-1" href="#"><i class="far fa-bell"></i></a>
                            <a class="nav-link mx-2 my-1" href="#"><i class="far fa-envelope"></i></a>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/image/128x128.png') }}" id="avatar-image" class="mx-2"><span
                                    id="avatar-text" class="text-secondary">Hi, Wahyu A</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Content (start) -->
        <div class="main-content container-fluid">
            <div class="page-title mx-2 my-3">
                <h3>Pembeli pesan</h3>
            </div>
            <form action="/datapembelipost" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                            <div class="my-2">
                                <div class="input-group">
                                    <h5 class="form-label my-1 @error('nama') is-invalid @enderror">Nama</h5>
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Nama lengkap" name="nama">
                                        <div class="invalid-feedback">
                                            Tolong isi Nama anda
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <h5 class="form-label">Alamat</h5>
                                    <div class="mb-3 input-group">
                                        <select class="form-select @error('kota') is-invalid @enderror"
                                            id="inputGroupSelect04" aria-label="Example select with button addon"
                                            name="kota">
                                            <option></option>
                                            <option value="amegakure">Amegakure</option>
                                            <option value="Sunagakure">Sunagakure</option>
                                            <option value="Skypia">skypie</option>
                                            <option value="Wano">Wano</option>
                                            <option value="Wakanda">Wakanda</option>
                                            <option value="Iwagakure">Iwagakure</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Masukkan alamat dengan lengkap
                                        </div>
                                    </div>
                                    {{-- <div class="mb-3 input-group">
                                        <select class="form-select @error('alamat') is-invalid @enderror"
                                            id="inputGroupSelect04" aria-label="Example select with button addon"
                                            name="id_alamat">
                                            @foreach ($dataalamat as $alamat )
                                            <option value="{{$alamat->id}}">{{$alamat->alamat}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Masukkan alamat dengan lengkap
                                        </div>
                                    </div> --}}
                                    <div class="input-group">
                                        <label class="@error('bangunan') is-invalid @enderror">tandai sebagai</label>
                                        <div class="input-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('bangunan') is-invalid @enderror"
                                                    type="radio" name="bangunan" id="inlineRadio1" value="kantor">
                                                <label class="form-check-label" for="inlineRadio1">Kantor</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('bangunan') is-invalid @enderror"
                                                    type="radio" name="bangunan" id="inlineRadio2" value="rumah">
                                                <label class="form-check-label" for="inlineRadio2">Rumah</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback mb-3">
                                            Pilih tempat
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label class="form-label my-1 @error('notelepon') is-invalid @enderror">NO telepon</label>
                                        <div class="mb-3 input-group">
                                            <input type="number" class="form-control @error('notelepon') is-invalid
                                            @enderror" placeholder="Masukkan no telepon"
                                                name="notelepon">
                                            <div class="invalid-feedback">
                                                Tolong isi Nomor telepon
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn color-primary-spatu w-100" type="submit"><i
                                        class="fas fa-paper-plane me-2"></i>Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endsection
