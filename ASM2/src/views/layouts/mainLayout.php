<!DOCTYPE html>
<html lang="en">

<?php
include_once __DIR__ . "/../blocks/head.php";
?>

<body class="g-sidenav-show  bg-gray-100">

    <?php
    include_once __DIR__ . "/../blocks/aside.php";

    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php
        include_once __DIR__ . "/../blocks/nav.php";
        ?>
        <div class="container-fluid py-4">

            <!-- content  -->
            <?= $content ?>

        </div>
    </main>


    <?php
    include_once __DIR__ . "/../blocks/footer.php";

    ?>
</body>

</html>