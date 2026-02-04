<?php
include "../config/db.php";
if(!isset($_SESSION['user_id'])) header("Location: ../login.php");

$uid = $_SESSION['user_id'];
$tasks = $conn->query("SELECT * FROM tasks WHERE user_id=$uid");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="sidebar">
<h3>Agent</h3>
<a href="#">Dashboard</a>
<a href="#">My Tasks</a>
<a href="../logout.php">Logout</a>
</div>

<div class="main">
<h2>WELCOME</h2>

<form action="../tasks/add_task.php" method="POST">
<input name="title" placeholder="Task title">
<input type="date" name="due_date">
<button>Add Task</button>
</form>

<ul>
<?php while($t = $tasks->fetch_assoc()): ?>
<li>
<?= $t['title'] ?> - <?= $t['status'] ?>
<a href="../tasks/delete_task.php?id=<?= $t['id'] ?>">❌</a>
</li>
<?php endwhile; ?>
</ul>

</div>
</body>
</html>
