<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Free Bootstrap Admin Template">
    <meta name="keywords" content="html, css, js, bootstrap, admin, template, dashboard">
    <meta name="author" content="Wahyu Amirulloh">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Stock Laptop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Local CSS -->
    @include('css.headcss')
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3bea811d2b.js" crossorigin="anonymous"></script>
</head>

<body>
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
                        <a class="nav-link active" href="/stocklaptop"><i class="fa-solid fa-cubes mx-3"></i>Stock
                            Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laptopdijual"><i class="fa-brands fa-sellcast mx-3"></i>Laptop
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
    <!-- Sidebar (end) -->
    <div class="main bg-light float-right" id="main-content">
        <!-- Topbar (start) -->
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav d-flex justify-content-between container-fluid">
                        <li class="nav-item my-1">
                            <a class="nav-link" href="#" id="sidebar-window-button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item nav-item-right d-flex">
                            <a class="nav-link mx-2 my-1" href="/logout"><i class="far fa-bell"></i></a>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/image/128x128.png') }}" id="avatar-image"
                                    class="mx-2"><span id="avatar-text"
                                    class="text-secondary">{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Topbar (end) -->
        <!-- Content (start) -->
        <div class="main-content container-fluid">
            <div class="page-title mx-2 my-3">
                <h3>Tambah Stock</h3>
                {{-- <p class="text-muted">Example form usage for Job Apllication Form</p> --}}
            </div>
            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                            <div class="my-2">
                                <div class="input-group">
                                    <h5 for="merk" class="form-label @error('merk') is-invalid @enderror">Merk</h5>
                                    @error('merk')
                                        <div class="invalid-feedback">
                                            Tolong isi merk Laptop
                                        </div>
                                    @enderror
                                </div>
                                    <div class="mb-3 input group">
                                    {{-- <input type="text" name="merk"
                                        class="form-control input @error('merk') is-invalid @enderror"
                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                        value="{{ old('merk') }}"> --}}
                                            <input type="text" class="form-control @error('merk') is-invalid @enderror" placeholder="Masukkan merk" name="merk" value="{{ old('merk') }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    {{-- checkbox proseccor --}}
                                    <h5 class="@error('processor') is-invalid @enderror">Proseccor</h5>
                                    @error('processor')
                                        <div class="invalid-feedback">
                                            Tolong pilih processor Laptop
                                        </div>
                                    @enderror
                                    <div class="form-check form-switch">
                                        <input class="form-check-input input @error('processor') is-invalid @enderror"
                                            type="radio" role="switch" id="flexSwitchCheckDefault" value="intel"
                                            name="processor" @if (old('processor') == 'intel') checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Intel</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input input @error('processor') is-invalid @enderror"
                                            type="radio" role="switch" id="flexSwitchCheckDefault"
                                            value="AMD" name="processor"
                                            @if (old('processor') == 'AMD') checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">AMD</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input input @error('processor') is-invalid @enderror"
                                            type="radio" role="switch" id="flexSwitchCheckDefault"
                                            value="IBM" name="processor"
                                            @if (old('processor') == 'IBM') checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">IBM</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input input @error('processor') is-invalid @enderror"
                                            type="radio" role="switch" id="flexSwitchCheckDefault"
                                            value="IDT" name="processor"
                                            @if (old('processor') == 'IDT') checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">IDT</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input input @error('processor') is-invalid @enderror"
                                            type="radio" role="switch" id="flexSwitchCheckDefault"
                                            value="Apple" name="processor"
                                            @if (old('processor') == 'Apple') checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Apple</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5 class="@error('ram') is-invalid @enderror">Ram Laptop</h5>
                                    @error('ram')
                                        <div class="invalid-feedback">
                                            Ram belum dipilih
                                        </div>
                                    @enderror
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input input @error('ram') is-invalid @enderror"
                                            type="radio" name="ram" id="inlineRadio1" value="4GB"
                                            @if (old('ram') == '4GB') checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">4GB</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input input @error('ram') is-invalid @enderror"
                                            type="radio" name="ram" id="inlineRadio2" value="8GB"
                                            @if (old('ram') == '8GB') checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">8GB</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input input @error('ram') is-invalid @enderror"
                                            type="radio" name="ram" id="inlineRadio2" value="16GB"
                                            @if (old('ram') == '16GB') checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">16GB</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5>VGA</h5>
                                    <select class="form-select input @error('vga') is-invalid @enderror"
                                        aria-label="Default select example" name="VGA">
                                        <option></option>
                                        <option value="NVIDIA GeForce RTX 2060">NVIDIA GeForce RTX 2060</option>
                                        <option value="AMD Radeon RX 5700 Series">AMD Radeon RX 5700 Series</option>
                                        <option value="NVIDIA GeForce GTX 1660 Ti">NVIDIA GeForce GTX 1660 Ti</option>
                                        <option value="AMD Radeon RX 590">AMD Radeon RX 590</option>
                                        <option value="NVIDIA GeForce RTX 2070 Supe">NVIDIA GeForce RTX 2070 Super
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        VGA belum diisi
                                    </div>
                                </div>
                                {{--harga jual--}}
                                <h5 class="form-label my-1 @error('harga') is-invalid @enderror">Harga jual</h5>
                                    <div class="mb-3 input-group">
                                        {{-- <span class="input-group-text" id="basic-addon1">Rp.</span> --}}
                                        <input type="text" id="rupia" class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Masukkan Harga" name="harga_jual" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        <div class="invalid-feedback">
                                            Tolong isi Nama anda
                                        </div>
                                    </div>
                                <div class="mb-3">
                                    <h5 for="exampleInputEmail1" class="form-label">
                                        Tambah foto</h5>
                                    <input type="file"
                                        class="form-control input @error('foto') is-invalid @enderror" name="foto"
                                        aria-describedby="emailHelp">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            Foto belum diisi
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Content (end) -->
        </div>
        @include('css.js')
    </div>
</body>

</html>
