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
                            <a class="nav-link" href="#" id="sidebar-window-button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item nav-item-right d-flex">
                            <a class="nav-link mx-2 my-1" href="/logout"><i
                                    class="fa-solid fa-right-from-bracket"></i></a>
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
                <h3>Pengiriman</h3>
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
                                    <th scope="row">Nama</th>
                                    <th scope="row">No telepon</th>
                                    <th scope="row">Alamat</th>
                                    <th scope="row">status</th>
                                    <th scope="row">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $d)
                                @if ($d->status == 'sedang dikemas')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->notelepon}}</td>
                                        <td>{{ $d->alamat}}-{{$d->detail}}</td>
                                        <td><p class="btn btn-warning">{{ $d->status}}</p></td>
                                        <td>
                                            {{-- <a href="/editcheckout"><button type="button" class="btn btn-success"><i
                                                        class="fa-solid fa-check-to-slot"></i></i></button></a> --}}
                                            <a href="#" class="btn btn-danger delete"
                                                data-id="{{ $d->id_checkout}}"
                                                data-nama="{{ $d->nama }}"><i
                                                    class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                @elseif ($d->status == 'sedang dikirim')
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->notelepon}}</td>
                                    <td>{{ $d->alamat}}-{{$d->detail}}</td>
                                    <td><p class="btn btn-success">{{ $d->status}}</p></td>
                                    <td>
                                        <a href="/diterima/{{$d->id_checkout}}"><button type="button" class="btn btn-success"><i class="fa-regular fa-square-check"></i></button></a>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->notelepon}}</td>
                                    <td>{{ $d->alamat}}-{{$d->detail}}</td>
                                    <td><p class="btn btn-info">{{ $d->status}}</p></td>
                                    <td>
                                        <a href="#" class="btn btn-danger delete"
                                            data-id="{{ $d->id_checkout}}"
                                            data-nama="{{ $d->nama }}"><i
                                                class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endif
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
                    text: "ingin membatalkan pesanan " + danam + "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/destroycheckout/" + dapid + ""
                        Swal.fire(
                            'berhasil dibatalkan',
                            'Pengiriman dengan' + danam + 'terbatalkan',
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
