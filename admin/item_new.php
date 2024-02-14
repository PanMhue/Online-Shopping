<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Item</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
<body>
<?php include("../components/admin_header.php") ?>
<main class="container flex justify-center items-start mt-4 mx-auto">
    <div class="w-[60%] flex flex-col gap-5 mx-auto">
        <form action="item_add.php" method="post" enctype="multipart/form-data">
            <label for="title">Item Name</label><br>
            <input type="text" name="title" id="title"><br><br>

            <label for="brand">Brand</label><br>
            <input type="text" name="brand" id="brand"><br><br>

            <label for="review">Review</label><br>
            <textarea name="review" id="review"></textarea><br><br>

            <label for="price">Price</label><br>
            <input type="text" name= "price" id="price"><br><br>

            <label for="category_id">Categories</label><br>
            <select name="category_id" id="category_id"><br>
                <option value="1">--- Choose ---</option>
                <?php
                include("confs/config.php");
                $result=mysqli_query($conn,"SELECT id,name FROM tbl_category");
                while ($row=mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row['id']?>">
                        <?php echo $row['name'];?>
                    </option>
                <?php } ?>
            </select><br><br>
                <label for="photo">Image</label><br>
                <input type="file" name="photo" id="photo" >
                <br><br>

                <div class="flex gap-3">
                    <button type="submit" class=" w-fit rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
                    <a href="item_list.php" class=" w-fit rounded-md bg-gray-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Back To Home</a>
                </div>
        </form>
    </div>
</main>
</body>
</html>