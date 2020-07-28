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
  <title>Register</title>
</head>

<body>

  <div id="logreg-forms">
    <form action="controller/Register.php" class="form-signup" method="POST">
      <h1 class="h3 mt-4 mb-4 font-weight-normal" style="text-align: center"> TẠO MỚI TÀI KHOẢN</h1>
      <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </div>
      <?php endif ?>
      <input type="text" id="user-name" class="form-control" placeholder="Full name" required="" autofocus="" name="fullname">
      <input type="email" id="user-email" class="form-control" placeholder="Email address" required="" autofocus="" name="username">
      <input type="password" id="user-pass" class="form-control" placeholder="Password" required="" autofocus="" name="password">
      <input type="password" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required="" autofocus="" name="re_password">

      <button class="btn btn-primary btn-block" type="submit" name="btnRegister"><i class="fas fa-user-plus"></i> GỬI</button>
      <a href="sign-in" id="cancel_signup"><i class="fas fa-angle-left"></i> Trở lại</a>
    </form>
    <br>

  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>