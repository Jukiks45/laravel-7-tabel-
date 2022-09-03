<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah data Laptop</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: 'klavika';
            src: url("font/klavika-bold.otf");
        }

        .hyp {
            position: absolute;
            left: 5px;
            margin-top: 11%;
        }

        body {
            background: url('img/bgk.jpg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
        }

        * {
            color: white;
        }

        .nav {
            position: relative;
            left: 5%;
            margin-top: 5%;
            float: left;
        }

        h1 {
            float: left;
            font-family: 'klavika';
            -webkit-text-fill-color: white;
            font-weight: 900;
            -webkit-text-stroke-width: 0.5px;
            -webkit-text-stroke-color: red;
        }

        .container {
            width: 70%;
            background: transparent
        }

        form {
            background: transparent
        }

        .wrapper {
            float: right;
            width: 60%;
        }

        .card {
            background: rgba(0, 0, 0, 0.5);
            margin-top: 20px;
            margin-left: 15%;
            margin-bottom: 20px;
        }

        option {
            color: black;
            background: rgba(255, 255, 255, 0.9);
        }

        .input {
            background: rgba(255, 255, 255, 0.9);
        }

        .card-body {
            box-shadow: 0 0 10px rgb(197, 4, 214, 0.7);
        }
    </style>
</head>

<body>
    <div class="nav">
        <h1>TAMBAH DATA LAPTOP</h1>
        <div class="hyp">
            <a class="btn btn-primary" href="/" role="button">
                <-kembali </a>
        </div>
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertdata" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                {{-- @if ($message = Session::get('succes'))
                                <div class="alert alert-success" role="alert">
                                    {{ $message }}
                                </div>
                                @endif --}}
                                <h5 for="merk" class="form-label @error('merk') is-invalid @enderror">Merk</h5>
                                @error('merk')
                                    <div class="invalid-feedback">
                                        Tolong isi merk Laptop
                                    </div>
                                @enderror
                                <input type="text" name="merk" class="form-control input @error('merk') is-invalid @enderror" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="{{ old('merk') }}">
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
                                    <input class="form-check-input input @error('processor') is-invalid @enderror" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" value="intel" name="processor[]"
                                        @if (is_array(old('processor')) && in_array('intel', old('processor'))) checked @endif>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Intel</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input input @error('processor') is-invalid @enderror" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" value="AMD" name="processor[]"
                                        @if (is_array(old('processor')) && in_array('AMD', old('processor'))) checked @endif>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">AMD</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input input @error('processor') is-invalid @enderror" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" value="IBM" name="processor[]"
                                        @if (is_array(old('processor')) && in_array('IBM', old('processor'))) checked @endif>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">IBM</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input input @error('processor') is-invalid @enderror" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" value="IDT" name="processor[]"
                                        @if (is_array(old('processor')) && in_array('IDT', old('processor'))) checked @endif>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">IDT</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input input @error('processor') is-invalid @enderror" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" value="Apple" name="processor[]"
                                        @if (is_array(old('processor')) && in_array('Apple', old('processor'))) checked @endif>
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
                                    <input class="form-check-input input @error('ram') is-invalid @enderror" type="radio" name="ram"
                                        id="inlineRadio1" value="4GB"
                                        @if (old('ram') == '4GB') checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">4GB</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input input @error('ram') is-invalid @enderror" type="radio" name="ram"
                                        id="inlineRadio2" value="8GB"
                                        @if (old('ram') == '8GB') checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">8GB</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input input @error('ram') is-invalid @enderror" type="radio" name="ram"
                                        id="inlineRadio2" value="16GB"
                                        @if (old('ram') == '16GB') checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">16GB</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5>VGA</h5>
                                <select
                                    class="form-select input @error('VGA') is-invalid @enderror"
                                    aria-label="Default select example" name="VGA">
                                    <option selected>PILIH VGA</option>
                                    <option value="NVIDIA GeForce RTX 2060">NVIDIA GeForce RTX 2060</option>
                                    <option value="AMD Radeon RX 5700 Series">AMD Radeon RX 5700 Series</option>
                                    <option value="NVIDIA GeForce GTX 1660 Ti">NVIDIA GeForce GTX 1660 Ti</option>
                                    <option value="AMD Radeon RX 590">AMD Radeon RX 590</option>
                                    <option value="NVIDIA GeForce RTX 2070 Supe">NVIDIA GeForce RTX 2070 Super</option>
                                </select>
                                    <div class="invalid-feedback">
                                        VGA belum diisi
                                    </div>
                            </div>
                            <div class="mb-3">
                                <h5 for="exampleInputEmail1" class="form-label">
                                    Stock</h5>
                                    <input type="number" name="stock" class="form-control input @error('stock') is-invalid @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                    value="{{ old('stock') }}">
                                    @error('stock')
                                        <div class="invalid-feedback">
                                            Stock belum diisi
                                        </div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <h5 for="exampleInputEmail1" class="form-label">
                                    Add foto</h5>
                                    <input type="file" class="form-control input @error('foto') is-invalid @enderror" name="foto"
                                    aria-describedby="emailHelp" value='/fotopegawai'>
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            Foto belum diisi
                                        </div>
                                    @enderror
                                </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
