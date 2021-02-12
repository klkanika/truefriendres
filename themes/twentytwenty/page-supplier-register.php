<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infohub</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
</head>
<?php
require_once('custom-classes/class-posts.php');
$args = array(
    'taxonomy' => 'suppliertypes',
    'orderby' => 'name',
    'order'   => 'ASC'
);
$suppliertypes = get_categories($args);
$restaurantCategoriesObject = acf_get_field('restaurant_101_category');
$restaurantCategories = $restaurantCategoriesObject['choices'];

$suppliersObject = Post::getPostsByCategory('suppliers', null, 10, 0, null);
$suppliers = $suppliersObject->posts;
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
    <?php include 'truefriend-header.php'; ?>
    <!-- Set up your HTML -->
    <section class="text-white pt-32 px-48 w-full" style="background-color:#f2f2f2;color:#262145;">
        <section class="w-full flex flex-col">
            <h2 class="lg:text-2xl text-sm mb-2">ลงทะเบียน Supplier</h2>
            <h1 class="lg:text-6xl text-5xl font-black tracking-tighter mb-4">Register Supplier</h1>
            <p class="lg:text-base">หลังจากที่แอดมินได้ Approve แล้วข้อมูลของคุณจะลงไปที่ Website</p>
            <div class="flex mt-8 mb-16">
                <div class="font-black text-base flex items-center mr-8">
                    <img class="w-8 h-8 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
                    ขยายฐานลูกค้า
                </div>
                <div class="font-black text-base flex items-center mr-8">
                    <img class="w-8 h-8 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
                    สมัครฟรี
                </div>
                <div class="font-black text-base flex items-center">
                    <img class="w-8 h-8 mr-4" src="<?= get_theme_file_uri() ?>/assets/images/service-check-gold.svg" alt="">
                    ได้ SEO ไปในตัว
                </div>
            </div>
            <div class="bg-white rounded-xl">
                abc
            </div>
            <form action="<?= get_site_url() ?>/wp-admin/admin-post.php" method="post">
                <input type="text" name="abc" />
                <input type="submit" name="submit" />
                <input type="hidden" name="action" value="supplier_register">
            </form>
        </section>
    </section>
    <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>