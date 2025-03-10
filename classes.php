<?php
include('header.php');
include('navbar.php');
$db = mysqli_connect('localhost','root','','ex_portal');

$result = $db->query("SELECT classes.class_id,classes.class_name, classes.class_time,teachers.teacher_name from classes INNER JOIN teachers ON teachers.teacher_id = classes.class_teacher WHERE classes.class_status = 1 limit 5");

?>

<div class="row">
    <a href="addclass.php"><button class="btn btn-success w-25"> +Add Classes </button></a>
</div>

<div class="row">

<div class="row">
    <div class="w-25" style="position:relative; left:70%;">
        <input type="text" class="form-control border-5 border-black searchclassinput" placeholder="Seach Here" onkeyup="searchClasses()">
    </div>
</div>

    <table class="table table-responsive table-striped text-center">

        <thead>
            <th> Class Title </th>
            <th> Class Time </th>
            <th> Teacher </th>
            <th> Action </th>
        </thead>

        <tbody id="dybnamic-rows">

        <?php foreach($result AS $cls) {?>
            <tr>
                <td> <?php echo $cls['class_name'];?> </td>
                <td> <?php echo $cls['class_time'];?> </td>
                <td> <?php echo $cls['teacher_name'];?> </td>
                <td> <a href="editClass.php"> Edit </a> &nbsp; <a href="deleteClass.php"> Delete </a> </td>
            </tr>
            <?php } ?>

        </tbody>

    </table>

</div>

<?php
include('footer.php');
?>