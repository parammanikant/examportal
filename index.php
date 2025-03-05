<?php include('header.php');?>
<?php
session_start();

if(!empty($_SESSION['is_login'])) {
    header("location: dashboard.php");
}

  if(!empty($_POST)) {

    $db = mysqli_connect('localhost','root','','ex_portal');

    $uname = $_POST['username'];
    $pass = md5($_POST['userpass']);

    if(!empty($uname) && !empty($pass)){

        $result = $db->query("SELECT * FROM admin WHERE  (admin_email = '$uname' OR admin_phone = '$uname') AND admin_pass = '$pass'");

        if(mysqli_num_rows($result) > 0){

            $_SESSION['is_login'] = 1;
            
            header("location: dashboard.php");

        } else {
            $message =  'Login Failed!';
        }

    } else {
           $message = "Username & Password Required!";
    }
    
  }
?>
<div class="row">
    <div class="col-md-4 col-2"></div>
    <div class="col-md-4 col-8">
        <div class="text-danger"> <?php if(!empty($message)) { echo $message; } ?></div>
        <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
            
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="userpass">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
  </div>
<div class="col-md-4 col-2"></div>
</div>
<?php include('footer.php');?>