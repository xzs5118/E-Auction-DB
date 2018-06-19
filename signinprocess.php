<?php
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
 //Define $username and $password
 $username=$_POST['username'];
 $password=$_POST['password'];
 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
 $conn = mysqli_connect("localhost", "root", "");
 //Selecting Database
 $db = mysqli_select_db($conn, "eAuction");
 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM users WHERE password='$password' AND username='$username'");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){
 header("Location: index.php"); // Redirecting to other page
 }
 else
 {
	echo "<script>if(confirm('Username or Password is incorrect')){document.location.href='signin.php'};</script>";
 }
 mysqli_close($conn); // Closing connection
 }

 
?>
