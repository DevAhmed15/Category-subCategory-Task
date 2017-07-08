 <?php

  $connect = mysqli_connect("localhost", "root", "", "PHP_Task");  
 if(@$_POST['submit'] && isset($_GET['id']))    
 {
   $id=$_GET['id'];  

	if(@$_FILES['EditImage']['size'] == 0)
{
      $query = "update sub_category set name='".$_POST["ProductName"]."' where id='$id'";  
      $result = mysqli_query($connect, $query); 

	if($result)
      echo "<script>alert('Product Name Updated'); window.location.replace(\"index.php\");</script>";
    else echo "error1";
}


    else{	
		$image=addslashes($_FILES['EditImage']['tmp_name']);
		$name=addslashes($_FILES['EditImage']['name']);
		$image=file_get_contents($image);
		$image= base64_encode($image);

		      $query = "update sub_category set name='".$_POST["ProductName"]."',image='$image' where id='$id'";  
		      $result = mysqli_query($connect, $query); 

			if($result)
		echo "<script>alert('Product Updated'); window.location.replace(\"index.php\");</script>";
		else echo "error2";  
		 }
}
  ?>