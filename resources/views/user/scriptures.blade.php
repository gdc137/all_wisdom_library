@extends('ulayouts.main')

@section('title', 'Scriptures')

@section('head')
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
    <div class="row">
        @foreach ($scriptures as $row)
        <div class="col-md-6">
            <a href="{{ route('u-divisions', [$row['id'], $row['meta_slug'] ?? 'scripture']) }}" class="feature-post-item">
                <img src="{{ empty($row['image']) ? asset('uploads/noimg.jpg') : asset($row['image']) }}" class="w-100" alt="">
                <h4 style="color: black !important;">{!! $row['title'] !!}</h4>
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

@endsection