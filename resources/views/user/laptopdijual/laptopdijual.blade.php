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
    {{-- <script src="https://kit.fontawesome.com/3bea811d2b.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://kit.fontawesome.com/cef75cd7cc.js" crossorigin="anonymous"></script> --}}
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
                    <li class="nav-item active">
                        <a class="nav-link" href="/laptopdijualuser"><i class="fa-solid fa-laptop mx-3  "></i>List
                            Laptop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/keranjang"><i class="fa-solid fa-basket-shopping mx-3"></i>Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pengiriman"><i class="fa-solid fa-truck mx-3"></i>Pengiriman</a>
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
                            <a class="nav-link" href="#" id="sidebar-window-button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item nav-item-right d-flex">
                            <a class="nav-link mx-2 my-1" href="/logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('assets/image/128x128.png') }}" id="avatar-image"
                                    class="mx-2"><span id="avatar-text" class="text-secondary">Hi, Wahyu A</span>
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
                <h3>List Laptop</h3>
                {{-- <p class="text-muted">Documentation and examples for opt-in styling of tables (given their prevalent use in JavaScript plugins) with Bootstrap.</p> --}}
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                        {{-- <h5 class="mb-3">Header Color Variants</h5> --}}
                        <table class="table" id="table_id">
                            <thead class="color-primary-spatu">
                                <tr>
                                    <th scope="row">No</th>
                                    <th scope="row">merk</th>{{-- file --}}
                                    <th scope="row">Ram</th>
                                    <th scope="row">Vga</th>{{-- text --}}
                                    <th scope="row">processor</th>{{-- text --}}
                                    <th scope="row">Harga</th>{{-- text --}}
                                    <th scope="row">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $dijual)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$dijual->stockem->merk}}</td>
                                    <td>{{$dijual->ram}}</td>
                                    <td>{{$dijual->vga}}</td>
                                    <td>{{$dijual->processor}}</td>
                                    <td>{{"Rp." . number_format($dijual->harga,0,',','.')}}</td>
                                    {{-- <td>{{$pembeli->created_at}}</td> --}}
                                    <td>
                                        <a href="/keranjangpost/{{$dijual->id}}"><button type="button" class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i></button></a>
                                        <a href="/datapembeliform"><button type="button" class="btn btn-success"><i class="fa-solid fa-check-to-slot"></i></i></button></a>
                                        {{-- <a href="#" class="btn btn-danger delete" data-id="{{$dijual->id}}"
                                data-nama="{{$dijual->stock->merk}}"><i class="fa-solid fa-trash-can"></i></a> --}}
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
                    text: "data laptop dengan merk " + danam + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/destroydijual/" + dapid + ""
                        Swal.fire(
                            'Terhapus!',
                            'Data dengan merk ' + danam + ' terhapus',
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
    @if (Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif
    </script>
</body>

</html>
