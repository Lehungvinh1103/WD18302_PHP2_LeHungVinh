<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1.3</title>
</head>

<body>
    <h1 style="text-align: center;">PC06526 - lab 1.3</h1>
    <?php if (!empty($user)) : ?>
        <h2><?= isset($user) ? $user['lastname'] . ' ' . $user['firstname'] : 'Không tìm thấy!' ?></h2>
    <?php
    else :
    ?>
        <h2><?= isset($mess) ? $mess : '' ?></h2>
    <?php
    endif;
    ?>
    <form method="post">
        <div class="input-group">
            <input type="text" name="email" placeholder="Nhập email..." required>
        </div>
        <button type="submit" name="submit">Tìm kiếm</button>
    </form>

</body>

</html>