<div class="row" style="background-image:url('<?php __DIR__ ?>/public/assets/img/curved-images/curved21.jpg');">
    <div class="col-xl-6 col-lg-9 col-md-12 d-flex flex-column mx-auto">
        <div class="card card-plain mt-8">
            <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Welcome FileMaster</h3>
                <p class="mb-0">Register with us today </p>
            </div>
            <div class="card-body">
                <form role="form text-left" action="dang-ky" method="post" id="form-signUp">
                    <div class="mb-3 form-group ">
                        <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="email-addon">
                        <div class="form-message text-danger"></div>                   
                    </div>
                    <div class="mb-3 form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                        <div class="form-message text-danger"></div>                    
                    </div>
                    <div class="mb-3 form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                        <div class="form-message text-danger"></div>                    
                    </div>
                    <div class="mb-3 form-group">
                        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="password-addon">
                        <div class="form-message text-danger"></div>                    
                    </div>
                    <!-- <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                        <div class="form-message text-danger"></div>                                    
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                        <div class="form-message text-danger"></div>                                    </div> -->
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <p class="text-sm mt-3 mb-0 text-white">Already have an account? <a href="dang-nhap" class="text-dark font-weight-bolder">Sign in</a></p>

            </div>
        </div>
    </div>
</div>