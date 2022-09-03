@extends('extend.kepala')
@section('editkaryawanform')
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
                        <a class="nav-link active" href="/datakaryawan"><i class="fa-solid fa-people-roof mx-3"></i>Data
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
                <h3>Edit data Karyawan</h3>
            </div>
            <form action="/editkaryawanupdate/{{$data->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                            <div class="my-2">
                                <div class="input-group">
                                    <h5 class="form-label my-1">Nama</h5>
                                    <div class="mb-3 input-group">
                                        <input class="form-control" type="text" id="formFile" placeholder="Nama anda" name="nama" value="{{$data->nama}}">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <h5 class="form-label my-1">No telepon</h5>
                                    <div class="mb-3 input-group">
                                        <input class="form-control" type="number" id="formFile" placeholder="062xxxxxx" name="notelepon" value="{{$data->notelepon}}">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <h5 class="form-label">Jenis Kelamin</h5>
                                    <div class="mb-3 input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki Laki" <?php echo $data->jenis_kelamin == 'Laki Laki' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineRadio1">Laki Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Perempuan" <?php if ($data->jenis_kelamin == 'Perempuan') {
                                                echo 'checked';
                                            } ?>>
                                            <label class="form-check-label" for="inlineRadio1">Perempuan</label>
                                        </div>
                                    </div>
                                    <h5>Tanggal lahir</h5>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="tgl_lahir" value="{{$data->tgl_lahir}}">
                                    </div>
                                    <div class="input-group">
                                        <h5 class="form-label my-1">Alamat</h5>
                                        <div class="mb-3 input-group">
                                            <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="kota">
                                                <option selected>{{$data->kota}}</option>
                                                <option value="amegakure">Amegakure</option>
                                                <option value="Sunagakure">Sunagakure</option>
                                                <option value="Skypia">skypie</option>
                                                <option value="Wano">Wano</option>
                                                <option value="Wakanda">Wakanda</option>
                                                <option value="Iwagakure">Iwagakure</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 input-group">
                                            <input type="text" class="form-control" placeholder="Nama jalan, Gedung, No rumah" name="jalan" value="{{$data->jalan}}">
                                        </div>
                                        <h5>Foto</h5>
                                        <div class="mb-3 input-group">
                                            <img src="{{ asset('fotokaryawan/' . $data->foto) }}" alt=""
                                                width="100px">
                                            <input class="form-control" type="file" id="formFile" name="foto">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn color-primary-spatu w-100" type="submit"><i
                                        class="fas me-2"></i>Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endsection
