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
                    {{-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/dashboard"><i
                                class="fas fa-home mx-3"></i>Dashboard</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="/laptopdijualuser"><i class="fa-solid fa-laptop mx-3  "></i>List
                            Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/keranjang"><i class="fa-solid fa-basket-shopping mx-3"></i>Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pengiriman"><i class="fa-solid fa-truck mx-3"></i>Pengiriman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pesananuser"><i class="fa-solid fa-bars mx-3"></i>Histroy pesanan</a>
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
                                    id="avatar-text" class="text-secondary">{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Content (start) -->
        <div class="main-content container-fluid">
            <div class="page-title mx-2 my-3">
                <h3>Checkout</h3>
            </div>
            <form action="/checkoutpost" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                            <div class="my-2">
                                <div class="input-group">
                                    <h5 class="form-label my-1 @error('nama') is-invalid @enderror">Nama</h5>
                                    <div class="mb-3 input-group">
                                        <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                            id="formFile" placeholder="Nama anda" name="nama">
                                        <div class="invalid-feedback">
                                            Masukkan Nama anda
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <h5 class="form-label my-1">No telepon</h5>
                                    <div class="mb-3 input-group">
                                        <input class="form-control @error('notelepon') is-invalid @enderror" type="number"
                                            id="formFile" placeholder="062xxxxxx" name="notelepon">
                                        <div class="invalid-feedback">
                                            Masukkan No telepon
                                        </div>
                                    </div>
                                </div>
                                    <div class="mb-3 invalid-feedback">
                                        Pilih jenis kelamin anda
                                    </div>
                                </div>
                                <div class="input-group">
                                    <h5 class="form-label my-1 @error('kota') is-invalid @enderror">Alamat</h5>
                                    <div class="mb-3 input-group">
                                        <select class="form-select @error('kota') is-invalid @enderror"
                                            id="inputGroupSelect04" aria-label="Example select with button addon"
                                            name="alamat">
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
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control @error('jalan') is-invalid @enderror"
                                            placeholder="Nama jalan, Gedung, No rumah" name="detail">
                                        <div class="invalid-feedback">
                                            Masukkan alamat dengan lengkap
                                        </div>
                                    </div>
                                </div>
                                {{--bukti pembayaran--}}
                                <div class="input-group mb-3">
                                    <h5 for="exampleInputEmail1" class="form-label">
                                        Masukkan Bukti Pembayaran</h5>
                                    <div class="input-group">
                                    <input type="file"
                                        class="form-control input @error('foto') is-invalid @enderror" name="foto"
                                        aria-describedby="emailHelp">
                                    </div>
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            Foto belum diisi
                                        </div>
                                    @enderror
                                </div>
                                <button class="btn color-primary-spatu w-100" type="submit"><i
                                        class="fas me-2"></i>Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    @endsection
