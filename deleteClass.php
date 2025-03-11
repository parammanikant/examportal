<?php

$db = mysqli_connect('localhost','root','','ex_portal');

$cls_id = $_GET['id'];

$db->query("DELETE FROM classes WHERE class_Id = $cls_id");

header("location: classes.php");