<?php
    include("confs/config.php");

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_item WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link rel="stylesheet" href="/style/main.css">
</head>
<body>
    <?php include("../components/admin_header.php") ?>
    <main class="container flex justify-center items-start mt-4 mx-auto">
        <div class="w-[60%] flex flex-col gap-5 mx-auto">
            <form action="item_update.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="title">Item Name</label><br>
                <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>">
                <br><br>

                <label for="brand">Brand</label><br>
                <input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>">
                <br><br>

                <label for="review">Review</label><br>
                <textarea name="review" id="review"><?php echo $row['review']; ?></textarea>
                <br><br>

                <label for="price">Price</label><br>
                <input type="text" name="price" id="price" value="<?php echo $row['price']; ?>">
                <br><br>

                <label for="category_id">Category</label><br>
                <select name="category_id" id="category_id"><br>
                    <option value="0">-- Choose --</option>
                    <?php
                    $sql = "SELECT id, name FROM tbl_category";
                    $categories = mysqli_query($conn, $sql);
                    while($cat = mysqli_fetch_assoc($categories)) {
                        ?>
                        <option value="<?php echo $cat['id']?>" <?php if($cat['id'] == $row['category_id']) echo "selected" ?>>
                            <?php echo $cat['name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <br><br>

                <img src="images/<?php echo $row['photo']; ?>" alt="" height="150"><br>
                <label for="photo">Image</label><br>
                <input type="file" name="photo" id="photo" >
                <br><br>

                <div class="flex gap-3">
                    <button type="submit" class=" w-fit rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                    <a href="item_list.php" class=" w-fit rounded-md bg-gray-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Back To Home</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>