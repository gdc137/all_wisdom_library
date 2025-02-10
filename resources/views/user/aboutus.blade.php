<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wisdom Library | About Us</title>
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
            <!-- <div class="socials mb-3 mt-2">
                <a href="javascript:void(0)"><i class="ti-facebook"></i></a>
                <a href="javascript:void(0)"><i class="ti-twitter"></i></a>
                <a href="javascript:void(0)"><i class="ti-pinterest-alt"></i></a>
                <a href="javascript:void(0)"><i class="ti-instagram"></i></a>
                <a href="javascript:void(0)"><i class="ti-youtube"></i></a>
            </div> -->
            <div class="row">
                <div class="col-md-6">
                    <h3 class="sidebar-title section-title mb-4 mt-3">અમારા વિશે</h3>
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
                    <h6><b>આ પ્લેટફોર્મ કેમ બનાવ્યું?</b></h6>
                    <p>અમે માનીએ છીએ કે શાસ્ત્રોમાં એક એવી શક્તિ છે, જે જીવનને માર્ગદર્શન, પ્રેરણા અને પરિવર્તન આપી શકે. પરંતુ, ઘણીવાર તેમને સમજવી કે શોધવી મુશ્કેલ બની શકે. અમારું હેતુ એ છે કે અમે આ ખૂટતી કડીને પૂરું કરી શકીએ, અને શાસ્ત્રોને એક સરળ અને સુગમ પદ્ધતિથી દરેક સુધી પહોંચાડી શકીએ – પછી ભલે તમે એક વિદ્વાન હો, એક આધ્યાત્મિક શોધક હો અથવા દૈનિક જીવન માટે પ્રેરણા શોધતા હો.</p>
                    <h6><b>આ સફરમાં અમારું સાથ આપો</b></h6>
                    <p>આપને આ આધ્યાત્મિક અને જ્ઞાનયાત્રામાં આમંત્રિત કરવું અમારો માન છે. તમે અહીં શાસ્ત્રોનું ગહન અધ્યયન કરવા, નવા શીખવા, અથવા દૈવી વચનોમાં શાંતિ મેળવવા માટે આવ્યા હો, અમે આશા રાખીએ છીએ કે આ પ્લેટફોર્મ તમારા માટે એક સચોટ પ્રેરણાનો સ્ત્રોત સાબિત થશે.</p>
                </div>
                <div class="col-md-6">
                    <h3 class="sidebar-title section-title mb-4 mt-3">About Us</h3>
                    <p>At our core, we are dedicated to making sacred scriptures more accessible, understandable, and meaningful for everyone. Our website serves as a digital sanctuary where individuals can explore divine wisdom, find spiritual guidance, and deepen their faith.</p>
                    <h6><b>Our Mission</b></h6>
                    <p>Our mission is to provide a well-organized and enriching platform for scriptures, helping users connect with their faith, seek answers, and gain insights into timeless teachings. We strive to create a space where people of all backgrounds can engage with sacred texts in a way that is enlightening and transformative.</p>
                    <h6><b>What We Offer</b></h6>
                    <ul>
                        <li><b>Comprehensive Scripture Library</b> – Access a vast collection of scriptures, categorized by themes, books, and chapters for easy exploration.</li>
                        <li><b>Daily Inspiration</b> – A daily verse or scripture to encourage reflection and motivation.</li>
                        <li><b>Study Tools & Commentary</b> – In-depth analysis, explanations, and cross-references to help users understand the deeper meanings of scriptures.</li>
                        <li><b>Search & Navigation</b> – A user-friendly search function that allows seamless exploration of scriptures based on topics, keywords, or phrases.</li>
                        <li><b>Community Engagement</b> – A space for discussions, reflections, and sharing insights with like-minded individuals.</li>
                    </ul>
                    <h6><b>Why We Created This Platform</b></h6>
                    <p>We believe that scriptures hold immense power to guide, inspire, and transform lives. However, accessing and understanding them can sometimes be challenging. Our goal is to bridge this gap by presenting scriptures in a structured and intuitive manner, making them accessible to everyone—whether you are a scholar, a seeker, or someone looking for daily wisdom.</p>
                    <h6><b>Join Us on This Journey</b></h6>
                    <p>We invite you to be a part of this journey of faith and wisdom. Whether you are here to explore, learn, or find comfort in divine words, we hope this platform serves as a source of inspiration and enlightenment for you.</p>
                </div>
            </div>
        </section>
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