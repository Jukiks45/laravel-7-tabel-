@extends('extend.kepala')
@section('datakaryawanform')
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
                        <a class="nav-link" aria-current="page" href="./index.html"><i
                                class="fas fa-home mx-3"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stocklaptop"><i class="fas fa-grip-horizontal mx-3"></i>Stock
                            Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/datakaryawan"><i class="fas fa-grip-horizontal mx-3"></i>Data
                            pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/datakaryawan"><i class="fas fa-grip-horizontal mx-3"></i>Data
                            Karyawan</a>
                    </li>
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
                <h3>Tambah Karyawan</h3>
            </div>
            <form action="/relasialamatpost" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                            <div class="my-2">
                                <div class="mb-3 input-group">
                                    <input type="text" class="form-control @error('jalan') is-invalid @enderror"
                                        placeholder="Nama jalan, Gedung, No rumah" name="alamat">
                                    <div class="invalid-feedback">
                                        Masukkan alamat dengan lengkap
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn color-primary-spatu w-100" type="submit"><i class="fas me-2"></i>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </form>
@endsection
