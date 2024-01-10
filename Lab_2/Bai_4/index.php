<?php
require_once __DIR__.'/vendor/autoload.php';

use App\Core\Database;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết nối database</title>
    <style>
        .database{
            width: 960px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="database">
        <?php
            new Database;
        ?>
    </div>
</body>
</html>