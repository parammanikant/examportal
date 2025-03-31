<?php
session_start();
include('header.php');

include('dbconnect.php');

if(!empty($_POST)){
    $email_or_phone = $_POST['username'];
    $pass = md5($_POST['student_pass']);

    $result = $conn->query("select * from students where (student_email = '$email_or_phone' OR student_phone = '$email_or_phone') AND student_pass = '$pass'");

    if($result->num_rows > 0){

        $_SESSION['studentData'] = mysqli_fetch_assoc($result);

        header("location: profile.php");

    } else {
        $error = "Invalid Credetials";
    }
}

?>

<div class="row">
    <div class="col-md-4 col-2"></div>
    <div class="col-md-4 col-8">

    <div class="text-danger"> <?php if(isset($error)) { echo $error; }?></div>
        
        <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Student Email/Phone</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
            
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="student_pass">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        </form>
  </div>
<div class="col-md-4 col-2"></div>
</div>

<?php
include('footer.php');