@extends('ulayouts.main')

@section('title', $scripture['meta_title'])

@section('head')
<meta name="description" content="{{ $scripture['meta_desc'] }}">
<meta name="keywords" content="{{ $scripture['meta_keywords'] }}">

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
    <h2 style="text-decoration: underline;" class="text-center">{!! $scripture['title'] !!}</h2>
    <div class="row my-3">
        <div class="col-md-8 border-right">
            <p style="color: black !important;">{!! $scripture['description'] !!}</p>
        </div>
        <div class="col-md-4">
            <p style="color: black !important;">Author: <b>{!! $scripture['author'] !!}</b></p>
            <p style="color: black !important;">Root Language: <b>{!! $scripture['root_language'] !!}</b></p>
            <p style="color: black !important;">Publish Details: <b>{!! $scripture['publish_detail'] !!}</b></p>
        </div>
    </div>
    <hr>

    <h4>Divisions: </h4>
    <div class="row">
        @foreach ($divisions as $row)
        <div class="col-md-3">
            <a href="{{ route('u-shloks', [$row['id'], $row['meta_slug'] ?? 'division']) }}" class="feature-post-item">
                <img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset($row['image']) }}" class="w-100" alt="">
                <h5 style="color: black !important;">{!! $row['title'] !!}</h5>
                <div class="wrappertext" style="color: black !important;">{!! $row['description'] !!}</div>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection

@section('socialmedia')
@include('ulayouts.socialmedia')
@endsection

@section('script')
<script>
    $(function() {
        $('.page-header').css('background-image', `url({!! asset($scripture['image']) !!})`);
    })
</script>
@endsection