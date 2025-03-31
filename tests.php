<?php
include('header.php');
include('navbar.php');

$db = mysqli_connect('localhost','root','','ex_portal');

$tests = $db->query("SELECT * FROM tests INNER JOIN classes ON classes.class_id = tests.class_id");

?>

<a href="testadd.php"> <button class="bg-primary text-white"> Add Students </button></a>

<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Test Title</th>
                <th>Class</th>
                <th>Per Question Marks</th>
                <th>Negative Marks</th>
                <th>No. Of Total Questions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tests as $tst) {?>
            <tr>
                
                <td> <a href="questions.php?id=<?php echo $tst['test_id'];?>"><?php echo $tst['test_title'];?></a></td>
                <td> <?php echo $tst['class_name'];?></td>
                <td> <?php echo $tst['per_question_marks'];?></td>
                <td> <?php echo $tst['nagetive_marks'];?></td>
                <td> <?php echo $tst['no_of_questions'];?></td>

            </tr>
            <?php } ?>
    </tbody>
</table>

<?php include('footer.php'); ?>