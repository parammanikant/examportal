<?php
include('header.php');
include('navbar.php');
?>

<?php
    if(!empty($_POST)){
        $name = $_POST['teacher_name'];
        $qlf = $_POST['teacher_qlf'];
        $mob = $_POST['teacher_contact'];

        //Image Upload

        $filename = $_FILES['teacher_pic'];

        if(empty($name)){
            $name_error = "Name Required!";
        } else if(strlen($name) < 2) {
            $name_error = "Must be 2 charctors required!";
        } else if(preg_match("/^[A-Za-z ]+$/", $name) == false){
            $name_error = "Only Alphabates are Allowed";
        }

        if(empty($qlf)) {
            $qlf_error = "Qualification is required!";
        }

        if(empty($mob)) {
            $mob_error = "Mobile No. Rrquired";
        } else if(is_numeric($mob) == false){
            $mob_error = "Only numbers are accepted!";
        } else if(strlen($mob) < 10 || strlen($mob) > 10){
            $mob_error = "Only 10 Digits Allowed";
        }

        if(empty($filename['name'])) {
            $file_error = "File Required!";
        }


        if(!isset($name_error) && !isset($qlf_error) && !isset($mob_error) && !isset($file_error)) {

            $file_name = $filename['name'];

            move_uploaded_file($filename['tmp_name'],'assets/images/'.$file_name);

            $db = mysqli_connect('localhost','root','','ex_portal');

            $db->query("INSERT INTO teachers (teacher_name,teacher_qlf,teacher_contact,teacher_image) VALUES ('$name','$qlf','$mob','$file_name')");

            header("location: teachers.php");
        }
    }
?>

<div class="row">

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Teacher Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="teacher_name">

        <div class="text-danger"> <?php if(!empty($name_error)) { echo $name_error; } ?>
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher Qualification</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="teacher_qlf">
        <div class="text-danger"><?php if(!empty($qlf_error)) { echo $qlf_error; } ?> </div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher Mobile No.</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="teacher_contact">

        <div class="text-danger"><?php if(!empty($mob_error)) { echo $mob_error; } ?> </div>
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher Image</label>
        <input type="file" class="form-control" id="exampleInputPassword1" name="teacher_pic">
        <div class="text-danger"><?php if(!empty($file_error)) { echo $file_error; } ?> </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php
include('footer.php');
?>