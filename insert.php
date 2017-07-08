<?php

$connect=mysqli_connect("localhost","root","","PHP_Task");

if(@$_POST['insertCat'])
{
if(empty($_POST['name']))
	    echo "<script>alert('empty Data'); window.location.replace(\"index.php\");</script>";
else 
{
	$name=$_POST['name'];
    $query = "insert into category values('','$name')"; 
    $result = mysqli_query($connect, $query);
    if($result)
    	echo "<script>alert('done'); window.location.replace(\"index.php\");</script>";
}
	
	
}

else if(@$_POST['insertPro']){

$proname=$_POST['name'];
$catID=$_POST['cat_id'];

if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
{
	   echo "<script>alert('empty Image'); window.location.replace(\"index.php\");</script>";
}
else{
$image=addslashes($_FILES['image']['tmp_name']);
$name=addslashes($_FILES['image']['name']);
$image=file_get_contents($image);
$image= base64_encode($image);

$query = "insert into sub_category values('','$proname','$image','$catID')"; 
    $result = mysqli_query($connect, $query);
    if($result)
    	echo "<script>alert('done'); window.location.replace(\"index.php\");</script>";
else 
	echo "<script>alert('Error'); window.location.replace(\"index.php\");</script>";

}
}
?>