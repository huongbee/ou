<?php
session_start();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/style.css">
  <title>Login</title>
</head>

<body>

  <div id="logreg-forms">
    <form class="form-signin" action="controller/Login.php" method="POST">
      <h1 class="h3 mt-4 mb-4 font-weight-normal" style="text-align: center"> ĐĂNG NHẬP</h1>
      <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </div>
      <?php endif ?>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="username" autocomplete="off">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">

      <button class="btn btn-success btn-block" type="submit" name="btnLogin"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>

      <hr>
      <button class="btn btn-primary btn-block" type="button" id="btn-signup">
        <a href="sign-up">
          <i class="fas fa-user-plus"></i> Tạo mới tài khoản
        </a>
      </button>
    </form>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>