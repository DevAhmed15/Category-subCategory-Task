<?php

  $id=$_GET['id'];

 $connect = mysqli_connect("localhost", "root", "", "PHP_Task");  
  
      $query = "delete from sub_category where id='$id'";  
      $result = mysqli_query($connect, $query); 

	if($result){
  $url = "index.php"; 

header("Location:$url");
}
else echo "error";
?>
