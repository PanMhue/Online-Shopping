<?php
  include("confs/auth.php");
  include("confs/config.php");
  $id=$_POST['id'];
  $name=$_POST['name'];
  $remark=$_POST['remark'];
  $sql="UPDATE tbl_category SET name='$name',remark='$remark',modified_date=now() WHERE id=$id";
  mysqli_query($conn,$sql) or die(mysqli_error($conn));
  header("location: cat_list.php");
?> 
