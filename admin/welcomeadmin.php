<?php
  include("confs/auth.php");
  include("confs/config.php");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
<body class="h-full min-h-screen">
  <?php include("../components/admin_header.php") ?>
  <main class="container flex justify-center items-start mt-4 mx-auto">
      <div class="w-[60%] flex py-5">
          <div class="w-full">
              <h2 class="text-2xl text-center w-full">Welcome to Online Shop Administration!</h2>
              <div>
                  <p class="pt-4 mb-6 text-xl border-b-2 w-fit">Status</p>
                  <div class="w-[50%] bg-stone-300 p-5 rounded-xl flex flex-col gap-4 text-xl">
                      <p class="flex justify-between">
                          Total Items:
                          <span class="rounded-full bg-sky-100 px-3 text-lg">
                              <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_item")); ?>
                          </span>
                      </p>
                      <p class="flex justify-between">
                        Total Categories:
                        <span class="rounded-full bg-sky-100 px-3 text-lg">
                            <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_category")); ?>
                        </span>
                      </p>
                      <p class="flex justify-between">
                        Total Orders:
                        <span class="rounded-full bg-sky-100 px-3 text-lg">
                            <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_orders")); ?>
                        </span>
                      </p>
                  </div>
              </div>
              <div>
                  <p class="pt-6 mb-6 text-xl border-b-2 w-fit">Quick Start</p>
                  <div class="grid grid-cols-3 gap-4">
                      <a href="item_new.php" class="bg-slate-500 hover:bg-slate-400 py-2 rounded-md text-white text-center">Add New Item</a>
                      <a href="cat_new.php" class="bg-slate-500 hover:bg-slate-400 py-2 rounded-md text-white text-center">Add New Category</a>
                      <a href="orders.php" class="bg-slate-500 hover:bg-slate-400 py-2 rounded-md text-white text-center">Check Orders</a>
                  </div>
              </div>
          </div>
      </div>
  </main>
</body>
</html>