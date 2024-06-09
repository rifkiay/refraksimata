{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex align-items-center">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">EyeQ</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-list"></i>
                        <span>History</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-share"></i>
                        <span>Share</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-compass"></i>
                        <span>Our Service</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Form Test</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Retina Test</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <main class="content">
                <div class="container-fluid main-container">
                    <section class="hero">
                        <div class="hero-container d-flex flex-column flex-md-row-reverse ">
                            <img src="{{ asset('images/hero.svg') }}" alt="Hero image" class="hero-image img-fluid">
                            <div class="hero-content text-center text-md-start">
                                <h1>Welcome To EyeQ</h1>
                                <p>Web app revolusioner yang menggunakan kecerdasan buatan untuk membantu Anda melakukan
                                    tes refraksi mata secara mandiri di rumah.</p>
                                <a class="btn btn-primary" href="#">Test Now</a>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
            <main class="content">
                <div class="container-fluid main-container">
                    <section class="explore-blogs">
                        <div class="container">
                            <h2>Explore Our Blogs</h2>
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="card blog-card">
                                        <img src="https://images.unsplash.com/photo-1717501219008-5f436ead74d5?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            class="card-img-top" alt="Blog image 1">
                                        <div class="card-body">
                                            <h5 class="card-title">Consequat</h5>
                                            <p class="card-text">Minim dolor in amet nulla laboris enim dolore consequat
                                                proident fugiat culpa eiusmod.</p>
                                            <a href="#" class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card blog-card">
                                        <img src="https://images.unsplash.com/photo-1717703236091-c13a01c23448?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            class="card-img-top" alt="Blog image 2">
                                        <div class="card-body">
                                            <h5 class="card-title">Consequat</h5>
                                            <p class="card-text">Minim dolor in amet nulla laboris enim dolore consequat
                                                proident fugiat culpa eiusmod.</p>
                                            <a href="#" class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="card blog-card">
                                        <img src="https://images.unsplash.com/photo-1717620417718-7602a2ebc540?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                            class="card-img-top" alt="Blog image 3">
                                        <div class="card-body">
                                            <h5 class="card-title">Consequat</h5>
                                            <p class="card-text">Minim dolor in amet nulla laboris enim dolore consequat
                                                proident fugiat culpa eiusmod.</p>
                                            <a href="#" class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ mix('js/dashboard.js') }}"></script>
</body>

</html> --}}



@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <section class="hero">
        <div class="hero-container d-flex flex-column flex-md-row-reverse">
            <img src="{{ asset('images/hero.svg') }}" alt="Hero image" class="hero-image img-fluid">
            <div class="hero-content text-center text-md-start">
                <h1>Welcome To EyeQ</h1>
                <p>Web app revolusioner yang menggunakan kecerdasan buatan untuk membantu Anda melakukan tes refraksi mata
                    secara mandiri di rumah.</p>
                <a class="btn btn-primary d-inline-flex align-items-center "
                    href="/form_diagnosis">
                    Test Now<i class="lni lni-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="explore-blogs">
        <div class="container">
            <h2>Explore Our Blogs</h2>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1717501219008-5f436ead74d5?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="Blog image 1">
                        <div class="card-body">
                            <h5 class="card-title">Consequat</h5>
                            <p class="card-text">Minim dolor in amet nulla laboris enim dolore consequat proident fugiat
                                culpa eiusmod.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1717703236091-c13a01c23448?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="Blog image 2">
                        <div class="card-body">
                            <h5 class="card-title">Consequat</h5>
                            <p class="card-text">Minim dolor in amet nulla laboris enim dolore consequat proident fugiat
                                culpa eiusmod.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card blog-card">
                        <img src="https://images.unsplash.com/photo-1717620417718-7602a2ebc540?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="Blog image 3">
                        <div class="card-body">
                            <h5 class="card-title">Consequat</h5>
                            <p class="card-text">Minim dolor in amet nulla laboris enim dolore consequat proident fugiat
                                culpa eiusmod.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        /* hero */
        .hero {
            background-color: #fff;
            padding: 10px 0;
            /* Sesuaikan padding sesuai kebutuhan */
            border-radius: 20px;
            /* Atur sudut bulat yang diinginkan */
        }

        .hero-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1000px;
            margin: 5px auto;
        }

        .hero-content {
            text-align: left;
            padding: 20px;
            margin-left: 25px;
            color: #333;
            /* Warna teks */
        }

        .hero-content h1 {
            font-size: 2em;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .hero-image {
            width: 40%;
            border-radius: 20px;
        }

        .hero-content p {
            font-size: 1.2em;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .hero-content a {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .hero-content a:hover {
            background-color: #0069d9;
        }

        .explore-blogs {
            background-color: #fff;
            padding: 10px 20px;
            /* Sesuaikan padding sesuai kebutuhan */
            border-radius: 20px;
            margin: 5px auto;
        }

        .explore-blogs h2 {
            font-weight: 800;
            font-size: 1.5em;
            margin: 20px 10px;
        }

        .blog-card {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .blog-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .blog-card img {
            border-radius: 5px 5px 0 0;
            /* Rounded top corners */
            width: 100%;
            height: 140px;
            /* Adjust the height as needed */
            object-fit: cover;
            /* Ensure the image covers the entire space */
        }

        .blog-card .card-title {
            font-size: 1.2rem;
            /* Ukuran font lebih kecil untuk judul */
            margin-bottom: 10px;
            /* Jarak antara judul dan teks */
        }

        .blog-card .card-text {
            font-size: 0.9rem;
            /* Ukuran font lebih kecil untuk teks */
            line-height: 1.5;
            /* Jarak antara baris */
            margin-bottom: 15px;
            /* Jarak antara teks dan tombol */
        }

        .blog-card .btn-primary {
            font-size: 0.8rem;
            /* Ukuran font lebih kecil untuk tombol */
            padding: 8px 16px;
            /* Mengurangi padding tombol */
        }

        @media screen and (max-width: 768px) {
            .hero {
                border-radius: 0;
                padding: 0;
                margin: 0;
            }

            .hero-container {
                flex-direction: column;
                align-items: center;
                justify-content: center;
                max-width: 100%;
                margin: 0 auto;
            }

            .hero {
                border-radius: 0;
                padding: 0;
            }

            .hero-content {
                text-align: center;
                padding: 20px;
                margin-left: 0;
                margin: 20px auto;
            }

            .hero-content h1 {
                font-size: 1.5em;
                /* Ukuran font lebih kecil untuk layar kecil */
                margin-bottom: 10px;
                /* Mengurangi margin bottom untuk h1 */
            }

            .hero-content p {
                font-size: 1em;
                /* Ukuran font lebih kecil untuk paragraf */
                margin-bottom: 15px;
                /* Mengurangi margin bottom untuk paragraf */
            }

            .hero-image {
                width: 100%;
            }

            .hero-content a {
                padding: 8px 16px;
                /* Mengurangi padding tombol */
                font-size: 0.9em;
                /* Ukuran font lebih kecil untuk tombol */
            }

            .explore-blogs {
                border-radius: 0px;
                margin: 5px auto;
            }

        }
    </style>
@endsection
