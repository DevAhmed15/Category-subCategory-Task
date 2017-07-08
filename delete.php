<?php

  $id=$_GET['id'];

 $connect = mysqli_connect("localhost", "root", "", "PHP_Task");  
  
      $query = "delete from category where id='$id'";  
      $result = mysqli_query($connect, $query); 

 /* 	 $subID=$_SESSION['subID'];
  	 $catID=$_SESSION['catID'];
*/
	if($result){
  $url = "index.php"; 

header("Location:$url");
}
else echo "error";
?>
