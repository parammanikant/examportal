<?php
include('header.php');
include('navbar.php');

$db = mysqli_connect('localhost','root','','ex_portal');

$classes = $db->query("select class_Id, class_name from classes");

if(!empty($_POST)){

    $test_title = $_POST['test_title'];
    $class_id = $_POST['class_id'];
    $nagative_marks = $_POST['nagative_marks'];
    $per_question_marks = $_POST['per_question_marks'];
    $no_of_questions = $_POST['no_of_questions'];

    $test_date = $_POST['test_date'];


    $start_time = $_POST['test_start_time'];
    $end_time = $_POST['test_end_time'];

    $db->query("INSERT INTO tests (test_title,class_id,nagetive_marks,per_question_marks,no_of_questions,test_date,test_start_time,test_end_time) VALUES('$test_title',$class_id,$nagative_marks,$per_question_marks,$no_of_questions,'$test_date','$start_time','$end_time')");

}

?>

<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Test Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="test_title">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Class</label>
    <select class="form-control" name="class_id">
        <option value=""> Select Class </option>
        <?php foreach($classes as $cls) {?>

            <option value="<?php echo $cls['class_Id'];?>"><?php echo $cls['class_name'];?></option>

        <?php } ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Negative Marks</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nagative_marks" step="0.01">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Per Question Marks</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="per_question_marks" step="0.01">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">No. Of Total Questions</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="no_of_questions">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Exam Date</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="test_date">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Start Time</label>
    <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="test_start_time">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">End Time</label>
    <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="test_end_time">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php include('footer.php'); ?>