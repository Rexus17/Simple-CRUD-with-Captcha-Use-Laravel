<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAMBAH SISWA</title>
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
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Data Siswa</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('captchaservice.store') }}">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="number" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-select mt-2" name="jenis_kelamin" aria-label="Default select example">
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
                <input type="email" class="form-control" name="email">
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
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
    <br><br>
    <center>
        <h2 class="text-center">Data Siswa</h2>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Phone</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @forelse ($coba as $captchaservice)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $captchaservice->nama }}</td>
                <td>{{ $captchaservice->phone }}</td>
                <td>{{ $captchaservice->alamat }}</td>
                <td>{{ $captchaservice->jenis_kelamin }}</td>
                <td>{{ $captchaservice->email }}</td>
                <td>
                    <a href="{{ route('captchaservice.edit',$captchaservice->id) }}">Edit</a>
                    <a href="{{ route('captchaservice.show',$captchaservice->id) }}">Show</a>
                    <form method="POST" action="{{ route('captchaservice.destroy',$captchaservice->id) }}" class="mt-2">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <p>No Student found!</p>
            @endforelse
        </table>
    </center>
    <br><br> 
</body>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
</html>