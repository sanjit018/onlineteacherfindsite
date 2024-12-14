<?php
include 'include/config.php';
session_start();
if(isset($_SESSION['login']))
{
  header("location:dashboard.php");
}
// Example usage
$status = '';
if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $learn = $_POST['learn'];
    $charge = $_POST['charge'];
    $password = md5($_POST['password']);
    $image = $_FILES['image']['name'];
  if(empty($name) || empty($email) || empty($mobile) || empty($learn) || empty($charge || empty($password)))
  {
    $status.=status('error','Please Fill All Fields');
  }else{
    $select=$pdo->prepare("select * from teacher where email='$email' or contact='$mobile'");
    $select->execute();
    if($select->rowCount()>0)
    {
        $status.=status("error","Email or Contact already exist");
    }else{
        $directory="uploads/";
        $img=$directory.uniqid().".png";
        if($_FILES['image']['size']<=20000)
        {
            move_uploaded_file($_FILES['image']['tmp_name'],$img);
            $sql=$pdo->prepare("insert into teacher(name,email,contact,learn,charge,image,password)values('$name','$email','$mobile','$learn','$charge','$img','$password')");
            $sql->execute();
            $status.=status('success','Your registration successfull');
        }else{
            $status.=status("error","Photo size must be in 20kb");
        }
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
  <title><?= $row5['short_name'] ?> | Sign up</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color: rgba(0,0,0,0.8);">
    
    <div class="container col-md-8 my-3">
        <?php if (isset($status)) {
      echo $status;
    } ?>
        <div class="card shadow ">
            <div class="card-header">
                <h2 class="text-center text-primary">Registration</h2>
            </div>
            <div class="card-body container col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group py-1">
                        <div class="row">
                            <div class="col-sm-4">
                                Name : 
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="row">
                            <div class="col-sm-4">
                                Email : 
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="row">
                            <div class="col-sm-4">
                                Contact : 
                            </div>
                            <div class="col-sm-8">
                                <input type="number" name="mobile" class="form-control" min="1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="row">
                            <div class="col-sm-4">
                                Password : 
                            </div>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="row">
                            <div class="col-sm-4">
                                Learn About : 
                            </div>
                            <div class="col-sm-8">
                                <select name="learn" class="form-control" id="">
                                    <option value="Web Design">Web Design</option>
                                    <option value="Graphic Design">Graphic Design</option>
                                    <option value="Python">Python</option>
                                    <option value="C / C++">C / C++</option>
                                    <option value="Data Structure">Data Structure</option>
                                    <option value="Java">Java</option>
                                    <option value="Node Js">Node Js</option>
                                    <option value="React Js">React Js</option>
                                    <option value="Wordpress">Wordpress</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="row">
                            <div class="col-sm-4">
                                Charges : 
                            </div>
                            <div class="col-sm-8">
                                <input type="number" name="charge" min="1" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="row">
                            <div class="col-sm-4">
                                Image : 
                            </div>
                            <div class="col-sm-8">
                                <input type="file" name="image" class="form-control" accept=".png,.jpg,.jpeg">
                            </div>
                        </div>
                    </div>
                    <div class="form-group py-1">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- Charges :  -->
                            </div>
                            <div class="col-sm-8">
                                <input type="submit" name="submit" value="SIGN UP" class="btn btn-info col-12">
                            </div>
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