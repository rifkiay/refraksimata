<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Diagnosa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assuming you have a CSS file -->
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #f8b7c0;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            color: white;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"], .form-group input[type="number"], .form-group input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group input[type="radio"] {
            margin-right: 10px;
        }
        .form-group .checkbox-group {
            display: flex;
            flex-direction: column;
        }
        .form-group .checkbox-group label {
            margin-bottom: 5px;
        }
        .certainty-levels {
            display: flex;
            flex-direction: column;
            margin-left: 20px;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Form Diagnosa</h1>
        </div>
        <form action="{{ route('diagnosis.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="radio" id="male" name="jenis_kelamin" value="1" required>
                <label for="male">Laki-laki</label>
                <input type="radio" id="female" name="jenis_kelamin" value="2" required>
                <label for="female">Perempuan</label>
            </div>
            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" id="umur" name="umur" required>
            </div>
            <div class="form-group">
                <label>Tanda/Gejala yang dirasakan</label>
                <div class="checkbox-group">
                    @foreach($gejalas as $gejala)
                        <label>
                            <input type="checkbox" name="gejala_dipilih[]" value="{{ $gejala->kode_gejala }}"> {{ $gejala->nama_gejala }}
                        </label>
                        <select name="md[{{$gejala->kode_gejala}}]">
                            <option value="">Pilih...</option> <!-- Default value kosong -->
                            <option value="0">Tidak</option>
                            <option value="0.2">Tidak Tahu</option>
                            <option value="0.4">Sedikit Yakin</option>
                            <option value="0.6">Cukup Yakin</option>
                            <option value="0.8">Yakin</option>
                            <option value="1">Sangat Yakin</option>
                        </select>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="gambar">Upload Foto</label>
                <input type="file" id="gambar" name="gambar">
            </div>
            <div class="form-group">
                <button type="submit">Cek Hasil</button>
            </div>
        </form>
    </div>

</body>
</html>
