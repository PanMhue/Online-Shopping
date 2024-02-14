<?php
  include("confs/config.php");
  include("confs/auth.php");
  $orders_data= mysqli_query($conn, "SELECT * FROM tbl_orders");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Orders</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
<body>
<?php include("../components/admin_header.php") ?>
<main class="container flex justify-center items-start mt-4 mx-auto">
    <div class="w-[60%] flex flex-col">
        <ul class="orders flex flex-col gap-3">
            <?php while ($orders=mysqli_fetch_assoc($orders_data)) { ?>
                <li class="<?php echo ($orders['status']) ? 'delivered' : ''; ?> border p-4 rounded-md bg-gray-300">
                    <div class="order flex d-flex justify-between items-start mb-3">
                        <div>
                            <b><?php echo $orders['name'];?></b>
                            <i><?php echo $orders['email'];?></i>
                            <span><?php echo $orders['phone'];?></span>
                            <i><?php echo $orders['visa_card'];?></i>
                            <p><?php echo $orders['address'];?></p>
                            <p><?php echo $orders['received_date'];?></p>
                        </div>
                        <div class="pt-3 pe-3">
                            <a href="order_status.php?id=<?php echo $orders['id'] ?>&status=<?php echo $orders['status'] ? 0 : 1 ?>" class="rounded-md px-4 py-2 <?php echo $orders['status'] ? 'bg-white' : 'bg-emerald-500 text-white' ?>">
                                <?php echo $orders['status'] ? "Undo" : "Mark as Delivered"; ?>
                            </a>
                        </div>
                    </div>
                    <table class="border-collapse border border-slate-500">
                        <thead>
                            <tr>
                                <th class="border border-slate-600 px-4">Item</th>
                                <th class="border border-slate-600 px-4">Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $order_id=$orders['id'];
                                $order_item= mysqli_query ($conn,"SELECT tbl_order_items.*,tbl_item.title FROM tbl_order_items LEFT JOIN tbl_item ON tbl_order_items.item_id=tbl_item.id WHERE tbl_order_items.order_id=$order_id") or die(mysqli_error($conn));
                                while($items=mysqli_fetch_assoc($order_item)){
                            ?>
                                <tr>
                                    <td class="border border-slate-700 px-4">
                                        <?php echo $items['title']; ?>
                                    </td>
                                    <td class="border border-slate-700 px-4 text-center"><?php echo $items['qty'];?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </li>
            <?php } ?>
        </ul>
    </div>
</main>
</body>
</html>