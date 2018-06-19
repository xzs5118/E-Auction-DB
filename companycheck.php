<?php
session_start();
include_once("db.php");
$username=$_SESSION['username'];
$checksql="SELECT * FROM company where username='$username'";
$checkresult=mysqli_query($db,$checksql);
$checkrow=mysqli_fetch_array($checkresult);
if($checkrow==''){
		echo "<script>if(confirm('Company cannot buy products!')){document.location.href='singleitem.php?ID=$id'};</script>";
		} else {
	header("Location: profile_products.php")
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>