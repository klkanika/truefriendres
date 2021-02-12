<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers hub</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
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

<body class="w-full">
    <?php include 'truefriend-header.php'; ?>
    <!-- Set up your HTML -->
    <style>
        #headder {
            background: transparent;
            color: var(--primary);
        }

        #headder svg {
            fill: var(--primary);
        }

        #content {
            max-width: 1000px;
            margin: 0 auto;
        }
    </style>
    <section class="text-white pt-32 w-full" style="background-color:#f2f2f2;color:#262145;">
        <section class="w-full flex items-center flex-col">
            <h2 class="lg:text-2xl text-sm mb-2">รวมเบอร์ติดต่อ Supplier สำหรับทำธุรกิจไว้ที่นี่ที่เดียว</h2>
            <h1 class="lg:text-6xl text-5xl font-bold tracking-tighter">Supplier hub</h1>
            <img class="lg:w-1/3 w-full lg:-mt-7 -mt-2" src="<?= get_theme_file_uri() ?>/assets/images/supplier-book.svg" alt="" />
            <div class="flex items-center justify-center flex-wrap gap-4 mt-6">
                <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
                <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
                <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></a>
            </div>
        </section>
        <hr class="mt-8 mb-8 lg:mt-12 lg:mt-8" style="border-top:1px solid rgba(0,0,0,0.12)" />
        <section class="mx:6 lg:py-8 pb-4" id="content">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper pl-4 lg:pl-0">
                    <!-- Slides -->
                    <div class="tab-button select-none cursor-pointer tab-button-active border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs swiper-slide" style="width:auto">ทั้งหมด</div>
                    <?php foreach ($suppliertypes as $suppliertype) : ?>
                        <div class="tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs swiper-slide" style="width:auto"><?= $suppliertype->cat_name ?></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <section class="px-4 lg:px-20 lg:mt-12" id="content-card">
                <?php foreach ($suppliers as $supplier) : ?>
                    <a href="<?= $supplier->link ?>" class="py-8 flex items-center justify-between w-full cursor-pointer" style="border-bottom:1px solid rgba(0,0,0,0.12)">
                        <div class="flex justify-between items-center w-4/5 lg:flex-nowrap flex-wrap">
                            <h1 class="font-bold lg:w-2/3 w-full pr-12 text-xl"><?= $supplier->ชื่อธุรกิจ ?></h1>
                            <h2 class="lg:w-1/3 w-full lg:text-xl text-base"><?= $supplier->รายละเอียดเจ้าของธุรกิจ->เบอร์โทร ?> (<?= $supplier->รายละเอียดเจ้าของธุรกิจ->ชื่อ ?>)</h2>
                        </div>
                        <img src="<?= get_theme_file_uri() ?>/assets/images/big-right.svg" alt="" />
                    </a>
                <?php endforeach; ?>
                <div class="text-center text-xs py-12">
                    <button class="rounded-full text-white px-8 py-3 px-28" style="background-color: #262145;">LOAD MORE</button>
                </div>
            </section>
        </section>
        <section id="register" style="background-color:#FEDA52;" class="flex flex-col items-center w-full py-24">
            <h1 class="text-3xl font-bold">สมัครเป็น Supplier ฟรี</h1>
            <a href="<?= get_site_url() ?>/supplier-register" class="text-center text-xs pt-6">
                <button class="rounded-full px-8 py-3 px-28 bg-white text-lg" style="color:#262145">ลงทะเบียน</button>
            </a>
        </section>
    </section>
    <?php
    $footerbgcolor = '#f2f2f2';
    $footercolor = '#19181F';
    $footerheadercolor = 'rgba(0,0,0,0.5)';
    $footerlogo = get_theme_file_uri() . '/assets/images/logo-blue.svg';
    ?>
    <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function() {
        $(".tab-button").click(function(e) {
            $(".tab-button").removeClass('tab-button-active')
            $(this).addClass('tab-button-active')
        });

        const swiper = new Swiper('.swiper-container', {
            // Optional parameters
            loop: false,
            slidesPerView: 2.75,
            spaceBetween: 10,
            breakpoints: {
                1024: {
                    slidesPerView: 'auto',
                    spaceBetween: 10,
                },
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>