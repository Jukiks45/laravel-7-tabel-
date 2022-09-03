@extends('stocklaptop')
@section('alertpembeli')
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
@endsection
@section('alertstock')
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
@endsection
