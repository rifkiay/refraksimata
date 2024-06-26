<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Penyakit;
use App\Models\Relasi;
use App\Models\TMP;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;



class DiagnosisController extends Controller
{
    public function showForm()
    {
        $gejalas = DB::table('tb_gejala')->get();
        return view('form_diagnosis', compact('gejalas'));
    }

    public function submitDiagnosis(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:1,2',
            'umur' => 'required|integer|min:0',
            'gejala_dipilih' => 'required|array',
            'gejala_dipilih.*' => 'exists:tb_gejala,kode_gejala',
            'md.*' => '',
            'gambar' => 'nullable|image|max:2048',
        ]);

        // Simpan data ke dalam tabel tb_pasien
        $pasien = new Pasien();
        $pasien->nama = $validatedData['nama'];
        $pasien->jenis_kelamin = $validatedData['jenis_kelamin'];
        $pasien->umur = $validatedData['umur'];

        // Memisahkan gejala yang dipilih dengan koma
        $pasien->gejala_dipilih = implode(',', $validatedData['gejala_dipilih']);

        // Memisahkan nilai md dengan koma jika md tidak null
        if ($validatedData['md'] !== null) {
            $pasien->md = implode(',', $validatedData['md']);
        }

        // Membersihkan nilai-nilai md dari nilai kosong
        $mdValues = array_filter($validatedData['md'], function ($value) {
            return trim($value) !== ''; // Memastikan nilai tidak kosong setelah dipangkas
        });

        // Memisahkan nilai md dengan koma jika md tersedia dan bukan null
        if (!empty($mdValues)) {
            $pasien->md = implode(',', $mdValues);
        }


        $pasien->tgl_diagnosa = now();
        $pasien->save();

        // nama di databasenya dengan rute penyimpanan jika pusing
        if ($request->file('gambar')) {
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            // Read and resize the image
            $image = $manager->read($request->file('gambar')->getRealPath())->resize(320, 240);

            // Get original file name
            $originalName = $request->file('gambar')->getClientOriginalName();

            // Directory for storage (inside storage/app/public)
            $namaPasien = $validatedData['nama'];
            // Direktori penyimpanan di storage
            $storagePath = 'app/public/images/' . $namaPasien;

            // Ensure the directory exists, create it if not
            if (!file_exists(storage_path($storagePath))) {
                mkdir(storage_path($storagePath), 0755, true);
            }

            // Save the resized image to storage
            $image->save(storage_path($storagePath . '/' . $originalName));

            // Relative storage path
            $path = 'storage/images/' . $namaPasien . '/' . $originalName;

            // Save path to database
            $pasien->gambar = $path;
            $pasien->save();
        }


        // Ambil data gejala_dipilih dan md
        $gejalaDipilih = explode(',', $pasien->gejala_dipilih);
        $mdValues = explode(',', $pasien->md);

        // Simpan data ke tb_tmp satu per satu
        for ($i = 0; $i < count($gejalaDipilih); $i++) {
            $tmp = new Tmp();
            $relasiData = Relasi::where('kode_gejala', $gejalaDipilih[$i])->get();

            foreach ($relasiData as $relasi) {
                $mbValue = $relasi->mb;
                $kodePenyakit = $relasi->kode_penyakit;

                $tmp = new Tmp();
                $tmp->kode_gejala = $gejalaDipilih[$i];
                $tmp->md = floatval($mdValues[$i]);
                $tmp->mb = $mbValue;
                $tmp->kode_penyakit = $kodePenyakit;
                $tmp->save();
            }
        }

        return redirect()->route('diagnosis.calculate', ['id' => $pasien->kode_pasien]);
    }

    public function calculateCF($id)
    {
        $pasien = Pasien::findOrFail($id);
        $gejalaDipilih = explode(',', $pasien->gejala_dipilih);
        $nama_gejala = [];
        foreach ($gejalaDipilih as $kode_gejala) {
            $gejala = DB::table('tb_gejala')->where('kode_gejala', $kode_gejala)->first();
            if ($gejala) {
                $nama_gejala[] = $gejala->nama_gejala;
            }
        }
        $penyakitData = Penyakit::all();

        // Mulai perhitungan CF
        $gejalaData = Tmp::all();

        // Inisialisasi array untuk menyimpan CF per penyakit
        $CF_per_penyakit = [];

        // Hitung Certainty Factor untuk setiap gejala dan kelompokkan berdasarkan penyakit
        foreach ($gejalaData as $gejala) {

            $kodePenyakit = $gejala->kode_penyakit;
            $MB = $gejala->mb;
            $MD = $gejala->md;
            $CF = $MB * $MD;

            if (!isset($CF_per_penyakit[$kodePenyakit])) {
                $CF_per_penyakit[$kodePenyakit] = $CF;
            } else {
                $CF_per_penyakit[$kodePenyakit] = $CF_per_penyakit[$kodePenyakit] + $CF * (1 - $CF_per_penyakit[$kodePenyakit]);
            }
        }

        // Hitung persentase CF untuk setiap penyakit
        $percentageCF_per_penyakit = [];
        foreach ($CF_per_penyakit as $kodePenyakit => $value) {
            $percentageCF_per_penyakit[$kodePenyakit] = $value * 100;
        }

        // Cari penyakit dengan nilai CF terbesar
        $maxCF = max($percentageCF_per_penyakit);
        $kodePenyakitTerbesar = array_search($maxCF, $percentageCF_per_penyakit);
        $namaPenyakitTerbesar = $penyakitData->where('kode_penyakit', $kodePenyakitTerbesar)->first()->nama_penyakit;

        // Simpan semua hasil
        $semua_hasil = [];
        foreach ($percentageCF_per_penyakit as $kodePenyakit => $percentage) {
            $namaPenyakit = $penyakitData->where('kode_penyakit', $kodePenyakit)->first()->nama_penyakit;
            $semua_hasil[] = $namaPenyakit . ' ' . number_format($percentage, 2) . '%';
        }
        $semua_hasil_string = implode(', ', $semua_hasil);

        $pasien->kode_penyakit = $kodePenyakitTerbesar;
        $pasien->nama_penyakit = $namaPenyakitTerbesar;
        $pasien->persentase_hasil = number_format($maxCF, 2) . '%';
        $pasien->hasil = $namaPenyakitTerbesar;
        $pasien->semua_hasil = $semua_hasil_string;
        $pasien->save();

        // Hapus data di tb_tmp
        Tmp::truncate();

        return redirect()->route('diagnosis.result', ['id' => $id]);
    }


    public function showDiagnosisResult($id)
    {
        $pasien = Pasien::findOrFail($id);

        //mengambil nama gejala penyakit untuk di tampilkan di view
        $gejalaDipilih = explode(',', $pasien->gejala_dipilih);
        $nama_gejala = [];
        foreach ($gejalaDipilih as $kode_gejala) {
            $gejala = DB::table('tb_gejala')->where('kode_gejala', $kode_gejala)->first();
            if ($gejala) {
                $nama_gejala[] = $gejala->nama_gejala;
            }
        }

        $penyakitData = Penyakit::orderBy('kode_penyakit')->get();

        // Ambil path ke gambar dari request
        $imagePath = $pasien->gambar;
        $patient_name  = $pasien->nama;

        // Jalankan skrip Python untuk prediksi dan visualisasi HOG
        $command = ['python', 'python/main.py', $imagePath, $patient_name];
        // Jalankan skrip Python untuk prediksi dan visualisasi hu moment
        $command1 = ['python', 'python/humoment.py', $imagePath, $patient_name];

        $process = new Process($command);
        $process1 = new Process($command1);
        $process->run();
        $process1->run();

        // Tangani hasil dari proses
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        if (!$process1->isSuccessful()) {
            throw new ProcessFailedException($process1);
        }

        // Ambil output dari proses Python
        $output = $process->getOutput();
        // dd($output);
        $output1 = $process1->getOutput();
        // dd($output1);

        $predictedLabel = '';
        $predictedLabelHu = '';
        $hogImagePath = '';
        $huMomentsPath = '';

        // Parse output from $output (assuming it contains HOG image path and predicted label)
        $lines = explode("\n", trim($output));
        foreach ($lines as $line) {
            if (strpos($line, 'Predicted Label:') !== false) {
                $predictedLabel = str_replace('Predicted Label:', '', $line);
            } elseif (strpos($line, 'HOG Image Path:') !== false) {
                $hogImagePath = str_replace('HOG Image Path:', '', $line);
                $hogImagePath = trim($hogImagePath); // Trim untuk menghilangkan spasi
            }
        }

        // Handle output from $output1 (assuming it contains Hu moments path and predicted label)
        $lines1 = explode("\n", trim($output1));
        foreach ($lines1 as $line) {
            if (strpos($line, 'Predicted Label:') !== false) {
                $predictedLabelHu = str_replace('Predicted Label:', '', $line);
            } elseif (strpos($line, 'Hu Moments Path:') !== false) {
                $huMomentsPath = str_replace('Hu Moments Path:', '', $line);
                $huMomentsPath = trim($huMomentsPath); // Trim untuk menghilangkan spasi
            }
        }

        // Pass data to the view
        return view('result', compact('pasien', 'penyakitData', 'nama_gejala', 'predictedLabel', 'hogImagePath', 'predictedLabelHu', 'huMomentsPath'));
    }
}
