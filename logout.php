<?php
session_start();

unset($_SESSION['is_login']);

header("location: index.php");