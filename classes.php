<style>
    .align-right{
        display: flex;
        justify-content : right !important;
        align-items : right !important;
    }
</style>
<?php
include('header.php');
include('navbar.php');
$db = mysqli_connect('localhost','root','','ex_portal');

if(isset($_REQUEST['pageno'])) {
    $pageno = $_REQUEST['pageno'];
}


if(empty($pageno)) {
    $pageno = 0;
} else {
    $pageno--;
}

$ofset = 5 * $pageno;

$result = $db->query("SELECT classes.class_Id,classes.class_name, classes.class_time,teachers.teacher_name from classes INNER JOIN teachers ON teachers.teacher_id = classes.class_teacher WHERE classes.class_status = 1 limit 5 OFFSET $ofset");

$total_record = $db->query("SELECT count(*) as total from classes");

foreach($total_record as $recors){
    $total_no_record = $recors['total'];
}

?>

<div class="row">
    <a href="addclass.php"><button class="btn btn-success w-25"> +Add Classes </button></a>
</div>

<div class="row">

<div class="row">
    <div class="w-25" style="position:relative; left:70%;">
        <input type="text" class="form-control border-5 border-black" placeholder="Seach Here" onkeyup="searchClasses(this.value)">
    </div>
</div>

    <table class="table table-responsive table-striped text-center">

        <thead>
            <th> Class Title </th>
            <th> Class Time </th>
            <th> Teacher </th>
            <th> Action </th>
        </thead>

        <tbody id="dybnamic-rows">

        <?php foreach($result AS $cls) {?>
            <tr>
                <td> <?php echo $cls['class_name'];?> </td>
                <td> <?php echo $cls['class_time'];?> </td>
                <td> <?php echo $cls['teacher_name'];?> </td>
                <td> <a href="editClass.php?id=<?php echo $cls['class_Id'];?>"> Edit </a> &nbsp; <a onclick="deleteClass(<?php echo $cls['class_Id']; ?>)"> Delete </a> </td>
            </tr>
            <?php } ?>

        </tbody>

    </table>

    <div class="row ">
    <nav class="align-right" aria-label="...">

    <?php if(!empty($total_no_record) && $total_no_record > 0) {?>
  <ul class="pagination">
    <?php
    
    $totalpage = ceil($total_no_record / 5);
    
    for($i=1; $i<=$totalpage; $i++) {?>
    
    <li class="page-item"><a class="page-link" href="classes.php?pageno=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php } ?>
  </ul>
  <?php } ?>
</nav>
    </div>

</div>

<?php
include('footer.php');
?>