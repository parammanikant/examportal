<?php
session_start();
include('header.php');
include('navbar.php');
include('dbconnect.php');

$stid = $_SESSION['studentData']['student_id'];

$response = $conn->query("select * from results JOIN tests ON tests.test_id = results.test_id where student_id = $stid");

?>

<table class="table table-responsive w-100 table-bordered text-center">
    <thead>
        <th> Test Title </th>
        <th> Maximum Marks </th>
        <th> Obtained Marks </th>
        <th> Action </th>
    </thead>
    <tbody>

    <?php

foreach($response AS $results){ ?>

<tr>
    <td> <?php echo $results['test_title'];?> </td>
    <td> <?php echo $results['total_test_marks'];?> </td>
    <td> <?php echo $results['obtained_marks'];?> </td>
    <td> <a href="resultsummary.php?test_id=<?php echo $results['test_id'];?>&student_id=<?php echo $results['student_id'];?>"> View Result Summary </a> </td>
</tr>

<?php

}

?>

</tbody>
</table>

<?php

include('footer.php');