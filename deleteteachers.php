<?php
$db = mysqli_connect('localhost','root','','ex_portal');

$teachrid = $_POST['tid'];

$db->query("DELETE FROM teachers WHERE teacher_id = $teachrid");

echo 'Success';