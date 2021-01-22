<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="index, follow">
        <meta name="author" content="LettStartDesign">
        <meta name="title" content="404 page not found">
        <meta name="description" content="404 page not found">
        <meta name="keywords" content="404, not found, error, wrong url">
        <title>Buy Premium Bootstrap Angular Template |  LettStartDesign</title>
        <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <style>
            .page-wrapper {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            h3 {
                color: #343a40;
            }
            .btn-primary {
                background: #2982de;
                border-color: #2982de;
                height: 42px;
                line-height: 1.7;
            }
            .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
                background: #2075ce;
                border-color: #2075ce;
            }
        </style>
    </head>

    <body>
        <div class="page-wrapper">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5">
                        <img src="{{ url('assets/images/404.svg') }}" alt="404" class="img-fluid">
                    </div>
                    <div class="col-lg-12">
                        <div class="text-center">
                            <h3 class="font-weight-600 mb-3">We couldn’t connect the dots</h3>
                            <p class="text-muted">This page was not found. <br> You may have mistyped the address or the page may have
                                moved.</p>
                            <div class="mt-4 text-center">
                                <a class="btn btn-primary" href="{{ route('home.products.list') }}">
                                    <span>Back to Home</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>