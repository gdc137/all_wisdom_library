<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wisdom Library | @yield('title', 'Home')</title>

    @yield('head')
    @include('ulayouts.head')

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- BEGIN: Header-->
    @include('ulayouts.header')
    <!-- END: Header-->

    @yield('slider')

    <div class="container">
        @yield('content')
    </div>

    @yield('socialmedia')

    <!-- BEGIN: Footer-->
    @include('ulayouts.footer')
    <!-- END: Footer-->

    @include('ulayouts.script')
    @yield('script')

</body>

</html>