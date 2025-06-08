<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
$conn = mysqli_connect("localhost","root","","facegroup");
if(!$conn){
    die("Connection failed".mysqli_connect_error());
}

?>