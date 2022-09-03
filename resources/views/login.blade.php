
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Bootstrap Admin Template">
        <meta name="keywords" content="html, css, js, bootstrap, admin, template, dashboard">
        <meta name="author" content="Wahyu Amirulloh">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Dashboard - Spatu</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- Local CSS -->
        @include('css.headcss')
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/3bea811d2b.js" crossorigin="anonymous"></script>
    </head>
    <body>
            <!-- Content (start) -->
            <div class="col-11 col-sm-8 col-lg-6 mx-auto">
                <div class="card rounded border-0 shadow mx-1 my-4 p-3">
                    <div class="text-center my-5">
                        <h4>Sign in</h4>
                        {{-- <p class="text-muted">Sign In to view more content</p> --}}
                        <form action="/loginpost" method="POST">
                        @csrf
                        <div class="text-start">
                            <div class="mb-3">
                                @if (session('failed'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('failed')}}
                                </div>
                                @endif
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="example@email.com" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <button class="btn btn-primary float-none col-12 my-3" type="submit">Sign in</button>
                            <span>Belum mempunyai akun ? <a class="text-primary" href="/register">Daftar sekarang !</a></span>
                            <a class="float-end" href="/"><-kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Content (end) -->
        </div>
        @include('css.js')
    </body>
</html>
