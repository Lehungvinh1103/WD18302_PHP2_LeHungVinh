<div class="row mb-5">
    <div class="col-lg-12 mt-lg-0 mt-4">

        <div class="card card-body" id="profile">
            <div class="row justify-content-center align-items-center">
                <div class="col-sm-auto col-4">
                    <div class="avatar avatar-xl position-relative">
                        <?php
                        if (isset($dataUser['image'])) :
                        ?>
                            <img src="<?php __DIR__ ?>/public/assets/img/no-img-user.png" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                        <?php else :

                        ?>
                            <img src="<?php __DIR__ ?>/public/assets/img/no-img-user.png" alt="bruce" class="w-100 border-radius-lg shadow-sm">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-auto col-8 my-auto">
                    <div class="h-100">
                        <h5 class="mb-1 font-weight-bolder">
                            <?php
                            if ($dataUser['username'] == '') :
                            ?>

                            <?php else :

                            ?>
                                <?= $dataUser['username'] ?>
                            <?php endif; ?>

                        </h5>

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
                <h5>Thông tin cá nhân</h5>
            </div>
            <div class="card-body pt-0">
                <form action="updateInfo" id="formInfo" method="post">
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label">Họ và tên</label>
                            <div class="form-group">
                                <input id="fullname" name="fullname" class="form-control" type="text" placeholder="Họ và tên" value="<?=(isset($dataUser['fullname'])? $dataUser['fullname']:'')?>">
                                <div class="form-message text-danger"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label">Giới tính</label>
                            <select class="form-control" name="gender" id="choices-gender">
                                <option value="Male" <?=($dataUser['gender']== 0) ? 'selected' : ''?>>Nam</option>
                                <option value="Female" <?=($dataUser['gender']== 1) ? 'selected' : ''?>>Nữ</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="form-label mt-4">Email</label>
                            <div class="form-group">
                                <input id="email" name="email" class="form-control" type="email" placeholder="example@email.com" value="<?= $dataUser['email'] ?>" readonly>
                                <div class="form-message text-danger"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="form-label mt-4">Số điện thoại</label>
                            <div class="form-group">
                                <input id="phone" name="phone" class="form-control" type="number" placeholder="+40 735 631 620" value="<?=(isset($dataUser['phone'])? $dataUser['phone']:'')?>">
                                <div class="form-message text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <button class="btn bg-gradient-dark btn-sm float-end mt-3 mb-0">Cập nhật thông tin</button>
                </form>
            </div>
        </div>

        <div class="card mt-4" id="password">
            <div class="card-header">
                <h5>Thay đổi mật khẩu</h5>
            </div>
            <div class="card-body pt-0">
                <form action="updatePass" id="formPass" method="post">
                    <label class="form-label">Mật khẩu hiện tại</label>
                    <div class="form-group">
                        <input class="form-control" name="current_pass" type="password" placeholder="Mật khẩu hiện tại">
                        <div class="form-message text-danger"></div>
                    </div>
                    <label class="form-label">Mật khẩu mới</label>
                    <div class="form-group">
                        <input class="form-control" name="new_pass" type="password" placeholder="Mật khẩu mới">
                        <div class="form-message text-danger"></div>
                    </div>
                    <label class="form-label">Nhập lại mật khẩu</label>
                    <div class="form-group">
                        <input class="form-control" name="confirm_pass" type="password" placeholder="Nhập lại mật khẩu">
                        <div class="form-message text-danger"></div>
                    </div>
                    <input type="text" hidden name="user_id" value="<?=$dataUser['user_id']?>">
                    <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-3 mb-0">Cập nhật mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
</div>