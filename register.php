<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Registered! Redirecting to login'); window.location='login.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<link rel="stylesheet" href="style.css">
<div class="header">MiniBook</div>
<div class="container">
  <h2>Create Account</h2>
  <form method="POST">
    Name: <input type="text" name="name" required>
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required>
    <button type="submit">Register</button>
    <p>Already have an account? <a href="login.php">Login here</a></p>
  </form>
</div>
