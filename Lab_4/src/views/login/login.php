<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileMaster</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?php __DIR__?>/public/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?php __DIR__?>/public/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?php __DIR__?>/public/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php __DIR__?>/public/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body>
    <section>
        <div class="page-header min-vh-75" >
            <div class="container">
                <div class="row" style="background-image:url('<?php __DIR__?>/public/assets/img/curved-images/curved21.jpg');" >
                    <div class="col-xl-6 col-lg-9 col-md-12 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8" >
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome FileMaster</h3>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body" >
                                <form role="form"> 
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    <div class="form-check form-switch">
                                        <!-- <input class="form-check-input" type="checkbox" id="rememberMe" checked=""> -->
                                        <!-- <label class="form-check-label" for="rememberMe">Remember me</label> -->
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto text-white">
                                    Don't have an account?
                                    <a href="javascript:;" class="text-dark text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php __DIR__?>/public/assets/js/core/popper.min.js"></script>
    <script src="<?php __DIR__?>/public/assets/js/core/bootstrap.min.js"></script>
</body>

</html>