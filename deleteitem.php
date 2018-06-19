<?php
session_start();
include_once("db.php");
$id = $_GET['id'];
$sql="DELETE from checkout where id=$id";
$result=mysqli_query($db,$sql);
if($result){
echo "<script>if(confirm('Delete Success!')){document.location.href='checkout.php'};</script>";
} else {
	echo "<script>if(confirm('Failed!')){document.location.href='checkout.php'};</script>";
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