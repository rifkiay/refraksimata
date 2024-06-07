<!DOCTYPE html>
<html>
<head>
    <title>Certainty Factor Result</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Certainty Factor Result</h1>
    <h2>Informasi Pasien:</h2>
    <ul>
        <li><strong>Nama:</strong> {{ $pasien->nama }}</li>
        <li><strong>Kode Pasien:</strong> {{ $pasien->kode_pasien }}</li>
        <li><strong>Gejala yang Dipilih:</strong>
            <ul>
                @foreach ($nama_gejala as $gejala)
                    <li>{{ $gejala }}</li>
                @endforeach
            </ul>
        </li>
    </ul>

    <h2>Certainty Factor for Each Disease:</h2>
    <table>
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
                    <td>{{ $penyakit->kode_penyakit }}</td>
                    <td>{{ $penyakit->nama_penyakit }}</td>
                    <td>{{ $percentage / 100 }}</td>
                    <td>{{ $percentage }}%</td>
                </tr>
            @endif
        @endforeach
    </table>

    <br>
    <h2>Kesimpulan:</h2>
    <p>Berdasarkan hasil diagnosis, penyakit yang paling mungkin diderita pasien adalah: {{ $pasien->hasil }} ({{ $pasien->persentase_hasil }}).</p>

    <br>
    <a href="{{ route('diagnosis.form') }}">Kembali ke Halaman Form Diagnosis</a>
</body>
</html>
