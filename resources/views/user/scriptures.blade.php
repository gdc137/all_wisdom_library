@extends('ulayouts.main')

@section('title', 'Scriptures')

@section('head')
<style>
    .wrappertext {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
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
                <h4>{{ $row['title'] }}</h4>
                <p class="wrappertext">{!! $row['description'] !!}</p>
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