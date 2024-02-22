<div class="row" style="background-image:url('<?php __DIR__ ?>/public/assets/img/curved-images/curved21.jpg');">
    <div class="col-xl-6 col-lg-9 col-md-12 d-flex flex-column mx-auto">
        <div class="card card-plain mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Welcome FileMaster</h3>
                <!-- <p class="mb-0">Enter your email and password to sign in</p> -->
                
            </div>
            <div class="card-body">
                <form role="form" method="post" action="dang-nhap" id="form-login">

                    <div class="mb-3 form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                        <div class="form-message text-danger"></div>
                    </div>
                    <div class="err">
                        <?= isset($message) ? 'hello' : '' ?>
                    </div>

                    <div class="mb-3 form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                        <div class="form-message text-danger"></div>
                    </div>
                    <div class="text-danger" id="errMessage">

                    </div>
                    <div class="form-check form-switch">
                        <!-- <input class="form-check-input" type="checkbox" id="rememberMe" checked=""> -->
                        <!-- <label class="form-check-label" for="rememberMe">Remember me</label> -->
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto text-white">
                    Don't have an account?
                    <a href="dang-ky" class="text-dark text-gradient font-weight-bold">Sign up</a>
                </p>
            </div>

        </div>
    </div>
</div>