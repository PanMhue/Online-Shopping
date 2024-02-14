<?php
  $current_uri = $_SERVER['REQUEST_URI'];
?>

<nav class="bg-gray-800 sticky z-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/admin/welcomeadmin.php"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
                        <a href="/admin/item_list.php"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Manage Items
                        </a>
                        <a href="/admin/cat_list.php"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Manage Categories
                        </a>
                        <a href="/admin/orders.php"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Manage Orders
                        </a>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="ml-4 flex items-center md:ml-6 justify-between space-x-4 gap-3">
                    <a href="../admin/logout.php"
                       class="admininfo bg-red-500 px-3 py-1 rounded-lg text-white hover:bg-red-600">
                        Logout
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
