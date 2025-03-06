<?php
include("header.php");
include("navbar.php");

$teacherId = $_REQUEST['tid'];
$db = mysqli_connect('localhost','root','','ex_portal');

$record = $db->query("SELECT * FROM teachers WHERE teacher_id = $teacherId");

if(!empty($_POST)){
    $teachername = $_POST['teacher_name'];
    $teacherQlf = $_POST['teacher_qlf'];
    $mob = $_POST['teacher_contact'];

    $filename = $_FILES['teacher_pic'];

    if(!empty($filename['name']))  {

        $file_name = $filename['name'];

        move_uploaded_file($filename['tmp_name'], "assets/images/".$file_name);

        $db->query("UPDATE teachers SET teacher_image = '$file_name' WHERE teacher_id = $teacherId");
    }

    $db->query("UPDATE teachers SET teacher_name = '$teachername', teacher_qlf = '$teacherQlf', teacher_contact = '$mob'  WHERE teacher_id = $teacherId");

    header("location: teachers.php");
}

?>

<div class="row">

<?php foreach($record AS $teacher) {?>

    <form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Teacher Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="teacher_name" value="<?php echo $teacher['teacher_name'];?>">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher Qualification</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="teacher_qlf" value="<?php echo $teacher['teacher_qlf'];?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher Mobile No.</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="teacher_contact" value="<?php echo $teacher['teacher_contact'];?>">
    </div>

    <div class="mb-3">
        <img src="assets/images/<?php echo $teacher['teacher_image'];?>" style="width:150px;">
        <label for="exampleInputPassword1" class="form-label">Teacher Image</label>
        <input type="file" class="form-control" id="exampleInputPassword1" name="teacher_pic">
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
<?php } ?>

</div>

<?php
include('footer.php');
?>