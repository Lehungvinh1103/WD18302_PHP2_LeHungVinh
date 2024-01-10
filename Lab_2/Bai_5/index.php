<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Controller\BaseController;
use App\Model\BaseModel;
use App\Core\Route;
use App\Core\Database;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập thêm</title>
</head>
<body>
    <div class="connect">
        <?php
        new Database;
        ?>
        <h2>
        <?php
        new BaseModel;
        ?>
        </h2>
        <h2>
        <?php
        new BaseController;
        ?>
        </h2>
        <h2>
        <?php
        new Route;
        ?>
        </h2>
    </div>
</body>
</html>


