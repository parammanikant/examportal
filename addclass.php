<?php
include('header.php');
include('navbar.php');
$db = mysqli_connect('localhost','root','','ex_portal');

$teachers = $db->query("SELECT teacher_id, teacher_name FROM teachers WHERE teacher_status = 1");

if(!empty($_POST)) {
    $name = $_POST['class_name'];
    $teacher = $_POST['class_teacher'];
    $time = $_POST['class_time'];

    $db->query("INSERT INTO classes (class_name,class_teacher,class_time) VALUES ('$name',$teacher,'$time')");

    header("location: classes.php");

}

?>

<div class="row">

    <form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="class_name">
        
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Class Time</label>
        <input type="time" class="form-control" id="exampleInputPassword1" name="class_time">
    </div>

    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Teacher</label>
        <select name="class_teacher" class="form-control">
            <option value=""> Select Teacher </option>
            <?php foreach($teachers AS $data) {?>

                <option value="<?php echo $data['teacher_id'];?>"> <?php echo $data['teacher_name'];?>

            <?php } ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>


<?php
include('footer.php');
?>