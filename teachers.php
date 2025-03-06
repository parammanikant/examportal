<?php
include('header.php');
include('navbar.php');
?>

<div class="row">
    <button class="bg-success w-25"> <a href="addTeachers.php" class="text-white"> +Add Teacher </a> </button>
</div>

<table id="teacherTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
        </tbody>
    </table>
<?php

include('footer.php');

?>