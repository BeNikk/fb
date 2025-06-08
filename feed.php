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
?>

<link rel="stylesheet" href="style.css">
<div class="header">MiniBook</div>
<div class="container">
  <h3>Hello, <?php echo $_SESSION["name"]; ?> | <a href="logout.php">Logout</a></h3>

  <form method="POST" action="post.php">
    <textarea name="content" placeholder="What's on your mind?" rows="3" required></textarea>
    <button type="submit">Post</button>
  </form>

  <h3>Recent Posts</h3>
  <?php
  $result = mysqli_query($conn, "SELECT posts.content, posts.created_at, users.name FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC");
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='post'><strong>" . $row["name"] . "</strong><br>" . $row["content"] . "<br><i>" . $row["created_at"] . "</i></div>";
  }
  ?>
</div>
