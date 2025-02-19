@extends('ulayouts.main')

@section('title', $scripture['meta_title'])

@section('head')
<meta name="description" content="{{ $scripture['meta_desc'] }}">
<meta name="keywords" content="{{ $scripture['meta_keywords'] }}">
@endsection

@section('slider')
<!-- page-header -->
<header class="page-header"></header>
<!-- end of page header -->
@endsection

@section('content')
<section>
    <h2 style="text-decoration: underline;" class="text-center">{{ $scripture['title'] }}</h2>
    <div class="row my-3">
        <div class="col-md-8 border-right">
            <p>{!! $scripture['description'] !!}</p>
        </div>
        <div class="col-md-4">
            <p>Author: <b>{{ $scripture['author'] }}</b></p>
            <p>Root Language: <b>{{ $scripture['root_language'] }}</b></p>
            <p>Publish Details: <b>{{ $scripture['publish_detail'] }}</b></p>
        </div>
    </div>
    <hr>

    <h4>Divisions: </h4>
    <div class="row">
        @foreach ($divisions as $row)
        <div class="col-md-3">
            <a href="{{ route('u-shloks', [$row['id'], $row['meta_slug'] ?? 'division']) }}" class="feature-post-item">
                <img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset($row['image']) }}" class="w-100" alt="">
                <h5>{{ $row['title'] }}</h5>
                <p>{!! $row['description'] !!}</p>
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