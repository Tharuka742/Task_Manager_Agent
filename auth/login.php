<?php
include "config/db.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($q->num_rows == 1){
        $user = $q->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard/dashboard.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<h2>Login</h2>
<form method="POST">
<input name="email" placeholder="Email"><br>
<input name="password" type="password" placeholder="Password"><br>
<button name="login">Login</button>
</form>
</body>
</html>
