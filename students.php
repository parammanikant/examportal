<?php
include('header.php');
include('navbar.php');

$db = mysqli_connect('localhost','root','','ex_portal');

$students = $db->query("SELECT * FROM students INNER JOIN classes ON classes.class_Id = students.student_class WHERE students.status = 1");

?>

<a href="addStudent.php"> <button class="bg-primary text-white"> Add Students </button></a>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Pic</th>
                <th>Name</th>
                <th>Email</th>
                <th>Class</th>
                <th>Gender</th>
                <th>Student Phone</th>
                <th>Address</th>
                <th>Father Name</th>
                <th>Father No.</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $std) {?>
            <tr>
                <td> <img src="assets/images/<?php echo $std['student_image'];?>" width="70px"> </td>
                <td> <?php echo $std['student_name'];?></td>
                <td> <?php echo $std['student_email'];?></td>
                <td> <?php echo $std['class_name'];?></td>
                <td> <?php echo $std['student_gender'];?></td>
                <td> <?php echo $std['student_phone'];?></td>
                <td> <?php echo $std['student_address'];?></td>
                <td> <?php echo $std['student_father'];?></td>
                <td> <?php echo $std['father_phone'];?></td>

            </tr>
            <?php } ?>
    </tbody>
</table>
<?php include('footer.php');?>
<script>
    new DataTable('#example');
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if(!empty($_GET['msg'])) {?>
<script>
   Swal.fire({
  title: "Student Added Successfully!",
  icon: "success",
  draggable: true
});
</script>
<?php } ?>