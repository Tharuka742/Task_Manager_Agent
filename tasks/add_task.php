<?php
include "../config/db.php";
$title = $_POST['title'];
$due = $_POST['due_date'];
$uid = $_SESSION['user_id'];

$conn->query("INSERT INTO tasks(user_id,title,due_date) VALUES($uid,'$title','$due')");
header("Location: ../dashboard/dashboard.php");
