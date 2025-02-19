@extends('ulayouts.main')

@section('title', 'Home')

@section('head')
<meta name="description" content="Scriptures with audio. We aim to help individuals connect with spiritual wisdom through organized scriptures, study tools, and insightful resources. Whether you're seeking daily inspiration, in-depth study, or a place to reflect, we are here to guide your journey with faith and understanding.">
<meta name="keywords" content="gita, mahabharat, scriptures, hindi, gujarati, bhagavat">
@endsection

@section('slider')
<!-- page-header -->
<header class="page-header"></header>
<!-- end of page header -->
@endsection

@section('content')
<section>
    <div class="feature-posts">
        <a href="single-post.html" class="feature-post-item">
            <span>All Scriptures</span>
        </a>
        @foreach ($scriptures as $row)
        <a href="{{ route('u-divisions', [$row['id'], $row['meta-slug'] ?? 'scripture']) }}" class="feature-post-item">
            <img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset($row['image']) }}" class="w-100" alt="">
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
                <h5 class="card-title">{{ $headshlok['title'] }}</h5>
                <h4 class="card-title">{!! $headshlok['shlok'] !!}</h4>
                <small class="small text-muted">{!! $headshlok['short_description'] !!}</small>
            </div>
            <div class="card-body">
                <div class="blog-media">
                    <img src="{{ empty($headshlok['image']) ? asset('uploads/noimg.jpg') : asset($headshlok['image']) }}" alt="" class="w-100">
                </div>
                <p class="my-3">{!! $headshlok['description'] !!}</p>
            </div>

            <div class="card-footer d-flex justify-content-between align-items-center flex-basis-0">
                <a href="{{ route('u-shlok', [$headshlok['id'], $headshlok['meta_slug'] ?? 'shlok']) }}" class="btn btn-outline-dark btn-sm">READ MORE</a>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($displayshloks as $row)
            <div class="col-lg-6">
                <div class="card text-center mb-5">
                    <div class="card-header p-0">
                        <div class="blog-media">
                            <img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset($row['image']) }}" alt="" class="w-100">
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <h5 class="card-title">{{ $row['title'] }}</h5>
                        <h4 class="card-title">{!! $row['shlok'] !!}</h4>
                        <small class="small text-muted">{!! $headshlok['short_description'] !!}</small>
                        <p class="my-2">{!! $row['description'] !!}</p>
                    </div>

                    <div class="card-footer p-0 text-center">
                        <a href="{{ route('u-shlok', [$row['id'], $row['meta_slug'] ?? 'shlok']) }}" class="btn btn-outline-dark btn-sm">READ MORE</a>
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

        <!-- <div class="ad-card d-flex text-center align-items-center justify-content-center">
            <span href="#" class="font-weight-bold">ADS</span>
        </div> -->
    </div>
</div>
@endsection

@section('socialmedia')
@include('ulayouts.socialmedia')
@endsection

@section('script')

@endsection