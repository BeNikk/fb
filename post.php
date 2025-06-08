<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
session_start();
include 'db.php';

if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $content = $_POST["content"];
  $userId = $_SESSION["user_id"];
  mysqli_query($conn, "INSERT INTO posts (user_id, content) VALUES ('$userId', '$content')");
  header("Location: feed.php");
}
?>
