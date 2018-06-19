<?php
session_start();
include_once("db.php");
	$id2=$_GET['ID'];
	$sql="SELECT * FROM products where ID=$id2 LIMIT 1";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result);

	$winner=$row['Currentwinner'];
	$username=$_SESSION['username'];
	if($username==$winner){
	$productimage=$row['image'];
	$productname=$row['Name'];
	$price=$row['CurrentPrice'];

	$sql_store="INSERT into checkout (owner, productimage, productname, price) VALUES ('$winner','$productimage','$productname','$price')";
	mysqli_query($db,$sql_store);
	echo "<script>if(confirm('Add to cart successful!')){document.location.href='checkout.php'};</script>";
	} else {
		echo "<script>if(confirm('You are not the winner!')){document.location.href='singleitem.php?ID=$id2'};</script>";
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