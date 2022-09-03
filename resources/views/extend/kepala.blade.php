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
    {{-- editdatastockform --}}
    @method('')
        @yield('editdatastockform')
    @method('')
    {{-- data pembeli --}}
    @method('before')
    @yield('datapembeli')
    @method('after')

    @method('before')
    @yield('datapembeliform')
    @method('after')

    @method('before')
    @yield('datapembeliupdate')
    @method('after')

    {{-- data karyawan --}}
    @method('before')
    @yield('datakaryawan')
    @method('after')

    @method('before')
    @yield('datakaryawanform')
    @method('after')

    @method('before')
    @yield('editkaryawanform')
    @method('after')

    {{-- SUPPLIERS--}}
    @method('before')
    @yield('supplierform')
    @method('after')

    @method('before')
    @yield('supplierformedit')
    @method('after')

    @method('before')
    @yield('404')
    @method('after')

    @include('css.js')
</body>

</html>
