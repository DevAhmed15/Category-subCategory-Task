 <?php   
 session_start();  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Welcome</title>  
           <script src="js/jquery.js"></script>  
           <link rel="stylesheet" href="css/bootstrap.css" />  
           <script src="js/bootstrap.js"></script>  
      </head>  
      <body style="background-image: url('1.jpg');">  
           <br />  
           <div class="container">  
                 <?php if(!isset($_SESSION['username'])){
                 	?>
                 <h3 align="center">Login Form</h3><br /> 
                <?php } ?>
                <br />  
                <?php  
                if(isset($_SESSION['username']))  
                {  
                ?>  
                <h3 align="center" style="border: 3px solid #ccc;padding: 20px;">Control Page</h3><br /> 
                <div align="center">  
                     <h1 style="border: 1px solid #ccc">Welcome - <?php echo $_SESSION['username']; ?></h1><br />  
                     <h1> Products </h1><br /><br />
				 <?php include('categories.php'); ?> 
                    <br /><br /><br /><br /> <a href="#" id="logout" style="font-size: 20px;color: #000">Logout</a>  
                </div>  
                <?php  
                }  
                else  
                {  
                ?>  
                <div align="center">  
                     <button type="button" name="login" id="login" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login</button>  
                </div>  
                <?php  
                }  
                ?>  
           </div>  
           <br />  
      </body>  
 </html>  
 <div id="loginModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Login</h4>  
                </div>  
                <div class="modal-body">  
                     <label>Username</label>  
                     <input type="text" name="username" id="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" id="password" class="form-control" />  
                     <br />  
                     <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#login_button').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           if(username != '' && password != '')  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     data: {username:username, password:password},  
                     success:function(data)  
                     {
                        if(data == 'No')  
                          {  
                               alert("Wrong Data");  
                          }  
                          else  
                          {  
                               $('#loginModal').hide();  
                               location.reload();  
                          }  
                     }  
                });  
           }  
           else  
           {  
                alert("Both Fields are required");  
           }  
      });  
      $('#logout').click(function(){  
           var action = "logout";  
           $.ajax({  
                url:"action.php",  
                method:"POST",  
                data:{action:action},  
                success:function()  
                {  
                     location.reload();  
                }  
           });  
      });  
 });  
 </script>
 <!-- 

 <td><a href="edit.php?id=<?php echo $row['cust_id']?>"><img src="../13.jpg" class="im" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="delete.php?id=<?php echo $row['cust_id']?>" onclick="return confirm('Are you sure ?!.')"> <img src="../11.png" class="im" /></a>
</td>

-->