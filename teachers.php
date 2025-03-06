<?php
include('header.php');
include('navbar.php');
$db = mysqli_connect('localhost','root','','ex_portal');

$teachers = $db->query("SELECT * FROM teachers WHERE teacher_status = 1");

?>

<div class="row">
    <button class="bg-success w-25"> <a href="addTeachers.php" class="text-white"> +Add Teacher </a> </button>
</div>

<table id="teacherTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Qualification</th>
                <th>Mob. No.</th>
                <th>Registration Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($teachers AS $data) {?>
            <tr>
                <td><img src="assets/images/<?php echo $data['teacher_image'];?>" style="width:70px;"></td>
                <td><?php echo $data['teacher_name'];?></td>
                <td><?php echo $data['teacher_qlf'];?></td>
                <td><?php echo $data['teacher_contact'];?></td>
                <td><?php echo $data['teacher_reg_date'];?></td>
                <td><a href="editteacher.php?tid=<?php echo $data['teacher_id'];?>"><ion-icon name="create-outline" class="text-primary fs-4"></ion-icon> </a> &nbsp; <ion-icon name="close-circle-outline" class="text-danger fs-4" onclick="deleteTeacher(<?php echo $data['teacher_id'];?>)"></ion-icon></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php

include('footer.php');

?>