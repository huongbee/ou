<?php
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['error'] = 'Vui lòng đăng nhập';
    header('Location: sign-in');
    return;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <?php
    require_once 'model/DBConnect.php';
    $sql = 'SELECT * FROM users';
    $db = new DBConnect();
    $users = $db->loadMoreRow($sql);
    ?>
    <div class="container">
        <div style="text-align: right;">
            <p>Hello, <?= $_SESSION['user'] ?> </p>
            <p><a href="sign-out">Logout</a></p>
        </div>
        <h3>Danh sách user</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Birthdate</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?= $user->id ?></th>
                        <td><?= $user->fullname ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->birthdate ? date('d/m/Y', strtotime($user->birthdate)) : '--' ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>