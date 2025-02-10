<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wisdom Library | Home</title>
    <meta name="author" content="One-Enegry">
    <meta name="description" content="Scriptures with audio. We aim to help individuals connect with spiritual wisdom through organized scriptures, study tools, and insightful resources. Whether you're seeking daily inspiration, in-depth study, or a place to reflect, we are here to guide your journey with faith and understanding.">
    <meta name="keywords" content="gita, mahabharat, scriptures, hindi, gujarati, bhagavat">

    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('user-assets/vendors/themify-icons/css/themify-icons.css') }}">
    <!-- Bootstrap + HappyToHelp main styles -->
    <link rel="stylesheet" href="{{ asset('user-assets/css/HappyToHelp.css') }}">
    <style>
        .logo {
            width: 150px !important;
        }

        .nav-link {
            color: #fff !important;
        }

        .today {
            border: 1px solid white;
            background: #3F308C;
        }

        .v-center {
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .comingsoon:hover {
            opacity: 50%;
            background-color: #3F308C;
        }

        .comingsoon {
            background-color: #3F308C !important;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- page First Navigation -->
    <nav class="navbar navbar-light bg-light p-1">
        <div class="container d-flex justify-content-center align-items-center h-100">
            <a class="navbar-brand p-0 m-0" href="#">
                <img src="{{ asset('app-assets/images/logo/name.png') }}" class="logo" alt="">
            </a>

            <!-- <div class="socials">
                <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
                <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
                <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
                <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
                <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
            </div> -->
        </div>
    </nav>
    <!-- End Of First Navigation -->

    <!-- Page Second Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light bg-primary sticky-top">
        <div class="container">
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('u-scriptures') }}">Scriptures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('u-slock', ['id', 'name']) }}">Single Post</a>
                    </li>
                </ul>
                <div class="navbar-nav ml-auto">
                    <li class="nav-item today">
                        <a href="components.html" class=" btn mt-1 btn-sm text-white">Today's Slock</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Of Page Second Navigation -->

    <!-- page-header -->
    <header class="page-header"></header>
    <!-- end of page header -->

    <div class="container">
        <section>
            <div class="feature-posts">
                <a href="single-post.html" class="feature-post-item">
                    <span>All Scriptures</span>
                </a>
                @foreach ($scriptures as $row)
                <a href="{{ route('u-divisions', [$row['id'], $row['meta-slug'] ?? 'scripture']) }}" class="feature-post-item">
                    <img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset('uploads/scriptures/' . $row['image']) }}" class="w-100" alt="">
                    <div class="feature-post-caption">{{ $row['title'] }}</div>
                </a>
                @endforeach
                <a href="javascript: void(0)" class="feature-post-item">
                    <img src="{{ asset('user-assets/imgs/rigved.jpg') }}" class="w-100" alt="">
                    <div class="feature-post-caption w-100">Rigved</div>
                    <div class="feature-post-caption m-0 p-0 w-100 comingsoon" style="top: 0; height: 100%;">
                        <div class="mx-auto w-100 v-center ">Coming Soon</div>
                    </div>
                </a>
                <a href="javascript: void(0)" class="feature-post-item">
                    <img src="{{ asset('user-assets/imgs/tripitak.jpeg') }}" class="w-100" alt="">
                    <div class="feature-post-caption w-100">Tripitak</div>
                    <div class="feature-post-caption m-0 p-0 w-100 comingsoon" style="top: 0; height: 100%;">
                        <div class="mx-auto w-100 v-center">Coming Soon</div>
                    </div>
                </a>
            </div>
        </section>

        <hr>

        <div class="page-container">
            <div class="page-content">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">{{ $headslock['title'] }}</h5>
                        <h4 class="card-title">{{ $headslock['slock'] }}</h4>
                        <small class="small text-muted">{{ $headslock['short_description'] }}</small>
                    </div>
                    <div class="card-body">
                        <div class="blog-media">
                            <img src="{{ empty($headslock['image']) ? asset('uploads/noimg.jpg') : asset('uploads/divisions/' . $headslock['image']) }}" alt="" class="w-100">
                        </div>
                        <p class="my-3">{{ $headslock['description'] }}</p>
                    </div>

                    <div class="card-footer d-flex justify-content-between align-items-center flex-basis-0">
                        <a href="{{ route('u-slock', [$headslock['id'], $headslock['meta_slug'] ?? 'slock']) }}" class="btn btn-outline-dark btn-sm">READ MORE</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach ($displayslocks as $row)
                    <div class="col-lg-6">
                        <div class="card text-center mb-5">
                            <div class="card-header p-0">
                                <div class="blog-media">
                                    <img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset('uploads/divisions/' . $row['image']) }}" alt="" class="w-100">
                                </div>
                            </div>
                            <div class="card-body px-0">
                                <h5 class="card-title">{{ $row['title'] }}</h5>
                                <h4 class="card-title">{{ $row['slock'] }}</h4>
                                <small class="small text-muted">{{ $headslock['short_description'] }}</small>
                                <p class="my-2">{{ $row['description'] }}</p>
                            </div>

                            <div class="card-footer p-0 text-center">
                                <a href="{{ route('u-slock', [$row['id'], $row['meta_slug'] ?? 'slock']) }}" class="btn btn-outline-dark btn-sm">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- <button class="btn btn-primary btn-block my-4">Load More Posts</button> -->
            </div>

            <!-- Sidebar -->
            <div class="page-sidebar text-center">
                <h6 class="sidebar-title section-title mb-4 mt-3">About</h6>
                <!-- <img src="{{ asset('user-assets/imgs/avatar.jpg') }}" alt="" class="circle-100 mb-3"> -->
                <!-- <div class="socials mb-3 mt-2">
                    <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
                    <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
                    <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
                    <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
                    <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
                </div> -->
                <p><b>અમારું કાર્ય</b><br>
                    અમે શાશ્વત શાસ્ત્રોને જીવનમાં લાવવાનું અમારું ધ્યેય છે અને તેના માટે એક વ્યાપક અને સરળપણે ઉપલબ્ધ પ્લેટફોર્મ પ્રદાન કરીએ છીએ. આપણા માધ્યમથી, લોકો આયુષ્યમય શાસ્ત્રોની શોધ, અધ્યયન અને પ્રેરણામાં સહાય મેળવી શકે છે. તમે દૈનિક પ્રેરણા શોધી રહ્યા હોવ કે ઊંડો અભ્યાસ કરવા માંગતા હોવ, કે પછી આદરપૂર્વક ચિંતન માટે એક સ્થળ જોઈ રહ્યા હોવ, અમે તમને વિશ્વાસ અને સમજૂતી સાથે માર્ગદર્શન આપવા માટે અહીં છીએ.</p>

                <div class="ad-card d-flex text-center align-items-center justify-content-center">
                    <span href="#" class="font-weight-bold">ADS</span>
                </div>
            </div>
        </div>
    </div>

    <div class="instagram-wrapper mt-5">
        <div class="ig-id">
            <a href="https://whatsapp.com/channel/0029Vb1dx8eEquiTmsUzpD2d"><b>Join us</b><br><img src="{{ asset('user-assets/imgs/whatsappp.png') }}" style="width: 50px;" alt=""></a>
        </div>
        <div class="row p-0 m-0">
            <div class="col-md-2 col-6 p-0">
                <div class="insta-item">
                    <img src="{{ asset('user-assets/imgs/footer1.jpg') }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-2 p-0 d-none d-sm-block">
                <div class="insta-item">
                    <img src="{{ asset('user-assets/imgs/footer2.jpg') }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-2 p-0 d-none d-sm-block">
                <div class="insta-item">
                    <img src="{{ asset('user-assets/imgs/footer3.jpeg') }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-2 p-0 d-none d-sm-block">
                <div class="insta-item">
                    <img src="{{ asset('user-assets/imgs/footer4.jpg') }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-2 p-0 d-none d-sm-block">
                <div class="insta-item">
                    <img src="{{ asset('user-assets/imgs/footer5.jpg') }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-md-2 col-6 p-0">
                <div class="insta-item">
                    <img src="{{ asset('user-assets/imgs/footer6.jpeg') }}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>

    <!-- Page Footer -->
    <footer class="page-footer">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-3 text-center text-md-left mb-3 mb-md-0">
                    <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="" class="logo">
                </div>
                <!-- <div class="col-md-9 text-center text-md-right">
                    <div class="socials">
                        <a href="javascript:void(0)" class="font-weight-bold text-muted mr-4"><i class="ti-facebook pr-1"></i> 123,345</a>
                        <a href="javascript:void(0)" class="font-weight-bold text-muted mr-4"><i class="ti-twitter pr-1"></i> 321,534</a>
                        <a href="javascript:void(0)" class="font-weight-bold text-muted mr-4"><i class="ti-pinterest-alt pr-1"></i> 543,312</a>
                        <a href="javascript:void(0)" class="font-weight-bold text-muted mr-4"><i class="ti-instagram pr-1"></i> 123,023</a>
                        <a href="javascript:void(0)" class="font-weight-bold text-muted mr-4"><i class="ti-youtube pr-1"></i> 231,043</a>
                    </div>
                </div> -->
            </div>

            <p class="border-top mb-0 mt-4 pt-3 small">&copy; <script>
                    document.write(new Date().getFullYear())
                </script>, Wisdom Library Created By <a href="https://allwisdomlibrary.com" class="text-muted font-weight-bold" target="_blank">Wisdom Library.</a> All rights reserved
                <a href="{{ route('terms-policies') }}" style="float: right;">terms and policies</a>
            </p>
        </div>
    </footer>
    <!-- End of Page Footer -->

    <!-- core  -->
    <script src="{{ asset('user-assets/vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('user-assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>

    <!-- HappyToHelp js -->
    <script src="{{ asset('user-assets/js/HappyToHelp.js') }}"></script>

</body>

</html>