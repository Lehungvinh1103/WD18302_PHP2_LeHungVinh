<?php
include 'model.php';

$courses = get_courses();
$block = (!empty($_GET['block'])) ? $_GET['block'] : '';
$courses_name = find_by_block($block);

include 'view.php';
?>