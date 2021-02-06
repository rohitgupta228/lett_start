@extends('layouts.main')

@section('content')
<div class="banner-title mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 id="main-title" class="h3 mb-3">Edit Profile</h1>
                <h6 class="subtitle">Update your account infomation by click submit button.</h6>
            </div>
        </div>
    </div>
</div>
<!--Demo's Start-->
<section class="section pt-5">
    <div class="container">
        <div class="pb-2">
            @include('flash')
        </div>
        <div class="row flex-lg-row-reverse">
            <div class="col-lg-4 pl-lg-5">
                <form id="upload-image-form" method="POST" action="{{ route('save.user.image') }}" class="mb-30" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="alert alert-danger error-msgs">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="profile-image mb-15">
                        <img src="{{ $userDetails ? $userDetails->image : url('assets/images/client-thumb.png') }}"  alt="Upload user profile pic" title="User profile picture" class="img-fluid rounded-circle" />
                    </div>
                    <div class="file-choose-btn">
                        <button class="btn btn-dark btn-sm" type="button" id="choose-file">
                            <span>Upload Profile Image</span>
                            <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                        </button>
                        <button id="submit-btn" class="d-none">Submit</button>
                        <input type="file" class="d-none" id="upload-image" name="photo" accept="image/*">
                    </div>
                </form>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group app-label up">
                            <input name="user-name" id="edit-user-name" value="{{ Auth::user()->username }}" type="text" class="form-control" disabled>
                            <label for="user-name">Username</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group app-label up">
                            <input name="last_name" id="edit-user-email" type="text" value="{{ Auth::user()->email }}" class="form-control" disabled>
                            <label for="user-email">Email</label>
                        </div>
                    </div>
                </div>
                <form id="edit-profile-form" method="POST" action="{{ route('save.profile') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group app-label">
                                <input name="first_name" value="{{ $userDetails ? $userDetails->first_name : '' }}" id="fname" type="text" class="form-control">
                                <label for="fname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group app-label">
                                <input name="last_name" value="{{ $userDetails ? $userDetails->last_name : '' }}" id="lname" type="text" class="form-control">
                                <label for="lname">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group app-label">
                                <input name="organization" value="{{ $userDetails ? $userDetails->organization : '' }}" id="organization" type="text" class="form-control">
                                <label for="organization">Organization</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group app-label">
                                <input name="mobile" value="{{ $userDetails ? $userDetails->mobile : '' }}" id="mobile" type="text" class="form-control">
                                <label for="mobile">Mobile</label>
                                <div class="validation-error d-none">Please enter valid phone number</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group app-label">
                                <textarea rows="3" name="address" class="form-control">{{ $userDetails ? $userDetails->address : '' }}</textarea>
                                <label for="address">Address</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary-gred" type="submit">
                                <span>Save Profile</span>
                                <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--Demo's End-->
</div>

@endsection
@section('footer_script')
<script>
    $(".app-label .form-control").on("change", function () {
        if ($(this).val() === "" || $(this).val() === null || $(this).val() === undefined) {
          $(this).parent(".app-label").removeClass("up");
        }
        else {
          $(this).parent(".app-label").addClass("up");
        }
    })
</script>
<script src="{{ url('assets/js/inner-theme.min.js') }}"></script>
@endsection