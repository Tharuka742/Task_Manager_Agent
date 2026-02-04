<?php
include "config/db.php";

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users(name,email,password) VALUES('$name','$email','$password')");
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Register</h2>
<form method="POST">
<input name="name" placeholder="Name"><br>
<input name="email" placeholder="Email"><br>
<input name="password" type="password" placeholder="Password"><br>
<button name="register">Register</button>
</form>
</body>
</html>
