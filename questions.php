<?php
include('header.php');
include('navbar.php');

$db = mysqli_connect('localhost','root','','ex_portal');

$test_id = $_GET['id'];

if(!empty($_POST)){
    $q_title = $_POST['q_title'];
    $op1 = $_POST['op1'];
    $op2 = $_POST['op2'];
    $op3 = $_POST['op3'];
    $op4 = $_POST['op4'];

    $answer = $_POST['answer'];

    $db->query("INSERT INTO questions(q_title,test_id,op1,op2,op3,op4,answer) VALUES ('$q_title', $test_id, '$op1', '$op2', '$op3', '$op4', '$answer')");

}

$questions = $db->query("SELECT * FROM questions INNER JOIN tests ON tests.test_id = questions.test_id WHERE questions.test_id = $test_id");

?>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Questions
</button>

<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Question Title</th>
                <th>Test Title</th>
                <th>Option 1</th>
                <th>Option 2</th>
                <th>Option 3</th>
                <th>Option 4</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($questions as $ques) {?>
            <tr>
                <td> <?php echo $ques['q_title'];?></td>
                <td> <?php echo $ques['test_title'];?></td>
                <td> <?php echo $ques['op1'];?></td>
                <td> <?php echo $ques['op2'];?></td>
                <td> <?php echo $ques['op3'];?></td>
                <td> <?php echo $ques['op4'];?></td>
                <td> <?php echo $ques['answer'];?></td>

            </tr>
            <?php } ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Question Title</label>
    <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="q_title"></textarea>
    
  </div>
  

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Option 1</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="op1">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Option 2</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="op2">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Option 3</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="op3">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Option 4</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="op4">
    
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Corret Answer</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="answer">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Save</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<?php include('footer.php');?>