<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wisdom Library | Contact Us</title>
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

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
            <h3 class="sidebar-title section-title mb-4 mt-3">Contact Us</h3>
            <p>We would love to hear from you! Whether you have questions, feedback, or suggestions, we are here to assist you. Feel free to reach out to us for any inquiries related to scriptures, study resources, or website support.</p>
            <hr>
            <form action="{{ route('contact-us') }}" method="POST">
                <p id="successmsg" style="color: green;"></p>
                @csrf
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="number" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" id="number" name="number" placeholder="Enter your number">
                        <p class="text-danger">{{ $errors->first('number') }}</p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                        <p class="text-danger">{{ $errors->first('subject') }}</p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Type your message"></textarea>
                        <p class="text-danger">{{ $errors->first('message') }}</p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary text-white">Send Message</button>
                    </div>
                </div>
            </form>
            <hr>
        </section>
    </div>

    <div class="instagram-wrapper">
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

    @if (\Session::has('success'))
    <script>
        $(function() {
            $("#successmsg").html(`{!! \Session::get('success') !!}`);
        });
    </script>
    @endif
</body>

</html>