<div class="row mb-5">
    <div class="col-lg-12 mt-lg-0 mt-4">

        <div class="card card-body" id="profile">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-auto col-4">
                    <div class="avatar avatar-xl position-relative">
                        <img src="<?php __DIR__ ?>/public/assets/img/marie.jpg" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-sm-auto col-8 my-auto">
                    <div class="h-100">
                        <h5 class="mb-1 font-weight-bolder">
                            Nguyễn Nguyễn
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            CEO / Co-Founder
                        </p>
                    </div>
                </div>
                <div class="col-sm-auto ms-sm-auto mt-sm-0 mt-3 d-flex">
                    <!-- <label class="form-check-label mb-0">
                        <small id="profileVisibility">
                            Switch to invisible
                        </small>
                    </label>
                    <div class="form-check form-switch ms-2">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault23" checked onchange="visible()">
                    </div> -->
                </div>
            </div>
        </div>

        <div class="card mt-4" id="basic-info">
            <div class="card-header">
                <h5>Basic Info</h5>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Full Name</label>
                        <div class="input-group">
                            <input id="lastName" name="lastName" class="form-control" type="text" placeholder="Thompson" required="required">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label">I'm</label>
                        <select class="form-control" name="choices-gender" id="choices-gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label mt-4">Email</label>
                        <div class="input-group">
                            <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com">
                        </div>
                    </div>
                    <div class="col-6">
                    <label class="form-label mt-4">Phone Number</label>
                        <div class="input-group">
                            <input id="phone" name="phone" class="form-control" type="number" placeholder="+40 735 631 620">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4" id="password">
            <div class="card-header">
                <h5>Change Password</h5>
            </div>
            <div class="card-body pt-0">
                <label class="form-label">Current password</label>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Current password">
                </div>
                <label class="form-label">New password</label>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="New password">
                </div>
                <label class="form-label">Confirm new password</label>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Confirm password">
                </div>
                <button class="btn bg-gradient-dark btn-sm float-end mt-3 mb-0">Update password</button>
            </div>
        </div>
    </div>
</div>