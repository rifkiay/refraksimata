@extends('layouts.app')

@section('title', 'Form Diagnosa')

@section('css')
    <style>
        .form-container {
            margin: 0 auto;
            padding: 50px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        .form-container h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            color: #0c0c0c;
        }


        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            margin-bottom: 15px;
            max-width: 300px;
        }

        .form-group .form-check label {
            margin-left: 5px;
        }


        .survey-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            background-color: #E9F3FF;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .survey-container h2 {
            font-size: 1.8rem;
            margin-bottom: 30px;
            font-weight: 700;
            color: #343434;
        }



        .survey-options button {
            margin-bottom: 10px;
            width: 100%;
            background-color: #98B8DC;
            color: #ffffff;
            transition: background-color 0.3s;
        }

        .survey-options button:hover {
            background-color: rgb(126, 152, 173);
        }

        .survey-options button.selected {
            background-color: #024EA2;
        }

        .survey-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .survey-footer p {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
            cursor: pointer;
        }

        .survey-footer a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .survey-step {
            display: none;
        }

        .survey-step.active {
            display: block;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {

            .form-container {
                margin: 0 auto;
                padding: 20px;
                border-radius: 0;
                min-height: 100vh;
            }

            .form-group label {
                font-size: 0.9rem;
            }

            .form-container h1 {
                font-size: 1.5rem;
            }


            .survey-container {
                margin: 30px auto;
                padding: 15px;
            }

            .survey-options button {
                max-width: 100%;
                /* Make buttons full width on smaller screens */
            }

            .survey-container h2 {
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <section class="form-container">
        <div class="mr-20">
            <h1>Silahkan Isi Form Kuisioner</h1>
        </div>
        <div class="fluid-container d-flex justify-content-center">
            <form action="{{ route('diagnosis.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="male" name="jenis_kelamin" value="1"
                            required>
                        <label class="form-check-label" for="male">Laki-laki</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="female" name="jenis_kelamin" value="2"
                            required>
                        <label class="form-check-label" for="female">Perempuan</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" required>
                </div>
                <div class="form-group">
                    <label for="gejala">Tanda/Gejala yang dirasakan</label>
                    <div id="survey-container" class="survey-container">
                        @foreach ($gejalas as $gejala)
                            <div class="survey-step">
                                <h2>{{ $gejala->nama_gejala }}</h2>
                                <div class="survey-options">
                                    <button type="button" class="btn btn-primary" data-value="0">Tidak</button>
                                    <button type="button" class="btn btn-primary" data-value="0.2">Tidak Tahu</button>
                                    <button type="button" class="btn btn-primary" data-value="0.4">Sedikit Yakin</button>
                                    <button type="button" class="btn btn-primary" data-value="0.6">Cukup Yakin</button>
                                    <button type="button" class="btn btn-primary" data-value="0.8">Yakin</button>
                                    <button type="button" class="btn btn-primary" data-value="1">Sangat Yakin</button>
                                </div>
                                <input type="hidden" name="gejala_dipilih[]" value="{{ $gejala->kode_gejala }}">
                                <input type="hidden" name="md[{{ $gejala->kode_gejala }}]" class="selected-value">
                            </div>
                        @endforeach
                        <div class="survey-footer mt-4">
                            <p id="prev">Kembali</p>
                            <span id="question-number">1 dari {{ count($gejalas) }} Pertanyaan</span>
                            {{-- <p id="next">Selanjutnya</p> --}}
                        </div>
                    </div>

                </div>

                {{-- <div class="form-group">
                    <label for="gambar">Upload Foto</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                </div> --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cek Hasil</button>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('js')
    <script>
        let currentStep = 0;
        // const nextBtn = document.getElementById('next');
        const prevBtn = document.getElementById('prev');
        const questionNumber = document.getElementById('question-number');
        const steps = document.querySelectorAll('.survey-step');
        const buttons = document.querySelectorAll('.survey-options button');
        let selectedValues = new Array(steps.length).fill(null);

        function showStep(step) {
            steps.forEach((stepDiv, index) => {
                stepDiv.classList.remove('active');
                if (index === step) {
                    stepDiv.classList.add('active');
                    // Set selected button if there's a stored value
                    if (selectedValues[index] !== null) {
                        buttons.forEach((btn, btnIndex) => {
                            if (btnIndex === selectedValues[index]) {
                                btn.classList.add('selected');

                            } else {
                                btn.classList.remove('selected');
                            }
                        });
                    } else {
                        buttons.forEach(btn => btn.classList.remove('selected'));
                    }
                }
            });

            questionNumber.textContent = `${step + 1} dari ${steps.length} Pertanyaan`;
        }

        // nextBtn.addEventListener('click', () => {
        //     const selectedButton = document.querySelector('.survey-options button.selected');
        //     if (selectedButton === null) {
        //        alert("Pilih gejala terlebih dahulu");
        //         return;
        //     }

        //     if (currentStep < steps.length - 1) {
        //         selectedValues[currentStep] = getSelectedIndex();
        //         currentStep++;
        //         showStep(currentStep);
        //     }
        // });

        prevBtn.addEventListener('click', () => {
            if (currentStep > 0) {
                selectedValues[currentStep] = getSelectedIndex();
                currentStep--;
                showStep(currentStep);
            }
        });

        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                buttons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');
                selectedValues[currentStep] = index;
            });


        });

        function getSelectedIndex() {
            const selectedButton = document.querySelector('.survey-options button.selected');
            return Array.from(buttons).indexOf(selectedButton);
        }

        steps.forEach(step => {
            const buttons = step.querySelectorAll('.survey-options button');
            const hiddenInput = step.querySelector('.selected-value');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const value = button.getAttribute('data-value');

                    // Remove 'selected' class from all buttons in the group
                    buttons.forEach(btn => btn.classList.remove('selected'));

                    // Add 'selected' class to the clicked button
                    button.classList.add('selected');

                    // Set the value to the hidden input
                    hiddenInput.value = value;

                    // next if selected
                    const selectedButton = step.querySelector('.survey-options button.selected');
                    if (selectedButton !== null) {
                        if (currentStep < steps.length - 1) {
                            selectedValues[currentStep] = getSelectedIndex();
                            currentStep++;
                            showStep(currentStep);
                        }
                    } else {
                        alert("Pilih tingkat gejala terlebih dahulu.");
                    }
                });

            });


        });

        showStep(currentStep);
    </script>


@endsection
