@extends('layouts.app')

@section('title', 'Result System Pakar')

@section('content')

    <section class="result">
        <div class="result-container">
            <h1 class="m-3 ">Hasil System Pakar</h1>

            <div class="container-fluid py-5 mb-5 hero-header">
                <div class="container py-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <h4 class="mb-3 ">Hello, {{ $pasien->nama }} Kamu Didiagnosa</h4>
                            <h1 class="display-3 ">{{ $pasien->nama_penyakit }}</h1>
                            <h2 class="mb-5 ">{{ $pasien->persentase_hasil }} </h2>
                            <a href="#article" type="button" class="btn btn-primary">Lihat Detail Penyakit</a>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item rounded active carousel-item-start" height="500"
                                        width="700">
                                        <img src="{{ asset('images/eyedefect.jpg') }}"
                                            class="img-fluid w-100 h-100 bg-secondary rounded cover" alt="First slide">
                                        <a href="#" class="btn px-4 py-2 text-white rounded">Eye Defect</a>
                                    </div>
                                    <div class="carousel-item rounded carousel-item-next carousel-item-start">
                                        <img src="{{ asset('images/lasik.jpg') }}"
                                            class="img-fluid w-100 h-100 rounded cover" alt="Second slide">
                                        <a href="#" class="btn px-4 py-2 text-white rounded">lasic surgery</a>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="m-3">Hasil Diagnosis Lainnya</h3>


            <div class="container py-5">
                <div class="row g-4">
                    @foreach ($penyakitData as $penyakit)
                        @php
                            // Extracting the disease name and percentage correctly
                            preg_match(
                                '/^(.+?)\s+(\d+(\.\d+)?)%$/',
                                collect(explode(', ', $pasien->semua_hasil))->firstWhere(
                                    fn($hasil) => str_contains($hasil, $penyakit->nama_penyakit),
                                ),
                                $matches,
                            );
                            $percentage = isset($matches[2]) ? (float) $matches[2] : 0;
                        @endphp
                        @if ($penyakit->kode_penyakit && $penyakit->nama_penyakit)
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="featurs-item text-center rounded bg-light p-4 custom-card">
                                    <div class="featurs-content text-center mb-2">
                                        <h5 class="card-title text-center text-primary">{{ $penyakit->nama_penyakit }}</h5>
                                        <p class="card-text text-center text-muted mb-0">{{ $percentage }}%</p>
                                    </div>
                                    <div class="card-footer bg-transparent border-0 text-center">
                                        <a href="#" class="btn btn-outline-primary btn-sm">More Info</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            @include('components.' . $pasien->nama_penyakit)

            <div>
                <h2>Hu Moment</h2>
                <img id="originalImage" src="{{ asset($pasien->gambar) }}" style="width: 500px;">
                @if ($huMomentsPath)
                <img id="huMomentsImage" src="{{ asset($huMomentsPath) }}">
                @endif
            </div>

            <div>
            <h2>Texture Parameters</h2>
                <p>Mean: {{ $mean }}</p>
                <p>Standard Deviation: {{ $std_dev }}</p>
                <p>Smoothness: {{ $smoothness }}</p>
                <p>Uniformity: {{ $uniformity }}</p>
                <p>Entropy: {{ $entropy }}</p>
            </div>

        </div>
    </section>
@endsection

@section('css')
    <style>
        .result {
            background-color: #fff;
            padding: 10px 0;
            border-radius: 20px;
        }

        .result h1 {
            font-size: 2em;
            font-weight: 800;
            margin-bottom: 15px;
            margin-top: 30px;
        }

        .result-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            margin: 5px auto;
        }


        .hero-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ asset('images/hero.jpg') }});
            background-size: cover;
            background-position: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        }

        .hero-header h4 {
            font-size: 1.5rem;
            color: #d3d3d3;
        }

        .hero-header h1 {
            font-size: 3rem;
            color: #fff;
        }

        .hero-header h2 {
            font-size: 2.5rem;
            color: #fff;
        }

        .btn {

            padding: 10px 20px;

            border-radius: 50px;

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);

            text-transform: uppercase;

            font-weight: bold;

        }

        .carousel .btn {
            background-color: rgba(0, 0, 0, 0.6);
            border: none;
        }

        .carousel .btn:hover {
            background-color: rgba(0, 0, 0, 0.8);
            /* Darker on hover */
        }

        .carousel-item {
            width: 100%;
            height: 250px;
            position: relative;
        }

        .carousel-item a {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 25px;
            background-color: rgba(0, 0, 0, 0.6);
            /* Semi-transparent black */
            border: none;
        }

        .carousel-control-next,
        .carousel-control-prev {
            width: 48px;
            height: 48px;
            border-radius: 48px;
            border: 1px solid var(--bs-white);
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .carousel-control-next {
            margin-right: 20px;
        }

        .carousel-control-prev {
            margin-left: 20px;
        }

        .custom-card {
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .custom-card:hover {
            transform: translateY(-10px);
        }

        .btn-outline-primary {
            border-radius: 50px;
            padding: 5px 10px;
        }

    </style>
@endsection
