@extends('ulayouts.main')

@section('title', 'Contact Us')

@section('head')
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
    <h3 class="sidebar-title section-title mb-4 mt-3">Contact Us</h3>
    <p>We would love to hear from you! Whether you have questions, feedback, or suggestions, we are here to assist you. Feel free to reach out to us for any inquiries related to scriptures, study resources, or website support.</p>
    <hr>
    <form action="{{ route('contact-us') }}" method="POST">
        <p id="successmsg" style="color: green;"></p>
        @csrf
        <div class="row">
            <div class="col-md-12 mt-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                <p class="text-danger">{{ $errors->first('name') }}</p>
            </div>
            <div class="col-md-6 mt-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                <p class="text-danger">{{ $errors->first('email') }}</p>
            </div>
            <div class="col-md-6 mt-3">
                <label for="number" class="form-label">Contact Number</label>
                <input type="number" class="form-control" id="number" name="number" placeholder="Enter your number">
                <p class="text-danger">{{ $errors->first('number') }}</p>
            </div>
            <div class="col-md-12 mt-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                <p class="text-danger">{{ $errors->first('subject') }}</p>
            </div>
            <div class="col-md-12 mt-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Type your message"></textarea>
                <p class="text-danger">{{ $errors->first('message') }}</p>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary text-white">Send Message</button>
            </div>
        </div>
    </form>
    <hr>
</section>
@endsection

@section('socialmedia')
@include('ulayouts.socialmedia')
@endsection

@section('script')
@if (\Session::has('success'))
<script>
    $(function() {
        $("#successmsg").html(`{!! \Session::get('success') !!}`);
    });
</script>
@endif
<script>
    $(function() {
        $('.page-header').css('background-image', `url({!! asset('user-assets/imgs/wl13.jpeg') !!})`);
    })
</script>
@endsection