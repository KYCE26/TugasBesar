<?php
include "config.php";
session_start();
error_reporting(0);
if (isset($_SESSION['username'])) {
    header("location:index.html");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST["password"]);
    $sql = "SELECT * FROM users WHERE username='$username'AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("location:index.html");
    } else {
        echo "<script> alert('Ooopss ! username Atau Password Salah')</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            
                <form action="" method="POST" class="login-username">
                    <p style="font-size: 2rem; font-weight: 850;">Log in</p>
                    <input type="text" placeholder="username" name="username" value="<?php echo $username; ?>" required>
                    <input type="password" placeholder="password" name="password" value="<?php echo $_POST['$password']; ?>" required>
                    <button name="submit" class="btn">Log in</button>
                    <p class="login-register-text">Don't Have Account?
                        <a href="register.php">Register Now</a>
                    </p>
                </form>
            </form>
        </div>
    </div>
</body>

</html>