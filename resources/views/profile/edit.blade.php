@extends('layouts.main')

@section('title', 'Change Password')

@section('head')

@endsection

@section('content')

    <!-- Basic table -->
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0 d-none" style="display: none !important;">Change Password
                    </h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form id="changePasswordForm" method="POST" enctype="multipart/form-data"
                            action="{{ route('password.update') }}">
                            @csrf
                            @method('patch')

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="current_password">Current Password</label>
                                        <input type="password" name="current_password" class="form-control"
                                            id="current_password" autocomplete="new-password"
                                            placeholder="Enter Current Password">
                                        <p class="text-danger">{{ $errors->updatePassword->first('current_password') }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="password">New Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            autocomplete="new-password" placeholder="Enter New Password">
                                        <p class="text-danger">{{ $errors->updatePassword->first('password') }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="password_confirmation">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation" autocomplete="new-password"
                                            placeholder="Confirm New Password">
                                        <p class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary float-end">Change</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Basic table -->
@endsection

@section('script')
    <script>
        $(function() {
            jQuery.validator.addMethod('fileSizeLimit', function(value, element, limit) {
                return !element.files[0] || (element.files[0].size <= limit);
            }, 'Image is too big');

            var validationForm = $('#validationform');
            validationForm.validate({
                rules: {
                    'current_password': {
                        required: true,
                    },
                    'password': {
                        required: true,
                    },
                    'password_confirmation': {
                        required: true,
                        equalTo: '#password'
                    }
                },
                messages: {
                    'current_password': {
                        required: "Current password is require",
                    },
                    'password': {
                        required: "Password is require",
                    },
                    'password_confirmation': {
                        required: "Confirm password is require",
                        equalTo: "Passwords does not match"
                    }
                }
            });
        });
    </script>

    @if (\Session::has('status'))
        <script>
            $(function() {
                toastr['success'](`{!! \Session::get('status') !!}`, 'Success!', {
                    showMethod: 'fadeIn',
                    hideMethod: 'fadeOut',
                    positionClass: 'toast-top-center',
                    timeOut: 3000,
                });
            });
        </script>
    @endif
@endsection
