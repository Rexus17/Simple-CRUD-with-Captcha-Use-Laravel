<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Show data</title>
        <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            .container {
                max-width: 500px;
            }
            .reload {
                font-family: Lucida Sans Unicode
            }
        </style>
    </head>
    <body class="antialiased">
    <center>
        <table class="table table-striped">
            <tr>
                <th>Nama</th>
                <th>Phone</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
            </tr>
            <tr>
                <td><input type="text" value="{{ $captchaservice->nama }}" readonly></td>
                <td><input type="text" value="{{ $captchaservice->phone }}" readonly></td>
                <td><input type="text" value="{{ $captchaservice->alamat }}" readonly></td>
                <td><input type="text" value="{{ $captchaservice->jenis_kelamin }}" readonly></td>
                <td><input type="text" value="{{ $captchaservice->email }}" readonly></td>
            </tr>
        </table>
    </center>
    </body>
</html>
