@extends('ulayouts.main')

@section('title', $shlok['meta_title'])

@section('head')
<meta name="description" content="{{ $shlok['meta_desc'] }}">
<meta name="keywords" content="{{ $shlok['meta_keywords'] }}">
<style>
    .wrappertext {
        height: 4em;
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
    <div class="page-container">
        <div class="page-content">
            <div class="card">
                <div class="card-header pt-0">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title mb-4" style="color: black !important;">{!! $shlok['shlok'] !!}</h4>
                        </div>
                        <div class="col-md-4 text-center">
                            <button class="lang btn btn-primary text-white rounded" data-name="guj">ગુજરાતી</button>
                            @if (count($shlok['hindi']) > 0)
                            <button class="lang btn btn-outline-primary rounded" data-name="hindi">हिन्दी</button>
                            @endif
                            @if (count($shlok['english']) > 0)
                            <button class="lang btn btn-outline-primary rounded" data-name="english">English</button>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="langbody card-body border-top" id="gujdiv">
                    <div class="text-right">
                        @if ($shlok['audio'])
                        <audio controls="controls">
                            <source src="{{ asset($shlok['audio']) }}" type="audio/mp4" />
                        </audio>
                        @endif
                    </div>
                    <h4><b>અનુવાદ</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['short_description'] !!}</div>

                    <br>
                    <h4><b>અંતર્જ્ઞાન</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['description'] !!}</div>

                    <br>
                    <h4><b>સારાંશ</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['summary'] !!}</div>
                    
                </div>

                @if (count($shlok['hindi']) > 0)
                <div class="langbody card-body border-top d-none" id="hindidiv">
                    <div class="text-right">
                        @if ($shlok['hindi']['audio'])
                        <audio controls="controls">
                            <source src="{{ asset($shlok['hindi']['audio']) }}" type="audio/mp4" />
                        </audio>
                        @endif
                    </div>
                    <h4><b>अनुवाद</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['hindi']['short_description'] !!}</div>

                    <br>
                    <h4><b>अंतर्ज्ञान</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['hindi']['description'] !!}</div>

                    <br>
                    <h4><b>सारांश</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['hindi']['summary'] !!}</div>
                </div>
                @endif

                @if (count($shlok['english']) > 0)
                <div class="langbody card-body border-top d-none" id="englishdiv">
                    <div class="text-right">
                        @if ($shlok['english']['audio'])
                        <audio controls="controls">
                            <source src="{{ asset($shlok['english']['audio']) }}" type="audio/mp4" />
                        </audio>
                        @endif
                    </div>
                    <h4><b>Translation</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['english']['short_description'] !!}</div>

                    <br>
                    <h4><b>Intuition</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['english']['description'] !!}</div>

                    <br>
                    <h4><b>Summary</b>:</h4>
                    <div style="color: black !important;">{!! $shlok['english']['summary'] !!}</div>
                </div>
                @endif
            </div>

            <h6 class="mt-5 text-center">શ્રેણી શ્લોક</h6>
            <hr>
            <div class="row">
                @foreach ($shreni as $row)
                <div class="col-md-6">
                    <div class="card mb-5">
                        <div class="card-header p-0">
                            <div class="blog-media">
                                <a href="{{ route('u-shlok', [$row['id'], $row['meta_slug'] ?? 'shloks']) }}">
                                    {!! $row['shlok'] !!}
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <a href="{{ route('u-shlok', [$row['id'], $row['meta_slug'] ?? 'shloks']) }}">
                                <p class="wrappertext">{!! $row['short_description'] !!}</p>
                                <p class="wrappertext">{!! $row['description'] !!}</p>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Sidebar -->
        <!-- <div class="page-sidebar">
            <h6 class=" ">Tags</h6>
            <a href="javascript:void(0)" class="badge badge-primary m-1">#iusto</a>

            <div class="ad-card d-flex text-center align-items-center justify-content-center mt-4">
                <span href="#" class="font-weight-bold">ADS</span>
            </div>
        </div> -->
    </div>
</section>
@endsection

@section('socialmedia')
@include('ulayouts.socialmedia')
@endsection

@section('script')
<script>
    $(function() {
        $('.page-header').css('background-image', `url({!! asset($division['image']) !!})`);

        $(".lang").on('click', function() {
            let lang = $(this).data('name');
            $(".langbody").addClass('d-none');
            $('#' + lang + 'div').removeClass('d-none');
            $(".lang").attr('class', 'lang btn btn-outline-primary rounded');
            $(this).attr('class', 'lang btn btn-primary text-white rounded');
        });
    })
</script>
@endsection