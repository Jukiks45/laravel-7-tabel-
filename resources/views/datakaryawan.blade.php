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
                            <a class="nav-link mx-2 my-1" href="/logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/image/128x128.png') }}" id="avatar-image" class="mx-2"><span
                                    id="avatar-text" class="text-secondary"></span>
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
                <h3>Data Karyawan</h3>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                        <a class="btn mx-1 my-1 outline-primary-spatu" href="/datakaryawanform" style="width: 10%">Tambah
                            +</a>
                        <table class="table" id="table_id">
                            <thead class="color-primary-spatu">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">jenis kelamin</th>
                                    <th scope="col">tanggal lahir</th>
                                    <th scope="col" rowspan="1">Alamat</th>
                                    <th scope="col">No telepon</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $karyawan)
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td><img src="{{ asset('fotokaryawan/' . $karyawan->foto) }}" alt=""
                                            width="100px">
                                    </td>
                                    <td>{{$karyawan->nama}}</td>
                                    <td>{{$karyawan->jenis_kelamin}}</td>
                                    <td>{{$karyawan->tgl_lahir}}</td>
                                    <td>{{$karyawan->kota}}-{{$karyawan->jalan}}</td>
                                    <td>{{$karyawan->notelepon}}</td>
                                    <td>
                                        <a href="/editkaryawanform/{{$karyawan->id}}"><button type="button"
                                                class="btn btn-success"><i
                                                    class="fa-solid fa-pen-to-square"></i></button></a>
                                        <a href="#" class="btn btn-danger delete" data-id="{{$karyawan->id}}"
                                            data-nama="{{$karyawan->nama}}"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Content (end) -->
        </div>
        @include('css.js')
        <script>
            $('.delete').click(function() {
                var dapid = $(this).attr('data-id');
                var danam = $(this).attr('data-nama');
                Swal.fire({
                    title: 'Apakah Kamu yakin?',
                    text: "data laptop dengan nama " + danam + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/deletekaryawan/" + dapid + ""
                        Swal.fire(
                            'Terhapus!',
                            'Data dengan nama ' + danam + ' terhapus',
                            'success'
                        )
                    }
                })
            });
        </script>
    <script>
        @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif
    </script>
</body>
</html>
