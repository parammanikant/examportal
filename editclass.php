<?php
$id = $_REQUEST['id'];
include('header.php');
include('navbar.php');
$db = mysqli_connect('localhost','root','','ex_portal');

$teachers = $db->query("SELECT teacher_id, teacher_name FROM teachers WHERE teacher_status = 1");

$classes = $db->query("SELECT * FROM classes WHERE class_Id = $id");

if(!empty($_POST)) {
    $name = $_POST['class_name'];
    $teacher = $_POST['class_teacher'];
    $time = $_POST['class_time'];

    $db->query("UPDATE classes SET class_name = '$name', class_teacher = $teacher, class_time = '$time' WHERE class_Id = $id");

    header("location: classes.php");

}

?>

<div class="row">

    <?php foreach($classes as $cls) {?>

    <form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="class_name" value="<?php echo $cls['class_name'];?>">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Class Time</label>
        <input type="time" class="form-control" id="exampleInputPassword1" name="class_time" value="<?= $cls['class_time'];?>">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher</label>
        <select name="class_teacher" class="form-control">
            <option value=""> Select Teacher </option>
            <?php foreach($teachers AS $data) {?>

                <option value="<?php echo $data['teacher_id'];?>" <?php if($data['teacher_id'] == $cls['class_teacher']){ echo 'selected'; }?>> <?php echo $data['teacher_name'];?> </option>

            <?php } ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php } ?>

</div>


<?php
include('footer.php');
?>