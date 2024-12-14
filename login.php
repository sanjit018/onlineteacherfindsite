<?php
include 'include/config.php';
session_start();
if(isset($_SESSION['login']))
{
  header("location:dashboard.php");
}
// Example usage
$status = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $email = $_POST["email"];
  $password = md5($_POST["password"]);
  $id = '';
  if (empty($email) || empty($password)) {
    $status .= "<div class='alert alert-danger'>Please Fill All Fields</div>";
  } else {
    $stmt_stud = $pdo->prepare("SELECT * FROM teacher WHERE email = :email");
    $stmt_stud->bindParam(":email", $email);
    $stmt_stud->execute();
    $stmt = $pdo->prepare("SELECT * FROM student WHERE username = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
      while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        if ($password == $row->password) {
          $_SESSION['username'] = $email;
          $_SESSION['admin_id'] = $row->id;
          $_SESSION['password'] = $password;
          $_SESSION['login'] = 1;
          // echo "login";
          header("location:dashboard.php");
        }
      }
    }elseif ($stmt_stud->rowCount() == 1) {
      while ($row = $stmt_stud->fetch(PDO::FETCH_OBJ)) {
        if ($password == $row->password) {
          $_SESSION['email'] = $email;
          $_SESSION['teach_id'] = $row->id;
          $_SESSION['login'] = 1;
          // echo "login";
          header("location:dashboard.php");
        }
      }
    } else {
      $status .= "<div class='alert alert-danger'>Details Not Found!!!</div>";
    }
  }
}
$short_name = "select * from admin";
$sql5 = $pdo->prepare($short_name);
$sql5->execute();
$row5 = $sql5->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $row5['short_name'] ?> | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background: linear-gradient(90deg,rgba(0,0,0,0.2),rgba(0,0,0,0.7)),url(dist/img/class_img.jpg);background-size:cover;background-repeat:no-repeat;background-position:center;">

  <div class="login-box">
    <?php if (isset($status)) {
      echo $status;
    } ?>
    <!-- /.login-logo -->
    <!-- login box design -->
    <div class="card col-md-12 shadow" style="background-color: rgba(0,0,0,0.7);">
      <div class="card-header">
        <div class="" style="font-size: 28px;">
          <a href="" style="font-weight:bold;color:#fff;"><?= $row5['institute_name'] ?></a>
        </div>
      </div>
      <div class="card-body">
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="background-color: rgba(0,0,0,0.2);color:#fff;" placeholder="Username / Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" style="background-color: rgba(0,0,0,0.2);color:#fff;" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" checked>
                <label for="remember" class="text-light">
                  Remember Me
                </label>
              </div>
              <div class="">
                <a href="">Forgot Password</a>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
            </div>
            <div class="col-12">
              <p class="text-light">New to <?=$row5['institute_name']?> ? <a href="register.php">Create Account</a></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>