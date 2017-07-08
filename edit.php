 <?php

  $connect = mysqli_connect("localhost", "root", "", "PHP_Task");  
 if(@$_POST['submit'] && isset($_GET['id']))    
 {
   $id=$_GET['id'];  
      $query = "update category set name='".$_POST["name"]."' where id='$id'";  
      $result = mysqli_query($connect, $query); 

	if($result){
echo "<script>alert('Category Updated'); window.location.replace(\"index.php\");</script>";
}
else echo "error";  
 }
 else echo "error";
  ?>