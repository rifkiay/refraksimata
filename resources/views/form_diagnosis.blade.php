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
            margin-bottom: 30px;
            font-weight: 700;
            color: #343434;
        }


        .form-group label {
            display: block;
            margin-bottom: 2px;
            font-weight: bold;
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
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .survey-step.active {
            display: block;
            opacity: 1;
        }

        @keyframes buttonSelect {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .button-animate {
            animation: buttonSelect 0.3s ease-in-out;
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(2%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOut {
            0% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                opacity: 0;
                transform: translateX(-2%);
            }
        }

        .survey-step.slide-in {
            animation: slideIn 0.5s ease-in-out forwards;
        }

        .survey-step.slide-out {
            animation: slideOut 0.5s ease-in-out forwards;
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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Form Certainty Factor</h5> <small class="text-muted float-end">EyeQ</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('diagnosis.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="John Doe" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" name="nama" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Umur</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                            class="fa-solid fa-list-ol"></i></span>
                                    <input type="text" id="basic-icon-default-company" class="form-control"
                                        placeholder="AGE Example : 17" aria-label="AGE Example : 17"
                                        aria-describedby="basic-icon-default-company2" name="umur" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge flex-nowrap gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="male" name="jenis_kelamin"
                                            value="1" required>
                                        <label class="form-check-label" for="male">Laki-laki</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" id="female" name="jenis_kelamin"
                                            value="2" required>
                                        <label class="form-check-label" for="female">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gejala">Tanda/Gejala yang dirasakan</label>
                            <div id="survey-container" class="survey-container">
                                @foreach ($gejalas as $gejala)
                                    <div class="survey-step">
                                        <h2>{{ $gejala->nama_gejala }}</h2>
                                        <div class="survey-options">
                                            <button type="button" class="btn btn-primary" data-value="0">Tidak</button>
                                            <button type="button" class="btn btn-primary" data-value="0.2">Tidak
                                                Tahu</button>
                                            <button type="button" class="btn btn-primary" data-value="0.4">Sedikit
                                                Yakin</button>
                                            <button type="button" class="btn btn-primary" data-value="0.6">Cukup
                                                Yakin</button>
                                            <button type="button" class="btn btn-primary" data-value="0.8">Yakin</button>
                                            <button type="button" class="btn btn-primary" data-value="1">Sangat
                                                Yakin</button>
                                        </div>
                                        <input type="hidden" name="gejala_dipilih[]" value="{{ $gejala->kode_gejala }}"
                                            required>
                                        <input type="hidden" name="md[{{ $gejala->kode_gejala }}]" class="selected-value"
                                            required>
                                    </div>
                                @endforeach
                                <div class="survey-footer mt-4">
                                    <p id="prev">Kembali</p>
                                    <span id="question-number">1 dari {{ count($gejalas) }} Pertanyaan</span>
                                    {{-- <p id="next">Selanjutnya</p> --}}
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-end ">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                steps[currentStep].classList.add('slide-out');
                currentStep--;
                setTimeout(() => {
                    showStep(currentStep);
                }, 500); // Match the duration of your CSS animation
            }
        });

        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                const parentStep = button.closest('.survey-step');
                const stepIndex = Array.from(steps).indexOf(parentStep);

                const btns = parentStep.querySelectorAll('.survey-options button');
                btns.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');

                selectedValues[stepIndex] = Array.from(btns).indexOf(button);
                parentStep.querySelector('.selected-value').value = button.getAttribute('data-value');

                if (stepIndex < steps.length - 1) {
                    parentStep.classList.add('slide-out');
                    setTimeout(() => {
                        currentStep++;
                        showStep(currentStep);
                    }, 500); // Match the duration of your CSS animation
                }
            });
        });

        function getSelectedIndex() {
            const selectedButton = document.querySelector('.survey-options button.selected');
            return Array.from(buttons).indexOf(selectedButton);
        }

        function showStep(step) {
            steps.forEach((stepDiv, index) => {
                stepDiv.classList.remove('active', 'slide-in', 'slide-out');
                if (index === step) {
                    stepDiv.classList.add('active', 'slide-in');
                    if (selectedValues[index] !== null) {
                        const btns = stepDiv.querySelectorAll('.survey-options button');
                        btns.forEach((btn, btnIndex) => {
                            if (btnIndex === selectedValues[index]) {
                                btn.classList.add('selected');
                            } else {
                                btn.classList.remove('selected');
                            }
                        });
                    } else {
                        stepDiv.querySelectorAll('.survey-options button').forEach(btn => btn.classList.remove(
                            'selected'));
                    }
                }
            });

            questionNumber.textContent = `${step + 1} dari ${steps.length} Pertanyaan`;
        }

        showStep(currentStep);
    </script>


@endsection
