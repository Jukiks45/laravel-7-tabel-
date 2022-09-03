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
                    <li class="nav-item">
                        <a class="nav-link" href="/supplier"><i class="fa-solid fa-boxes-packing mx-3"></i>Supplier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stocklaptop"><i class="fa-solid fa-cubes mx-3"></i>Stock
                            Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/laptopdijual"><i class="fa-brands fa-sellcast mx-3"></i>Laptop
                            Dijual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pengirimanadmin"><i class="fa-solid fa-truck mx-3"></i>Pengiriman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/datapembeli"><i class="fa-solid fa-people-carry-box mx-3"></i>Data
                            pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/datakaryawan"><i class="fa-solid fa-people-roof mx-3"></i>Data
                            karyawan</a>
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
                <h3>Pembeli pesan</h3>
            </div>
            <form action="/laptopdijualpost" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                            <div class="my-2">
                                @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                                @endif
                                <div class="input-group">
                                    {{-- merk --}}
                                    <h5 class="form-label">Merk</h5>
                                    <div class="mb-3 input-group">
                                        <select class="form-select @error('alamat') is-invalid @enderror"
                                            aria-label="Example select with button addon"
                                            name="id_merk" id="merk">
                                            <option value=""></option>
                                            @foreach ($data as $stock )
                                            <option value="{{$stock->id}}" data-ram="{{$stock->ram}}" data-vga="{{$stock->VGA}}" data-processor="{{$stock->processor}}"data-harga={{$stock->harga_jual}}>{{$stock->merk}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Masukkan alamat dengan lengkap
                                        </div>
                                    </div>
                                    {{-- ram --}}
                                    <div class="input-group">
                                        <h5 class="form-label my-1">Ram</h5>
                                        <div class="mb-3 input-group">
                                            <input type="text" class="form-control"
                                                placeholder="--" name="ram" id="ram" readonly>
                                        </div>
                                    </div>
                                    {{-- VGA --}}
                                    <div class="input-group">
                                        <h5 class="form-label my-1">Vga</h5>
                                        <div class="mb-3 input-group">
                                            <input type="text" class="form-control"
                                                placeholder="--" name="vga" id="vga" readonly>
                                        </div>
                                    </div>
                                    {{-- processor --}}
                                    <div class="input-group">
                                        <h5 class="form-label my-1">processor</h5>
                                        <div class="mb-3 input-group">
                                            <input type="text" class="form-control"
                                                placeholder="--" name="processor" id="processor" readonly>
                                        </div>
                                    </div>
                                    {{-- Harga --}}
                                    <div class="input-group">
                                        <h5 class="form-label my-1">Harga</h5>
                                        <div class="mb-3 input-group">
                                            <input type="text" class="form-control"
                                                placeholder="--" name="harga" id="harga" readonly>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn color-primary-spatu w-100" type="submit"><i
                                        class="fas fa-paper-plane me-2"></i>Jual</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{-- <script>
                @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
                @endif
            </script> --}}
        @endsection
