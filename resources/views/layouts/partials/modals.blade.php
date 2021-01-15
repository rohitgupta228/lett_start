<div class="modal fade auth-modal" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login to Lettstart Design</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                <form id="login-form" class="auth-form active" novalidate="novalidate">
                    <div class="alert alert-danger error-msgs" id="errorMsg">
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
                        <button type="submit" id="submit" class="btn btn-block btn-primary-gred">
                            <span>Log In</span>
                            <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                        </button>
                    </div>
                </form><!-- form end -->
                <div class="text-center">
                    New to LettStart Design? <a href="javascript:void(0)"  id="register-btn" class="text-primary" title="Create Account">Create Account</a>
                </div>
                <div class="text-center mt-2">
                    <a href="javascript:void(0)" id="forgot-btn" class="text-default" title="forgot password">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade auth-modal" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content pb-0">
            <div class="modal-header">
                <h4 class="modal-title">Register to Lettstart Design</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                <form id="signup-form" class="auth-form" novalidate="novalidate">
                    <div class="alert alert-danger error-msgs" id="errorMsg">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="alert alert-success success-msgs" id="successMsg">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="form-group mb-3">
                        <input name="username" id="username" type="text" class="form-control" placeholder="Username *">
                    </div>
                    <div class="form-group mb-3">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Email Address *">
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
                        <button type="submit" id="submit" class="btn btn-block btn-primary-gred">
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
                <p class="mb-0">By Register to lettstartdesign.com, You are agree to our <a href="../terms-of-use.html" class="text-primary">Terms of Use</a> and <a href="../privacy-policy.html" class="text-primary">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade auth-modal" id="forgotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Forgot Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="forgot-form" class="auth-form" novalidate="novalidate">
                    <div class="alert alert-danger error-msgs" id="errorMsg">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="alert alert-success success-msgs" id="successMsg">
                        <button type="button" class="close" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="form-group mb-3">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Email Address">
                        <div class="validation-error d-none">Please enter valid Email address</div>
                    </div>
                    <div class="text-center mb-2">
                        <button type="submit" id="submit" class="btn btn-block btn-primary-gred">
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

<div class="modal fade auth-modal" id="resetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="font-weight-medium mb-2 font-size-13">All (*) field's are mandatory.</div>
                <form id="reset-form" class="auth-form" novalidate="novalidate">
                    <div class="alert alert-danger error-msgs" id="errorMsg">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success success-msgs" id="successMsg">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group mb-3">
                        <input name="password" type="password" class="form-control" id="password_reset" placeholder="Password *">
                        <div class="validation-error d-none"></div>
                    </div>
                    <div class="form-group mb-30">
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password *">
                        <div class="validation-error d-none"></div>
                    </div>
                    <div class="text-center mb-2">
                        <button type="submit" id="submit" class="btn btn-block btn-primary-gred">
                            <span>Reset Account</span>
                            <span class="align-middle btn-loader"><i class="bx bx-loader-alt bx-spin icon-md"></i></span>
                        </button>
                    </div>
                </form><!-- form end -->
                <div class="text-center">
                    Already Account? <a href="javascript:void(0)"  id="register-btn" class="text-primary" title="Create Account">Create Account</a>
                </div>
            </div>
        </div>
    </div>
</div>