<!-- Modal -->
<div class="modal fade auth-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h4 modal-title" id="loginModalLabel">Login to Lettstart Design</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                <form id="login-form" class="auth-form active" method="post" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="alert alert-danger error-msgs">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="form-group mb-3">
                        <input name="username" id="username" type="text" class="form-control" placeholder="Username *">
                    </div>
                    <div class="form-group mb-3 position-relative password-group">
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password *">
                        <i class="bx bx-show icon-view"></i>
                        <i class='bx bx-hide icon-view'></i>
                    </div>
                    <div class="text-center mb-2">
                        <button type="submit" class="btn btn-block btn-primary-gred">
                            <span>Log In</span>
                            <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                        </button>
                    </div>
                </form><!-- form end -->
                <div class="text-center">
                    New to LettStart Design? <a href="javascript:void(0)" class="text-primary register-btn" title="Create Account">Create Account</a>
                </div>
                <div class="text-center mt-2">
                    <a href="javascript:void(0)" id="forgot-btn" class="text-default" title="forgot password">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade auth-modal" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-0">
            <div class="modal-header">
                <div class="h4 modal-title" id="registerModalLabel">Register to Lettstart Design</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                <form id="signup-form" class="auth-form" method="post" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="alert alert-danger error-msgs">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="alert alert-success success-msgs">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="form-group mb-3">
                        <input name="username" id="username_register" type="text" class="form-control" placeholder="Username *">
                    </div>
                    <div class="form-group mb-3">
                        <input name="email" id="email_register" type="email" class="form-control" placeholder="Email Address *">
                        <div class="validation-error d-none"></div>
                    </div>
                    <div class="form-group mb-3">
                        <input name="password" type="password" class="form-control" id="password_primary" placeholder="Password *">
                        <div class="validation-error d-none"></div>
                    </div>
                    <div class="form-group mb-30">
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password *">
                        <div class="validation-error d-none"></div>
                    </div>
                    <div class="text-center mb-2">
                        <button type="submit" class="btn btn-block btn-primary-gred">
                            <span>Register</span>
                            <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                        </button>
                    </div>
                </form><!-- form end -->
                <div class="text-center">
                    Already Account? <a href="javascript:void(0)"  id="login-btn" class="text-primary" title="Login">Login</a>
                </div>
            </div>
            <div class="modal-footer text-center">
                <p class="mb-0">By Register to lettstartdesign.com, You are agree to our <a href="{{ route('terms') }}" class="text-primary">Terms of Use</a> and <a href="{{ route('privacy') }}" class="text-primary">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade auth-modal" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h4 modal-title" id="forgotModalLabel">Forgot Password</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="forgot-form" class="auth-form" method="post" novalidate="novalidate">
                {{ csrf_field() }}
                    <div class="alert alert-danger error-msgs">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="alert alert-success success-msgs">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="form-group mb-3">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Email Address">
                        <div class="validation-error d-none">Please enter valid Email address</div>
                    </div>
                    <div class="text-center mb-2">
                        <button type="submit" class="btn btn-block btn-primary-gred">
                            <span>Get New Password</span>
                            <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                        </button>
                    </div>
                    <div class="text-center">
                        Already Account? <a href="javascript:void(0)"  id="forgot-login-btn" class="text-primary" title="Login">Login</a>
                    </div>
                </form><!-- form end -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade auth-modal" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="h4 modal-title" id="resetModalLabel">Reset Password</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                <form id="reset-form" class="auth-form" novalidate="novalidate">
                    <div class="alert alert-danger error-msgs">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success success-msgs">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group mb-3">
                        <input name="password" type="password" class="form-control" id="password_reset" placeholder="Password *">
                        <div class="validation-error d-none"></div>
                    </div>
                    <div class="form-group mb-30">
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation_reset" placeholder="Confirm Password *">
                        <div class="validation-error d-none"></div>
                    </div>
                    <div class="text-center mb-2">
                        <button type="submit" class="btn btn-block btn-primary-gred">
                            <span>Reset Account</span>
                            <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                        </button>
                    </div>
                </form><!-- form end -->
                <div class="text-center">
                    Already Account? <a href="javascript:void(0)" class="text-primary register-btn" title="Create Account">Create Account</a>
                </div>
            </div>
        </div>
    </div>
</div>