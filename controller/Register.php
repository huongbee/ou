<?php
session_start();
require_once '../model/DBConnect.php';
$secretKey = 'ThisIsSecretKey';

if (isset($_POST['btnRegister'])) {
  if (!isset($_POST['fullname']) || $_POST['fullname'] === '') {
    $_SESSION['error'] = 'Missing fullname!';
    header('Location: ../sign-up');
    return;
  }
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
  if ($_POST['password'] != $_POST['re_password']) {
    $_SESSION['error'] = 'Mật khẩu không giống nhau!';
    header('Location: ../sign-up');
    return;
  }
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];
  $hash = hash('sha256', "$password$secretKey");
  $sql = "INSERT INTO users(fullname,email,password) VALUES ('$fullname','$username','$hash')";
  $db = new DBConnect();
  $result = $db->executeQuery($sql);
  if ($result === false) {
    $_SESSION['error'] = 'Đăng kí thất bại, vui lòng thử lại!';
    header('Location: ../sign-up');
    return;
  }
  $_SESSION['user'] = $fullname;
  header('Location: ../');
  return;
}
