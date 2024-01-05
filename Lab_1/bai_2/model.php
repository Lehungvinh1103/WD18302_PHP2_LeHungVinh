<?php
function get_courses()
{
    include 'data.php';

    return $courses;
}

function find_by_block($block)
{
    include 'data.php';

    return array_key_exists($block, $courses) ? $courses[$block] : "Không tìm thấy khóa học!";
}
