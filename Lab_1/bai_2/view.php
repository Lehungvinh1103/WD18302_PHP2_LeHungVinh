<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1.2</title>
</head>

<body>
    <h1 style="text-align: center;">PC06526 - lab 1.2</h1>
    <h2 ><?= $courses_name ?></h2>
    <form action="controller.php" method="get">

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