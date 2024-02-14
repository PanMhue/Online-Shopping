<?php
    session_start();
    if (!isset($_SESSION['cart'])) {
        header("location: index.php");
        exit();
    }
    include("admin/confs/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="./style/main.css">
</head>
<body>
<main class="h-full flex-1 flex flex-row bg-white shadow-xl rounded-lg min-h-screen">
    <aside id="default-sidebar" class="sidebar z-40 pt-4 w-64 transition-transform bg-white border-r border-gray-200" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white flex flex-col">
            <h1 class="text-2xl mb-4">View Cart</h1>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="index.php">&laquo; Continue Shopping</a>
                </li>
                <li>
                    <a href="clear_cart.php" class="del">&times; Clear Cart</a>
                </li>
            </ul>
        </div>
    </aside>
    <div class="w-full px-16 py-5 overflow-y-scroll">
        <table class="border-collapse border border-slate-500 w-full mt-10">
            <thead>
            <tr>
                <th class="border border-slate-600 px-4">Item Name</th>
                <th class="border border-slate-600 px-4">Qty</th>
                <th class="border border-slate-600 px-4">Unit Price</th>
                <th class="border border-slate-600 px-4">Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $qty){
                $result = mysqli_query($conn, "SELECT title, price FROM tbl_item WHERE id = $id");
                $row = mysqli_fetch_assoc($result);
                $total += $row['price'] * $qty;
                ?>
                <tr>
                    <td class="border border-slate-700 px-4">
                        <?php echo $row['title']; ?>
                    </td>
                    <td class="border border-slate-700 px-4 text-center"><?php echo $qty;?></td>
                    <td class="border border-slate-700 px-4 text-center"><?php echo $row['price'];?></td>
                    <td class="border border-slate-700 px-4 text-center"><?php echo $row['price'] * $qty;?></td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3" align="right" class="border border-slate-700 px-4 text-center"><b>Total:</b></td>
                <td>$<?php echo $total; ?></td>
            </tr>
            </tfoot>
        </table>
        <div class="order-form">
          <form action="submit_order.php" method="post">
              <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-3">
                      <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Your name</label>
                      <div class="mt-2">
                          <input type="text" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  <div class="sm:col-span-3">
                      <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                      <div class="mt-2">
                          <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  <div class="sm:col-span-3">
                      <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                      <div class="mt-2">
                          <input type="text" name="phone" id="phone" autocomplete="phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  <div class="sm:col-span-3">
                      <label for="visa" class="block text-sm font-medium leading-6 text-gray-900">Visa Card No.</label>
                      <div class="mt-2">
                          <input id="visa" name="visa" type="text" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      </div>
                  </div>
                  <div class="col-span-full">
                  <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                  <div class="mt-2">
                      <textarea id="address" name="address" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                  </div>
              </div>
              </div>
            <br><br>
              <div class="mt-6 flex items-center justify-end gap-x-6">
                  <button type="submit" class="rounded-md bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit Order</button>
              </div>
          </form>
        </div>
    </div>
</main>
</body>
</html>