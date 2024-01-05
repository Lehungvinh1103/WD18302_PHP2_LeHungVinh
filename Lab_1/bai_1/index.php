<?php
echo '<h1 style="text-align: center;">PC06526 - lab 1.1</h1> <br>';

$courses = [
    's1' => 'Lập trình PHP2',
    's2' => 'JavaScript nâng cao',
    's3' => 'Lập trình với Framework Laravel',
];


//model
function get_courses()
{
    global $courses;

    return array_values($courses);
}

function find_by_block($block)
{
    global $courses;

    return array_key_exists($block, $courses) ? $courses[$block] : "Không tìm thấy!";
}
?>


<?php
//controller
$block = (!empty($_GET['block'])) ? $_GET['block'] : '';

$courses_name = find_by_block($block);



//view
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1.1</title>
</head>

<body>
    <h1><?= $courses_name ?></h1>
    <form action="" method="get">

        <div class="input-group">
            <select name="block" id="">
                <?php foreach ($courses as $key => $value) : ?>
                    <option value="<?= $key ?>"><?= $value ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">search</button>
        </div>

    </form>

</body>

</html>

<?php
?>