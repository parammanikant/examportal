<?php

$search = $_POST['searchtext'];

$db = mysqli_connect('localhost','root','','ex_portal');

$result = $db->query("SELECT * FROM classes JOIN teachers ON teachers.teacher_id = classes.class_teacher WHERE classes.class_name LIKE '%$search%' limit 5");

foreach($result AS $cls){ ?>

<tr>
                <td> <?php echo $cls['class_name'];?> </td>
                <td> <?php echo $cls['class_time'];?> </td>
                <td> <?php echo $cls['teacher_name'];?> </td>
                <td> <a href="editClass.php"> Edit </a> &nbsp; <a href="deleteClass.php"> Delete </a> </td>
            </tr>

<?php } ?>

