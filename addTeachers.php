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

        $file_name = $filename['name'];

        move_uploaded_file($filename['tmp_name'],'assets/images/'.$file_name);

        if(empty($name)){
            $name_error = "Name Required!";
        } else if(strlen($name) < 2) {
            $name_error = "Must be 2 charctors required!";
        } else if(preg_match('/[^a-z0-9 _]+/i', $name) === false){
            $name_error = "Only Alphabates are Allowed";
        }


        if(!isset($name_error)) {
            $db = mysqli_connect('localhost','root','','ex_portal');

            $db->query("INSERT INTO teachers (teacher_name,teacher_qlf,teacher_contact,teacher_image) VALUES ('$name','$qlf','$mob','$file_name')");
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
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher Mobile No.</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="teacher_contact">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher Image</label>
        <input type="file" class="form-control" id="exampleInputPassword1" name="teacher_pic">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<?php
include('footer.php');
?>