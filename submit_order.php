<?php
    session_start();
    include("admin/confs/config.php");
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $visa=$_POST['visa'];
    $address=$_POST['address'];
    $received=date('Y-m-d H:m:s', strtotime('+7days', strtotime('now')));
    mysqli_query($conn, "INSERT INTO tbl_orders(name,email,phone,visa_card,address,status,ordered_date,received_date) VALUES('$name','$email','$phone','$visa', '$address', 0, now(), '$received')");
    $order_id=mysqli_insert_id($conn);
    foreach($_SESSION['cart'] as $id=>$qty){
      mysqli_query($conn, "INSERT INTO tbl_order_items(item_id, order_id, qty) VALUES ($id, $order_id, $qty)");
    }
    unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submitted Order</title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
    <main class="container flex justify-center items-start mt-4 mx-auto h-screen">
        <div class="w-[60%] flex flex-col gap-5 mx-auto items-center justify-center h-full">
          <h1 class="text-3xl">Order Submitted</h1>
          <p class="msg">
              Your order is submitted. We will deliver the items soon.
          </p>
          <a href="index.php" class=" w-fit rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back To Home</a>
        </div>
    </main>
</body>
</html>