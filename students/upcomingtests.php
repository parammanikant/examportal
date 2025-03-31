<?php
session_start();
include('header.php');
include('navbar.php');
include('dbconnect.php');

$studentInfo = $_SESSION['studentData'];

$class_id = $studentInfo['student_class'];

$date = date('Y-m-d');

$tests = $conn->query("select * from tests WHERE class_id = $class_id AND test_date >= '$date'")

?>

<div class="list-group">
  <?php foreach($tests as $test) {?>
  <div class="list-group-item list-group-item-action" aria-current="true">
    <b><?php echo $test['test_title'];?></b>
    <b style="margin-left: 100px;"> <?php echo $test['test_start_time'];?> To <?php echo $test['test_end_time'];?></b>
    <a style="margin-left:90%;" class="btn btn-primary" href="quiz.php?test_id=<?php echo $test['test_id'];?>&qnum=1"> Attempt </a>
  </div>
  <?php
  }
  ?>
  
</div>

<?php
include('footer.php');?>