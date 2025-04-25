<?php
include('dbconnect.php');

$student_id = $_POST['student_id'];
$test_id = $_POST['test_id'];

$q_id = $_POST['q_id'];
$op1 = $_POST['op1'];

$op2 = $_POST['op2'];
$op3 = $_POST['op3'];

$op4 = $_POST['op4'];
$right_answer = $_POST['right_answer'];

$student_answered = $_POST['student_answered'];
$is_correct_answer = $_POST['is_correct_answer'];

$question_title = $_POST['question_title'];
$obtained_marks = $_POST['obtained_marks'];

$ifalreadyExist = $conn->query("select * from test_resports WHERE student_id = '$student_id' AND test_id = '$test_id' AND q_id = '$q_id'");

if(mysqli_num_rows($ifalreadyExist) > 0){

    $conn->query("UPDATE test_resports SET student_answered = $student_answered,is_correct_answer = '$is_correct_answer',obtaine_marks = '$obtained_marks' WHERE student_id = '$student_id' AND test_id = '$test_id' AND q_id = '$q_id'");

} else {
    $conn->query("INSERT INTO test_resports (student_id,test_id,q_id,op1,op2,op3,op4,right_answer,student_answered,is_correct_answer,question_title,obtaine_marks) VALUES('$student_id','$test_id','$q_id','$op1','$op2','$op3','$op4','$right_answer',$student_answered,'$is_correct_answer','$question_title','$obtained_marks')");
}



echo 'success';