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

$questionDetail = mysqli_fetch_assoc($questionData);

$testDetail = $conn->query("select * from tests where test_id = $test_id");

$testData = mysqli_fetch_assoc($testDetail);

$etime = $testData['test_end_time'];

$exam_end_time = strtotime(date("Y-m-d $etime"));

?>

<script>
    function nextQuestion() {
        is_answered = 0;

        $(".answer-radio").each(function() {
            if($(this).is(':checked')) {
                is_answered = 1;

                let is_correct = 0;

                let marks = '<?php echo $testData['nagetive_marks'];?>';

                if($(this).val() == '<?php echo $questionDetail['answer'];?>'){
                    is_correct = 1;
                    marks = '<?php echo $testData['per_question_marks'];?>';
                }

               $.ajax({
                url : 'create_report.php',
                method : 'POST',
                data : {
                    student_id : '<?php echo $_SESSION['studentData']['student_id'];?>',
                    test_id : '<?php echo $questionDetail['test_id'];?>',
                    q_id : '<?php echo $questionDetail['q_id'];?>',
                    op1 : '<?php echo $questionDetail['op1'];?>',
                    op2 : '<?php echo $questionDetail['op2'];?>',
                    op3 : '<?php echo $questionDetail['op3'];?>',
                    op4 : '<?php echo $questionDetail['op4'];?>',
                    right_answer : '<?php echo $questionDetail['answer'];?>',
                    student_answered : `'${$(this).val()}'`,
                    is_correct_answer : is_correct,
                    question_title : '<?php echo $questionDetail['q_title'];?>',
                    obtained_marks : marks


                },
                success : function(response){
                    
                },
                error : function(error){
                    alert(error)
                }
               })
            }
        });

        if(is_answered == 0){
            alert("Please select answer from given options.");
        } else {
            let url = 'http://localhost/exportal/students/quiz.php?test_id=<?php echo $test_id;?>&qnum=<?php echo $qnum+1;?>';
            window.location.href = url;
        }

        
    }

    function skipQuestion(){
        let url = 'http://localhost/exportal/students/quiz.php?test_id=9&qnum=<?php echo $qnum+1;?>';
        window.location.href = url;
    }

    function timeOut(){

        let current_time = new Date().getTime();

        current_time = Math.floor(current_time/1000);

        let over_time = parseInt('<?php echo $exam_end_time;?>');

        console.log(current_time , over_time)

        if(current_time >= over_time){
           alert('Time Over');
           window.location.href = 'http://localhost/exportal/students/timeout.php?test_id=<?php echo $test_id;?>';
        }
        
    }

    setInterval(() => {
        timeOut();
    }, 5000);
    
</script>

<div class="row text-center">

<?php if(mysqli_num_rows($questionData) > 0) { ?>

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
                <input type="radio" class="answer-radio" name="answer" value="<?php echo $question['op1'];?>"> 
                 <?php echo $question['op1'];?>
                 </span>
            </div>

            <div class="col-md-6">
                 <span class="ms-5"> 
                    <input type="radio" class="answer-radio" name="answer" value="<?php echo $question['op2'];?>">
                    <?php echo $question['op2'];?>
                 </span>
            </div>

            <div class="col-md-6"> 
                <span class="ms-5"> 
                    <input type="radio" class="answer-radio" name="answer" value="<?php echo $question['op3'];?>">
                     <?php echo $question['op3'];?>
                     </span>
         </div>

            <div class="col-md-6">
                 <span class="ms-5">
                     <input type="radio" class="answer-radio" name="answer" value="<?php echo $question['op4'];?>">
                      <?php echo $question['op4'];?> 
                    </span>
            </div>
            <input type="hidden" id="correct_answer" value="<?php echo $question['answer'];?>">
            <input type="hidden" id="test_id" value="<?php echo $question['test_id'];?>">

            <input type="hidden" id="q_id" value="<?php echo $question['q_id'];?>">
        </div>
        <?php } ?>
        <div class="row mt-3">
        <div class="col-md-6">
            <button type="button" class="bg-danger rounded text-white" style="width:150px;" onclick="skipQuestion()"> Skip </button>
        </div>
        <div class="col-md-6">
            <button type="button" class="bg-primary rounded text-white" style="width:150px;" onclick="nextQuestion();"> Next </button>
        </div>
        </div>
        
    </div>
    
    <div class="col-md-3"></div>
</div>
<?php } else {
            
            include("report.php");
        } ?>
</div>


<?php include('footer.php');?>