<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab 1.4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <h1 class="mb-3" style="text-align: center;">PC06526 - lab 1.4</h1>
    <h2 class="mb-3" style="text-align: center;">Danh sách files</h2>
    <table class="table w-75 m-auto mt-5">
        <thead>
            <tr>
                <th>Tên file</th>
                <th>Đường dẫn</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($files)) : foreach ($files as $fileItems) : ?>
                    <tr>
                        <th><?= $fileItems['name'] ?></th>
                        <td><?= $fileItems['path'] ?></td>
                        <td><?= ($fileItems['status'] == 0 )? '<i class="bi bi-eye-fill"></i>' : '<i class="bi bi-eye-slash-fill"></i>' ?></td>
                        <td><?= $fileItems['created_at'] ?></td>
                        <td><a class="btn btn-outline-warning" href=""><i class="bi bi-pencil-square"></i></a></td>
                    </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>