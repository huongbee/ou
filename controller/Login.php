<?php
session_start();
require_once '../model/DBConnect.php';
$secretKey = 'ThisIsSecretKey';

if (isset($_POST['btnLogin'])) {
    if (!isset($_POST['username']) || $_POST['username'] === '') {
        $_SESSION['error'] = 'Missing username!';
        header('Location: ../sign-up');
        return;
    }
    if (!isset($_POST['password']) || $_POST['password'] === '') {
        $_SESSION['error'] = 'Missing password!';
        header('Location: ../sign-up');
        return;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = 'SELECT * FROM users WHERE email=?';
    $db = new DBConnect();
    $user = $db->loadOneRow($sql, [$username]);
    if ($user === false) {
        $_SESSION['error'] = 'Không tìm thấy user!';
        header('Location: ../sign-up');
        return;
    }
    if ($user->password != hash('sha256', "$password$secretKey")) {
        $_SESSION['error'] = 'Sai thông tin đăng nhập!';
        header('Location: ../sign-up');
        return;
    }
    if (isset($_POST['remember']) && $_POST['remember'] == 1) {
        setcookie('user', $username, time() + 120); //2mins
    }
    $_SESSION['user'] = $user->fullname;
    header('Location: ../');
    return;
}
header('Location: ../sign-up');
return;
