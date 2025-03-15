<?php

$search = $_POST['search_by'];

$db = mysqli_connect('localhost','root','','ex_portal');

$record = $db->query("SELECT * FROM classes INNER JOIN teachers ON teachers.teacher_id = classes.class_teacher WHERE class_name LIKE '%$search%'");

foreach($record as $data){ ?>

    <tr>
        <td> <?php echo $data['class_name']; ?></td>
        <td> <?php echo $data['class_time'];?> </td>
        <td> <?php echo $data['teacher_name'];?> </td>
        <td> </td>
    </tr>

<?php } ?>
