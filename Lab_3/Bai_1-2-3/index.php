<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Database;
use App\Core\Form;


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-5 mt-5">Đăng ký</h1>
        <?php echo $form = Form::begin('', 'post'); ?>
        <div class="row">
            <div class="col-md-6">
                <?php echo $form->field('firstname') ?>
            </div>
            <div class="col-md-6">
                <?php echo $form->field('lastname') ?>
            </div>

            <?php echo $form->field('email'); ?>

            <?php echo $form->field('password')->passwordField(); ?>

            <?php echo $form->field('confirmPass')->passwordField(); ?>

            <button type="submit" class="btn btn-primary">Gửi</button>
            <?php echo Form::end(); ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>