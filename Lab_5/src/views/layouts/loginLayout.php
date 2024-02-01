<!DOCTYPE html>
<html lang="en">

<?php
include_once __DIR__ . "/../blocks/login/head.php";
?>

<body class="g-sidenav-show  bg-gray-100">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">

                <?= $content ?>

            </div>
        </div>
    </section>

    <?php
    include_once __DIR__ . "/../blocks/login/script.php";
    ?>

</body>

</html>