<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Edit data</title>
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
    <form action="{{ route('captchaservice.update',$captchaservice->id) }}" method="post" class="container mt-5">
        @csrf
        @method('patch')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $captchaservice->nama }}">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="number" class="form-control" name="phone" value="{{ $captchaservice->phone }}">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ $captchaservice->alamat }}">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-select mt-2" name="jenis_kelamin" aria-label="Default select example" value="{{ $captchaservice->jenis_kelamin }}">
                <option value="laki-laki">Laki - Laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        
            @error('jenis_kelamin')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ $captchaservice->email }}">
        </div>
        <div class="form-group mt-4 mb-4">
            <div class="captcha">
                <span>{!! captcha_img('text') !!}</span>
                <button type="button" class="btn btn-danger" class="reload" id="reload">
                    &#x21bb;
                </button>
            </div>
        </div>
        <div class="form-group mb-4">
            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
        </div>
        <button type="submit" class="btn btn-primary btn-block">update</button>
    </form>
</body>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '/reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
</html>
