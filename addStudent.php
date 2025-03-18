<?php
include('header.php');
include('navbar.php');

$db = mysqli_connect('localhost','root','','ex_portal');

$classes = $db->query("SELECT class_Id, class_name FROM classes WHERE class_status = 1");

if(!empty($_POST)) {
    $name = $_POST['student_name'];
    $email = $_POST['student_email'];

    $student_class = $_POST['student_class'];
    $phone = $_POST['student_phone'];

    $gender = $_POST['student_gender'];
    $father_name = $_POST['student_father'];

    $father_phone = $_POST['father_phone'];
    $address = $_POST['student_address'];

    $image = $_FILES['student_image'];

    $filename = '';

    if(!empty($image)){
        $filename = time().$image['name'];
        move_uploaded_file($image['tmp_name'], 'assets/images/'.$filename);
    }

    $db->query("INSERT INTO students (student_name,student_class,student_email,student_phone,student_gender,student_address,student_image,student_father,father_phone) VALUES('$name',$student_class,'$email','$phone','$gender','$address','$filename','$father_name','$father_phone')");

    header("location: students.php?msg=Student Added Successfully!");
}

?>

<form action="" method="POST" enctype="multipart/form-data">

  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Student Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="student_name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Student Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="student_email">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Student Class:</label>
    <select class="form-control" name="student_class">
        <option value=""> Select Class </option>
        <?php foreach($classes AS $cls) {?>

            <option value="<?php echo $cls['class_Id'];?>"><?php echo $cls['class_name'];?></option>

        <?php } ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Student Phone:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter Mobile No." name="student_phone">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Student Gender:</label>
    <select class="form-control" name="student_gender">
        <option value="Male"> Male </option>
        <option value="Female"> Female </option>
        <option value="Other"> Other </option>
    </select>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Student Father Name:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter Father Name" name="student_father">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Student Father Phone:</label>
    <input type="text" class="form-control" id="email" placeholder="Enter Father Phone No." name="father_phone">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Address:</label>
    <textarea class="form-control" id="email" name="student_address"></textarea>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Student Profile Pic.:</label>
    <input type="file" class="form-control" name="student_image" accept="image/*">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include('footer.php');?>