<?php
    include("admin/confs/config.php");

    $cart = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $qty) {
            $cart += $qty;
        }
    }
    $cats = mysqli_query($conn, "SELECT * FROM tbl_category");

    $current_uri = $_SERVER['REQUEST_URI'];
?>

<nav class="bg-gray-800 sticky z-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0 text-white font-bold">
                    Kayy's Shoppie
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/index.php"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">All</a>
                        <?php while ($row = mysqli_fetch_assoc($cats)): ?>
                            <a href="/index.php?cat=<?php echo $row['id'] ?>"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                <?php echo $row['name'] ?>
                            </a>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="ml-4 flex items-center md:ml-6 justify-between space-x-4 gap-3">
                    <a href="/view_cart.php"
                       class="relative inline-flex items-center text-sm font-medium text-center rounded-full bg-gray-800 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                             class="w-7 h-7">
                            <path
                                d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                        </svg>
                        <span class="sr-only">Cart View</span>
                        <div
                            class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full -top-1 -right-[0.4rem]">
                            <?php echo $cart ?>
                        </div>
                    </a>

                    <a href="/admin/index.php"
                       class="admininfo bg-cyan-400 px-3 py-1 rounded-lg text-white hover:bg-cyan-500">
                        Login <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    <?php
    echo "document.querySelector(`a[href='$current_uri']`).classList.add('bg-gray-900', 'dark:bg-gray-700', 'text-white')";
    ?>
</script>