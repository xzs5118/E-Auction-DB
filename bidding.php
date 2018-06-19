<?php
session_start();
include_once("db.php");
$id = $_GET['ID'];
$username=$_SESSION['username'];
$checksql="SELECT * FROM individual where username='$username'";
$checkresult=mysqli_query($db,$checksql);
$checkrow=mysqli_fetch_array($checkresult);
$checkseller="SELECT * FROM products where ID=$id";
$checksellerresult=mysqli_query($db,$checkseller);
$checksellerrow=mysqli_fetch_array($checksellerresult);
if($checkrow==''){
		echo "<script>if(confirm('Company cannot buy products!')){document.location.href='singleitem.php?ID=$id'};</script>";
		} 
elseif($username==$checksellerrow['username']){
			echo "<script>if(confirm('You cannot buy things you sell!')){document.location.href='singleitem.php?ID=$id'};</script>";
}
else {
$update="UPDATE products SET CurrentPrice=CurrentPrice*1.05 WHERE ID=$id";
$updatewinner="UPDATE products SET Currentwinner='$username' WHERE ID=$id";
$result=mysqli_query($db,$update);
$result2=mysqli_query($db,$updatewinner);
$productname=$checksellerrow['Name'];
$checkonce="SELECT * FROM bid";
$checkonceresult=mysqli_query($db,$checkonce);
$checkoncerow=mysqli_fetch_array($checkonceresult);
$newcheck=mysqli_query($db,$checkseller);
$newcheckrow=mysqli_fetch_array($newcheck);
$dupwinner=$newcheckrow['Currentwinner'];
$dupproduct=$checksellerrow['Name'];
$sql_fetch_dupwinner="SELECT * FROM bid where (bidder='$dupwinner' AND productname='$dupproduct')";
$query_dupwinner=mysqli_query($db,$sql_fetch_dupwinner);
if(mysqli_num_rows($query_dupwinner)>0)
{
	echo "<script>if(confirm('Bid Success!')){document.location.href='singleitem.php?ID=$id'};</script>";
} else {
	$addbid="INSERT into bid(productname,bidder) VALUES ('$productname','$username')";
	mysqli_query($db,$addbid);
	echo "<script>if(confirm('Thank you for bidding, you have already added into bidding system!')){document.location.href='singleitem.php?ID=$id'};</script>";
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