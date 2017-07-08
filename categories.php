<?php  
 //session_start();  
 $connect = mysqli_connect("localhost", "root", "", "PHP_Task");  
  
      $query = "SELECT * FROM category";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      { 
      while ($row=mysqli_fetch_assoc($result)) {
      $id=$row['id'];
      $_SESSION['catID']=$id;
?>
<div class="container">
 <div class="row">
  <div class="col-xs-12">
    <div class="thumbnail">
      <div class="caption">
        <h3 style="float: left;"><?php echo $row['name']; ?></h3><br /><br /><br /><br />
        <?php      
         $query2 = "SELECT * FROM sub_category WHERE cat_id='$id'";  
         $result2 = mysqli_query($connect, $query2);  
      if(mysqli_num_rows($result2) > 0)  
      { echo "<div class='row'>";
      while ($row2=mysqli_fetch_assoc($result2)) {
      	$id2=$row2['id'];
      	$_SESSION['subID']=$id2;
        ?>
  
  <div class="col-xs-6">
    <div class="thumbnail">
     <?php echo '<img style="width:250px;height:250px" src="data:image;base64,'.$row2['image'] .'"/>'; ?>
      <div class="caption">
        <h3><?php echo $row2['name']; ?></h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProModel-<?php echo $row2['id'];?>">Edit Product</button>
         <a href="delete2.php?id=<?php echo $row2['id']?>" onclick="return confirm('Are you sure ?!.')" class="btn btn-danger" role="button">Delete Product</a>
      </div>
    </div>
    </div>

 <div class="modal fade" id="editProModel-<?php echo $row2['id'];?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Product</h4>
      </div>
      <form method="POST" action="edit2.php?id=<?php echo $row2['id']?>" enctype="multipart/form-data">
      <div class="modal-body">
         <label>Product New Name</label>  
    <input type="text" name="ProductName" class="form-control" value="<?php echo $row2['name'];?>" required="required"/>  
    <br />  
        <label>Image</label>  
        <input type="file" name="EditImage" class="form-control"/>  
        <br /> 
      <div class="modal-footer">
        <input type="submit" name="submit" value="Save changes" class="btn btn-primary" />
      </div>
      </div>
      </form>
    </div>
  </div>
</div>

<?php }} echo "</div>" ?>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModel-<?php echo $row['id'];?>">Edit category</button>
           <a href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure ?!.')" class="btn btn-danger" role="button">Delete Category</a>

<div class="modal fade" id="editModel-<?php echo $row['id'];?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >Edit Product</h4>
      </div>
      <form method="POST" action="edit.php?id=<?php echo $row['id']?>">
      <div class="modal-body">
         <label for="nam">Category New Name</label>  
    <input type="text" name="name" id="nam-<?php echo $row['id'];?>" class="form-control" value="<?php echo $row['name'];?>" required="required"/>  
    <br />                  
      <div class="modal-footer">
         <input type="submit" name="submit" value="Save changes" class="btn btn-primary" />
  </div>
     </div>
      </form>
    </div>
  </div>
</div>


      </div>
    </div>
  </div>
</div>
<?php
}
}

 ?>
 <button type="button" name="category" id="category" class="btn btn-warning" data-toggle="modal" data-target="#catModal">New Category</button> 
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#proModal">New Product</button>

 <div id="catModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">New Category</h4>  
                </div>  
                <div class="modal-body">  
                     <form action="insert.php" method="post" >  
                          <label>Category Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <input type="submit" name="insertCat" value="Add Category" class="btn btn-success" />  
                     </form>  
                </div>  
           </div>  
      </div>  
 </div>


 <div id="proModal" class="modal fade" role="dialog">  
      <div class="modal-dialog">  
   <!-- Modal content-->  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">New Product</h4>  
                </div>  
                <div class="modal-body">  
                     <form action="insert.php" method="post" enctype="multipart/form-data">  
                          <label>Product Name</label>  
                          <input type="text" name="name" class="form-control" required="required"/>  
                          <br />  
                          <label>Image</label>  
                          <input type="file" name="image" id="image" class="form-control" required="required"/>  
                          <br />  
                          <label>For Category</label>  
                          <select class="form-control" name="cat_id" required="required">
                          	<option></option>
                          <?php $result=mysqli_query($connect,"select * FROM category"); while ($rowSelect=mysqli_fetch_assoc($result)) { ?>
                         <option value="<?= $rowSelect['id']; ?>"><?php echo $rowSelect['name']?></option>
                         <?php } ?>
                          </select>
                          <br />                            
                          <input type="submit" name="insertPro" value="Add Product" class="btn btn-success" />  
                     </form>  
                </div>  
           </div>  
      </div>  
 </div> 
  
 </div>
