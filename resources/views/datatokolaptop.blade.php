<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Toko Laptop</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .notif{
            width: 20%
        }
    </style>
</head>

<body>
    <h1 class="text-center" mb-4>Data Toko Laptop</h1>
    <div class="container">
        <a href="/tambahlaptop"><button type="button" class="btn btn-primary">Tambah +</button></a>
        <div class="row">
            @if ($message = Session::get('succes'))
                <div class="alert alert-success notif" role="alert">
                    {{ $message }}
                </div>
            @endif
            <table class="table table-sm display" id="table_id">
                <thead>
                    <tr>
                        <th scope="row">No</th>
                        <th scope="row">Foto</th>{{-- file --}}
                        <th scope="row">Merk</th>{{-- text --}}
                        <th scope="row">Proseccor</th>{{-- checkbox --}}
                        <th scope="row">Ram</th>{{-- radiobutton --}}
                        <th scope="row">VGA</th>{{-- Dropdown --}}
                        <th scope="row">stock</th>{{-- number --}}
                        <th scope="row">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td><img src="{{ asset('fotopegawai/' . $row->foto) }}" alt="" width="100px">
                            </td>
                            <td>{{ $row->merk }}</td>
                            <td>{{ $row->processor }}</td>
                            <td>{{ $row->ram }}</td>
                            <td>{{ $row->VGA }}</td>
                            <td>{{ $row->stock }}</td>
                            <td>
                                <a href="/tampilkandata/{{ $row->id }}"><button type="button"
                                        class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                    data-merk="{{ $row->merk }}"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    <script>
        $('.delete').click(function() {
            var dapid = $(this).attr('data-id');
            var damer = $(this).attr('data-merk');
            Swal.fire({
                title: 'Apakah Kamu yakin?',
                text: "data laptop dengan merk " + damer + "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete/" + dapid + ""
                    Swal.fire(
                        'Terhapus!',
                        'Data dengan merk ' + damer + ' terhapus',
                        'success'
                    )
                }
            })
        });
    </script>
</body>

</html>
