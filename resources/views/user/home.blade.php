@extends('ulayouts.main')

@section('title', 'Home')

@section('head')
<meta name="description" content="Scriptures with audio. We aim to help individuals connect with spiritual wisdom through organized scriptures, study tools, and insightful resources. Whether you're seeking daily inspiration, in-depth study, or a place to reflect, we are here to guide your journey with faith and understanding.">
<meta name="keywords" content="gita, mahabharat, scriptures, hindi, gujarati, bhagavat">

<style>
    .wrappertext {
        height: 6em;
        /* Adjust based on your font sizes */
        overflow: hidden;
        position: relative;
    }

    .wrappertext::after {
        content: "";
        position: absolute;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 1.5em;
        /* Adjust to match the last line height */
        background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, white 100%);
    }
</style>
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
            <div class="feature-post-caption">{!! $row['title'] !!}</div>
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
                <div style="color: black !important;">{!! $headshlok['title'] !!}</div>
                <div style="color: black !important;">{!! $headshlok['shlok'] !!}</div>
                <div style="color: black !important;">{!! $headshlok['short_description'] !!}</div>
            </div>
            <div class="card-body">
                <div class="blog-media">
                    <img src="{{ empty($headshlok['image']) ? asset('uploads/noimg.jpg') : asset($headshlok['image']) }}" alt="" class="w-100">
                </div>
                <div class="my-3 wrappertext" style="color: black !important;">{!! $headshlok['description'] !!}</div>
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
                        <div style="color: black !important;">{!! $row['title'] !!}</div>
                        <div style="color: black !important;">{!! $row['shlok'] !!}</div>
                        <div style="color: black !important;">{!! $row['short_description'] !!}</div>
                        <div class="my-2 wrappertext" style="color: black !important;">{!! $row['description'] !!}</div>
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
    <div class="page-sidebar text-left">
        <!-- <h6 class="sidebar-title section-title mb-4 mt-3">About</h6> -->
        <!-- <img src="{{ asset('user-assets/imgs/avatar.jpg') }}" alt="" class="circle-100 mb-3"> -->
        <!-- <div class="socials mb-3 mt-2">
                    <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
                    <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
                    <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
                    <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
                    <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
                </div> -->
        <h3 class="sidebar-title section-title mb-4 mt-3 text-center">અમારા વિશે</h3>
        <p>અમે પવિત્ર શાસ્ત્રોને સહેલાઈથી ઉપલબ્ધ, સમજવા યોગ્ય અને અર્થસભર બનાવવાના સંકલ્પ સાથે કાર્ય કરી રહ્યા છીએ. અમારી વેબસાઈટ એ એક આદ્યાત્મિક કેન્દ્ર છે જ્યાં વ્યક્તિઓ દૈવિક જ્ઞાન શોધી શકે, આત્મિક માર્ગદર્શન મેળવી શકે અને તેમના વિશ્વાસને વધુ ઘેરો બનાવી શકે.</p>
        <h6><b>અમારું ધ્યેય</b></h6>
        <p>અમારું મુખ્ય ઉદ્દેશ્ય એક સુસંગત અને સમૃદ્ધ પ્લેટફોર્મ પ્રદાન કરવાનું છે, જ્યાં લોકો પવિત્ર શાસ્ત્રો સાથે જોડાઈ શકે, પ્રશ્નોના ઉત્તર મેળવી શકે અને પ્રાચીન જ્ઞાનમાંથી ઉપયોગી શિક્ષણ મેળવી શકે. અમે એક એવું પર્યાવરણ બનાવવા માંગીએ છીએ, જ્યાં દરેક પૃષ્ઠભૂમિના લોકો પવિત્ર ગ્રંથો સાથે જોડાઈ શકે અને તેમને સરળ અને ઉંડાણપૂર્વક સમજી શકે.</p>
        <h6><b>અમે શું પ્રદાન કરીએ છીએ?</b></h6>
        <ul>
            <li><b>વ્યાપક શાસ્ત્ર લાઈબ્રેરી</b> – વિવિધ પુસ્તકો, અધ્યાયો અને વિષયો અનુસાર શ્રેણીબદ્ધ શાસ્ત્રો સરળ શોધ માટે ઉપલબ્ધ.</li>
            <li><b>દૈનિક પ્રેરણા</b> – રોજિંદી જીવન માટે સંદેશ આપવા માટે દૈનિક એક શાસ્ત્રવાણી.</li>
            <li><b>અભ્યાસ સાધનો અને ટીકા</b> – ઊંડાણપૂર્વકની સમજ માટે ટિપ્પણીઓ, વિશ્લેષણ અને સંદર્ભો.</li>
            <li><b>સર્ચ અને નેવિગેશન</b> – વિષય, કીવર્ડ અથવા શબ્દસમૂહના આધારે ઝડપી અને સરળ શોધ સુવિધા.</li>
            <li><b>સામુહિક ચર્ચા</b> – સમાન વિચારો ધરાવતા લોકો સાથે શાસ્ત્રોની ચર્ચા, અનુભવ અને અભિપ્રાય વહેંચવાની તક.</li>
        </ul>

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