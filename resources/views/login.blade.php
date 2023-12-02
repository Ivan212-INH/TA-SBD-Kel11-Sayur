<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TUgas Akhir - Kelompok 11</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>

                    @if($message = Session::get('fail'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ $message }}
                    </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('auth') }}">
                            @csrf

                            <!-- Hapus radio button dan labelnya -->

                            <input type="hidden" name="role" value="admin"> <!-- Langsung tentukan role sebagai admin -->

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-secondary">
                                    Login as Admin <!-- Ubah teks tombol jika diperlukan -->
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>