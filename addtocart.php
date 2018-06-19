<?php
	session_start();

	include("db.php");
	
	$username=$_SESSION['username'];
	$checksql="SELECT * FROM individual where username='$username'";
	$checkresult=mysqli_query($db,$checksql);
	$checkrow=mysqli_fetch_array($checkresult);
	if(!isset($_GET['ID'])){
		echo "Cannot get ID";
	} else{
		$id2=$_GET['ID'];
	}
	$checkseller="SELECT * FROM products where ID=$id2";
	$checksellerresult=mysqli_query($db,$checkseller);
	$checksellerrow=mysqli_fetch_array($checksellerresult);
		
	if($checkrow==''){
		echo "<script>if(confirm('Company cannot buy products!')){document.location.href='singleitem.php?ID=$id2'};</script>";
		} 
elseif($username==$checksellerrow['username']){
			echo "<script>if(confirm('You cannot buy things you sell!')){document.location.href='singleitem.php?ID=$id2'};</script>";
}
else {
	$sql="SELECT * FROM products where ID=$id2 LIMIT 1";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result);

	$owner=$_SESSION['username'];
	$productimage=$row['image'];
	$productname=$row['Name'];
	$price=$row['BuyPrice'];

	$sql_store="INSERT into checkout (owner, productimage, productname, price) VALUES ('$owner','$productimage','$productname','$price')";
	
	$result = mysqli_query($db, $sql_store);
		if($result){
			
			echo "<script>if(confirm('Success')){document.location.href='singleitem.php?ID=$id2'};</script>";
		} else {
			echo "<script>if(confirm('Cannot add to database')){document.location.href='index.php'};</script>";
			return;
		}
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