<?php
use Core\Database;


spl_autoload_register(function($className)
{
    //chuyển // -> /
    $className = str_replace('\\', '/', $className);
    //đổi đường dẫn 
    $fileName = __DIR__ . "/$className.php";
    // kiểm tra đường dẫn require file để sử dụng Class
    if (file_exists($fileName)) {
        require_once $fileName;
    }
});

new Database;
?>

