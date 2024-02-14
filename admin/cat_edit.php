<?php
    include("confs/config.php");
    $id=$_GET['id'];
    $result=mysqli_query($conn,"SELECT * FROM tbl_category WHERE id=$id");
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Category</title>
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>
<?php include("../components/admin_header.php") ?>
    <main class="container flex justify-center items-start mt-4 mx-auto">
        <div class="w-[60%] flex flex-col gap-5 mx-auto">
          <form action="cat_update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">

            <label for="name">Category Name</label> <br>
            <input type="text" name="name" id="name" value="<?php echo $row['name']?>"> <br><br>

            <label for="remark">Remark</label><br>
            <textarea name="remark" id="remark"><?php echo $row['remark']?></textarea><br><br>

          <div class="flex gap-3">
              <button type="submit" class=" w-fit rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
              <a href="cat_list.php" class=" w-fit rounded-md bg-gray-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Back To Home</a>
          </div>
          </form>
        </div>
    </main>
</body>
</html>