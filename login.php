<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($password, $user["password"])) {
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["name"] = $user["name"];
    header("Location: feed.php");
  } else {
    echo "<script>alert('Invalid login');</script>";
  }
}
?>

<link rel="stylesheet" href="style.css">
<div class="header">MiniBook</div>
<div class="container">
  <h2>Login</h2>
  <form method="POST">
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required>
    <button type="submit">Login</button>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
  </form>
</div>
