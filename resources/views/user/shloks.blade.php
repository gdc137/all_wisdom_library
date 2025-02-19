@extends('ulayouts.main')

@section('title', $division['meta_title'])

@section('head')
<meta name="description" content="{{ $division['meta_desc'] }}">
<meta name="keywords" content="{{ $division['meta_keywords'] }}">
<style>
    table,
    td,
    th {
        border: 1px solid black;
        padding: 1rem;
    }

    .wrappertext {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 1;
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
    <h2 style="text-decoration: underline;" class="text-center">{{ $division['title'] }}</h2>
    <div class="row my-3">
        <div class="col-md-12">
            <p>{!! $division['description'] !!}</p>
        </div>
    </div>
    <hr>

    <h4>Shloks: </h4>
    <div class="card">
        <div class="card-body">
            <table style="width: 100%;" class="table-striped">
                <thead>
                    <tr>
                        <th style="width: 10%;">#</th>
                        <th style="width: 80%;">Shlok</th>
                        <th style="width: 10%;">goto</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($shloks as $row)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{!! $row['shlok'] !!}
                            <br><br>
                            <p class="wrappertext">{!! $row['short_description'] !!}</p>
                        </td>
                        <td><a href="{{ route('u-shlok', [$row['id'], $row['meta_slug'] ?? 'shloks']) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="green" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg>
                            </a></td>
                    </tr>

                    @php
                    $i++;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
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
    })
</script>
@endsection