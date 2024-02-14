<?php
session_start();
include("admin/confs/config.php");

$cart = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cart += $qty;
    }
}

#Browse by Category
if (isset($_GET['cat'])) {
    $cat_id = $_GET['cat'];
    $items = mysqli_query($conn, "SELECT * FROM tbl_item WHERE category_id = $cat_id");
} else {
    $items = mysqli_query($conn, "SELECT * FROM tbl_item");
}

#search result
if (isset($_GET['q'])) {
    // $items = search_perform($_GET['q'], "items", "title");
}
$cats = mysqli_query($conn, "SELECT * FROM tbl_category");
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Shop</title>
        <link rel="stylesheet" href="./style/main.css">
    </head>

    <body class="h-full">
        <div class="min-h-full">
            <?php include("components/client_header.php") ?>

            <main>
                <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                    <div class="flex-1 px-2">
                        <ul
                            class="items mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <?php while ($row = mysqli_fetch_assoc($items)): ?>
                                <?php !is_dir("admin/images/{$row['photo']}") and file_exists("admin/images/{$row['photo']}") ?>
                                <div
                                    class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                                    <div class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl">
                                        <img class="object-contain w-full" src="admin/images/<?php echo $row['photo'] ?>"
                                            alt="<?php echo $row['title'] ?>'s image" />
                                    </div>
                                    <div class="mt-4 px-5 pb-5">
                                        <h5 class="text-lg tracking-tight text-slate-900">
                                            <?php echo $row['title'] ?>
                                        </h5>
                                        <p class="mt-1 text-sm text-slate-400">
                                            <?php echo $row['brand'] ?>
                                        </p>
                                        <div class="mt-2 mb-5 flex items-center justify-between">
                                            <p>
                                                <span class="text-3xl font-bold text-slate-900">$
                                                    <?php echo $row['price'] ?>
                                                </span>
                                            </p>
                                        </div>
                                        <a href="add_to_cart.php?id=<?php echo $row['id'] ?>"
                                            class="flex items-center justify-center rounded-md bg-cyan-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-cyan-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            Add to cart
                                        </a>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </main>
            <footer class="footer flex justify-center items-center py-3 w-full">
                &copy;
                <?php echo date("Y") ?>. All right reserved.
            </footer>
        </div>
    </body>

</html>