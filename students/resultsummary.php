<?php
include('header.php');
include('navbar.php');
include('dbconnect.php');
$stid = $_REQUEST['student_id'];
$test_id = $_REQUEST['test_id'];

include('dbconnect.php');

$reportData = $conn->query("select * from test_resports WHERE test_id = $test_id AND student_id = $stid");

$testData = $conn->query("select * from tests WHERE test_id = $test_id");

$testInfo = mysqli_fetch_assoc($testData);

$totalTestMarks = $testInfo['no_of_questions'] * $testInfo['per_question_marks'];

$student_marks = 0;
?>

<table class="table table-responsive w-100 table-bordered">
    <thead>
        <th> Question Title </th>
        <th> Correct Answer </th>
        <th> Attemped Answer </th>
        <th> Obtained Marks </th>
    </thead>
    <tbody>

    <?php foreach($reportData AS $report) {?>

        <tr>
            <td> <?php echo $report['question_title'];?> </td>
            <td> <?php echo $report['right_answer'];?> </td>
            <td style="background-color:<?php if($report['is_correct_answer'] == 1) { echo '#66de47'; } else { echo '#ff5b3c'; }?>;"> <b><?php echo $report['student_answered'];?> </b></td>
            <td> <b> <?php if($report['is_correct_answer'] == 1) { echo $report['obtaine_marks']; } else { echo '-'.$report['obtaine_marks'];}?> </b></td>
        </tr>

    <?php 

        if($report['is_correct_answer'] == 1) {
        $student_marks = $student_marks + $report['obtaine_marks'];
        } else {
            $student_marks = $student_marks - $report['obtaine_marks'];
        } 

    } ?>

    </tbody>
</table>
<div class="row text-end">
    <b class="bg-primary" style="margin-left: 80%; width: 20%;"> Total Obtained Marks : <?php echo $student_marks;?> / <?php echo $totalTestMarks;?> </b>
</div>

<?php include('footer.php');