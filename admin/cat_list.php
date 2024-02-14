<?php
    include("confs/config.php");
    $result = mysqli_query($conn, "SELECT * FROM tbl_category");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
<body>
    <?php include("../components/admin_header.php") ?>
    <main class="container flex justify-center items-start mt-4 mx-auto">
        <div class="w-[60%] flex flex-col">
            <div class="flex justify-between items-center w-full px-4 py-5">
                <h1 class="text-2xl">Category</h1>
                <a href="cat_new.php" class="new text-3xl bg-gray-300 px-4 pb-2 pt-1 text-center rounded-full">+</a>
            </div>
            <div>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <div title="<?php echo $row['remark'] ?>" class="flex justify-between items-center w-full bg-gray-300 px-4 py-5 border-b-4 last:border-b-0 first:rounded-t-2xl last:rounded-b-2xl">
                        <h3 class="font-bold">
                            <?php echo $row['name'] ?>
                        </h3>
                        <div class="flex flex-row h-full">
                            <a class="w-full h-full px-5 py-2 bg-gray-500 inline-block text-white rounded-s-2xl"  href="cat_edit.php?id=<?php echo $row['id'] ?>">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5" stroke="#F5F5F5" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M16.652 3.45506L17.3009 2.80624C18.3759 1.73125 20.1188 1.73125 21.1938 2.80624C22.2687 3.88124 22.2687 5.62415 21.1938 6.69914L20.5449 7.34795M16.652 3.45506C16.652 3.45506 16.7331 4.83379 17.9497 6.05032C19.1662 7.26685 20.5449 7.34795 20.5449 7.34795M16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9M20.5449 7.34795L14.5801 13.3128C14.1761 13.7168 13.9741 13.9188 13.7513 14.0926C13.4886 14.2975 13.2043 14.4732 12.9035 14.6166C12.6485 14.7381 12.3775 14.8284 11.8354 15.0091L10.1 15.5876M10.1 15.5876L8.97709 15.9619C8.71035 16.0508 8.41626 15.9814 8.21744 15.7826C8.01862 15.5837 7.9492 15.2897 8.03811 15.0229L8.41242 13.9M10.1 15.5876L8.41242 13.9" stroke="#F5F5F5" stroke-width="1.5"/>
                                </svg>
                            </a>
                            <a class="w-full h-full px-5 py-2 bg-red-500 inline-block text-white rounded-e-2xl" href="cat_delete.php?id=<?php echo $row['id'] ?>" onClick="return confirm('Are you sure?')">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.5001 6H3.5" stroke="#F5F5F5" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M18.8332 8.5L18.3732 15.3991C18.1962 18.054 18.1077 19.3815 17.2427 20.1907C16.3777 21 15.0473 21 12.3865 21H11.6132C8.95235 21 7.62195 21 6.75694 20.1907C5.89194 19.3815 5.80344 18.054 5.62644 15.3991L5.1665 8.5" stroke="#F5F5F5" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M9.5 11L10 16" stroke="#F5F5F5" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M14.5 11L14 16" stroke="#F5F5F5" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="#F5F5F5" stroke-width="1.5"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <br style="clear:both">
</body>
</html>