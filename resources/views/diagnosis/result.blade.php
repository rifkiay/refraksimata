<!DOCTYPE html>
<html>
<head>
    <title>Certainty Factor Result</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px;
        }

        header {
            background-color: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
        }

        h1, h2 {
            color: #333;
        }

        .patient-info-table {
            width: auto;
            border-collapse: collapse;
            background-color: white;
            margin-bottom: 20px;
        }

        .patient-info-table, .patient-info-table th, .patient-info-table td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .patient-info-table th {
            background-color: #007BFF;
            color: white;
        }

        .patient-info-table td {
            background-color: #f9f9f9;
        }

        .disease-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        .disease-table, .disease-table th, .disease-table td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .disease-table th {
            background-color: #007BFF;
            color: white;
        }

        .disease-table td {
            background-color: #f9f9f9;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .left-align {
            text-align: left;
        }

        .center-align {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Certainty Factor Result</h1>
    </header>
    <div class="container">
        <h2>Informasi Pasien:</h2>
        <table class="patient-info-table">
            <tr>
                <th>Nama</th>
                <td class="left-align">{{ $pasien->nama }}</td>
            </tr>
            <tr>
                <th>Kode Pasien</th>
                <td class="left-align">{{ $pasien->kode_pasien }}</td>
            </tr>
            {{-- <tr>
                <th>Gejala yang Dipilih</th>
                <td class="left-align">
                    <table style="width: 100%; border: none;">
                        <tr>
                            @foreach ($nama_gejala as $index => $gejala)
                                @if ($index % 2 == 0 && $index != 0)
                                    </tr><tr>
                                @endif
                                <td>{{ $gejala }}</td>
                            @endforeach
                        </tr>
                    </table>
                </td>
            </tr> --}}
        </table>

        <h2>Certainty Factor for Each Disease:</h2>
        <table class="disease-table">
            <tr>
                <th>Kode Penyakit</th>
                <th>Nama Penyakit</th>
                <th>Certainty Factor (CF)</th>
                <th>Percentage (%)</th>
            </tr>
            @foreach ($penyakitData as $penyakit)
                @php
                    // Extracting the disease name and percentage correctly
                    preg_match('/^(.+?)\s+(\d+(\.\d+)?)%$/', collect(explode(', ', $pasien->semua_hasil))->firstWhere(fn($hasil) => str_contains($hasil, $penyakit->nama_penyakit)), $matches);
                    $percentage = isset($matches[2]) ? (float) $matches[2] : 0;
                @endphp
                @if ($penyakit->kode_penyakit && $penyakit->nama_penyakit)
                    <tr>
                        <td class="center-align">{{ $penyakit->kode_penyakit }}</td>
                        <td class="center-align">{{ $penyakit->nama_penyakit }}</td>
                        <td class="center-align">{{ $percentage / 100 }}</td>
                        <td class="center-align">{{ $percentage }}%</td>
                    </tr>
                @endif
            @endforeach
        </table>

        <h2>HOG Visualization</h2>
        <div id="imageContainer">
            {{-- <img id="originalImage" src="{{ asset($pasien->gambar) }}" style="width: 400px;"> --}}
            @if ($hogImagePath)
                <img id="hogImage" src="{{ asset($hogImagePath) }}">
            @endif
            <h3>Prediksi HOG + SVM: {!! $predictedLabel !!}</h3>

            @if ($huMomentsPath)
            <img id="huMomentsImage" src="{{ asset($huMomentsPath) }}">
                {{-- You can adjust the image path as needed --}}
            @endif
            <h3>Prediksi Hu Moment + SVM: {!! $predictedLabelHu !!}</h3>
        </div>




        <br>
        <h2>Kesimpulan:</h2>
        <p>Berdasarkan hasil diagnosis, penyakit yang paling mungkin diderita pasien adalah: {{ $pasien->hasil }} ({{ $pasien->persentase_hasil }}).</p>

        <br>
        <a href="{{ route('diagnosis.form') }}" class="button">Kembali ke Halaman Form Diagnosis</a>
    </div>

</body>
</html>
