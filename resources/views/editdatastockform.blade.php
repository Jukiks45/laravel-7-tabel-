@extends('extend.kepala')
@section('editdatastockform')
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
        <!-- Topbar (end) -->
        <!-- Content (start) -->
        <div class="main-content container-fluid">
            <div class="page-title mx-2 my-3">
                <h3>Tambah Stock</h3>
                {{-- <p class="text-muted">Example form usage for Job Apllication Form</p> --}}
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                        <div class="my-2">
                            <div class="input-group">
                                <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <h5 for="exampleInputEmail1" class="form-label">Merk</h5>
                                    <div class="mb-3 input-group">
                                        <input type="text" name="merk" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" value="{{ $data->merk }}">
                                    </div>
                                    <div class="mb-3">
                                        <h5>Processor</h5>
                                        <?php $dar = explode(',', $data->processor); ?>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault" value="intel" name="processor[]"
                                                <?php if (in_array('intel', $dar)) {
                                                    echo 'checked';
                                                } ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Intel</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault" value="AMD" name="processor[]"
                                                <?php if (in_array('AMD', $dar)) {
                                                    echo 'checked';
                                                } ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">AMD</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault" value="IBM" name="processor[]"
                                                <?php if (in_array('IBM', $dar)) {
                                                    echo 'checked';
                                                } ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">IBM</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault" value="IBM" name="processor[]"
                                                <?php if (in_array('IDT', $dar)) {
                                                    echo 'checked';
                                                } ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">IDT</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault" value="Apple" name="processor[]"
                                                <?php if (in_array('Apple', $dar)) {
                                                    echo 'checked';
                                                } ?>>
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Apple</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h5>Ram</h5>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ram"
                                                id="inlineRadio1" value="4GB" <?php echo $data->ram == '4GB' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineRadio1">4GB</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ram"
                                                id="inlineRadio2" value="8GB" <?php echo $data->ram == '8GB' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineRadio2">8GB</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="ram"
                                                id="inlineRadio2" value="16GB" <?php echo $data->ram == '16GB' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="inlineRadio2">16GB</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h5 for="exampleInputEmail1" class="form-label">Pilih Vga</h5>
                                        <select class="form-select" aria-label="Default select example" name="VGA">
                                            <option selected>{{ $data->VGA }}</option>
                                            <option value="NVIDIA GeForce RTX 2060">NVIDIA GeForce RTX 2060</option>
                                            <option value="AMD Radeon RX 5700 Series">AMD Radeon RX 5700 Series</option>
                                            <option value="NVIDIA GeForce GTX 1660 Ti">NVIDIA GeForce GTX 1660 Ti</option>
                                            <option value="AMD Radeon RX 590">AMD Radeon RX 590</option>
                                            <option value="NVIDIA GeForce RTX 2070 Supe">NVIDIA GeForce RTX 2070 Super
                                            </option>
                                        </select>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <h5 for="exampleInputEmail1" class="form-label">Stock</h5>
                                        <input type="number" class="form-control" name="stock"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            value="{{ $data->stock }}" readonly>
                                    </div> --}}
                                    <div class="mb-3">
                                        <img src="{{ asset('fotopegawai/' . $data->foto) }}" alt=""
                                            width="100px" height="100px">
                                        <h6 for="exampleInputEmail1" class="form-label">Update foto</h6>
                                        <input type="file" class="form-control" name="foto"
                                            aria-describedby="emailHelp"
                                            value="img src="{{ asset('fotopegawai/' . $data->foto) }}" alt=""
                                            width="100px" height="100px">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100 bg-white">
                    <p class="text-muted p-2 text-center">© 2021 - Built with Love by <a
                            href="https://github.com/wahyuamirulloh">Wahyu Amirulloh</a></p>
                </div>
            </div>
        @endsection
