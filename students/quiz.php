<?php
session_start();
include('header.php');
include('navbar.php');
include('dbconnect.php');

$test_id = $_GET['test_id'];
$qnum = $_GET['qnum'];

$countofQ = $conn->query("select count(*) as total from questions where test_id = $test_id");

$totalQ = mysqli_fetch_assoc($countofQ);

$decrementedQnum = ($qnum > 0)? $qnum-1 : 0;

$questionData = $conn->query("select * from questions where test_id = $test_id limit $decrementedQnum,1");

?>

<div class="row text-center">

    <div class="col-md-3"></div>
    <div class="col-md-6 text-center">
        <div class="row justify-center fw-bold"> 
            Question <?php 
            if(!empty($qnum)) {
                 echo $qnum; } ?>/<?php if(!empty($totalQ['total'])) { echo $totalQ['total']; 
            } else { echo '0'; }?>
        </div>
        <div class="row border border-black" style="height:250px">

        <?php foreach($questionData as $question) {?>

        <div class="row justify-center mt-2"> <b><?php echo $question['q_title'];?></b> </div>

        <div class="row text-start justify-left">

            <div class="col-md-6"> <span class="ms-5"> 
                <input type="radio" name="answer" value="<?php echo $question['op1'];?>"> 
                 <?php echo $question['op1'];?>
                 </span>
            </div>

            <div class="col-md-6">
                 <span class="ms-5"> 
                    <input type="radio" name="answer" value="<?php echo $question['op2'];?>">
                    <?php echo $question['op2'];?>
                 </span>
            </div>

            <div class="col-md-6"> 
                <span class="ms-5"> 
                    <input type="radio" name="answer" value="<?php echo $question['op3'];?>">
                     <?php echo $question['op3'];?>
                     </span>
         </div>

            <div class="col-md-6">
                 <span class="ms-5">
                     <input type="radio" name="answer" value="<?php echo $question['op4'];?>">
                      <?php echo $question['op4'];?> 
                    </span>
            </div>
        </div>
        <?php } ?>
        <div class="row mt-3">
        <div class="col-md-6">
            <button type="button" class="bg-danger rounded text-white" style="width:150px;"> Skip </button>
        </div>
        <div class="col-md-6">
            <button type="button" class="bg-primary rounded text-white" style="width:150px;"> Next </button>
        </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
</div>


<?php include('footer.php');?>