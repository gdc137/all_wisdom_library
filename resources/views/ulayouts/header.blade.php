<!-- page First Navigation -->
<nav class="navbar navbar-light bg-light p-1">
    <div class="container d-flex justify-content-center align-items-center h-100">
        <a class="navbar-brand p-0 m-0" href="javascript::void(0)">
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
            </ul>
            <div class="navbar-nav ml-auto">
                <li class="nav-item today">
                    <a href="{{ route('today') }}" class=" btn mt-1 btn-sm text-white">Today's Shlok</a>
                </li>
            </div>
        </div>
    </div>
</nav>
<!-- End Of Page Second Navigation -->
