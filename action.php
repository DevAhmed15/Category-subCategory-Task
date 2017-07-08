<?php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "PHP_Task");  
 if(isset($_POST["username"]))  
 {  
      $query = "  
      SELECT * FROM login  
      WHERE name = '".$_POST["username"]."'  
      AND password = '".$_POST["password"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['username'] = $_POST['username'];  
           echo 'Yes';  
      }  
      else  
      {  
           echo 'No';  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);  
 }  
 
 ?>  