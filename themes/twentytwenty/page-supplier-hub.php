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
    'order'   => 'ASC',
);
$suppliertypes = get_categories($args);

$supplierTypeId = isset($_GET['type']) ? $_GET['type'] : null;
if (!get_term_by('id', $supplierTypeId, 'suppliertypes')) {
    $supplierTypeId = null;
}
$suppliersObject = Post::getPostsByCategory('suppliers', $supplierTypeId, 10, 0, null);
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
            <h2 class="lg:text-2xl text-sm mb-2 font-light">รวมเบอร์ติดต่อ Supplier สำหรับทำธุรกิจไว้ที่นี่ที่เดียว</h2>
            <h1 class="lg:text-6xl text-5xl font-bold tracking-tighter mt-2">Supplier hub</h1>
            <img class="lg:w-1/3 w-full lg:-mt-7 -mt-2" src="<?= get_theme_file_uri() ?>/assets/images/supplier-book.svg" alt="" />
            <div class="flex items-center justify-center flex-wrap mt-4">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('supplier-hub'))) ?>"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
                <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('supplier-hub'))) ?>"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
                <div copytoclipboard="<?= get_permalink(get_page_by_path('supplier-hub')) ?>" class="btn-copytoclipboard"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
            </div>
        </section>
        <hr class="mt-8 mb-8 lg:mt-12 lg:mt-8" style="border-top:1px solid rgba(0,0,0,0.12)" />
        <section class="mx:6 lg:py-8 pb-4" id="content">
            <!-- Slider main container -->
            <div class="swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper pl-4 lg:pl-0">
                    <!-- Slides -->
                    <div class="supplier-type tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs swiper-slide <?= !$supplierTypeId ? 'tab-button-active' : '' ?>" style="width:auto" value=''>ทั้งหมด</div>
                    <?php foreach ($suppliertypes as $suppliertype) : ?>
                        <div class="supplier-type tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs swiper-slide <?= $supplierTypeId == $suppliertype->term_id ? 'tab-button-active' : '' ?>" style="width:auto" value='<?= $suppliertype->term_id ?>'><?= $suppliertype->cat_name ?></div>
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
                <?php if (count($suppliers) === 0) { ?>
                    <div class="flex justify-center items-center">ไม่พบ Supplier ในประเภทธุรกิจนี้</div>
                <?php } ?>
            </section>
            <div class="text-center text-xs py-12">
                <button class="rounded-full text-white px-8 py-3 px-28 hidden" style="background-color: #262145;" id="loadmore">LOAD MORE</button>
            </div>
        </section>
        <div class="w-full h-72 flex flex-col items-center justify-center" style="background-color: #FEDA52;">
            <span class="text-3xl font-bold">
                ลงทะเบียน Supplier ฟรี
            </span>
            <a href="<?= get_site_url() ?>/supplier-register" class="rounded-full py-3 px-24 bg-white my-6">
                ลงทะเบียน
            </a>
        </div>
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
        let supplierType = '';
        var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
        let allPosts = <?= $suppliersObject->posts_count ?>;
        let currentPosts = 10;
        let postsPerPage = 10;
        let loadMoreBtn = $("#loadmore");

        if (allPosts > currentPosts) {
            loadMoreBtn.show();
        }

        $(".supplier-type").click(function() {
            if ($(this).attr('value') != supplierType) {
                currentPosts = 0;
                supplierType = $(this).attr('value');
                getPostBySupplierType(false);
                if (allPosts > currentPosts) {
                    loadMoreBtn.show();
                } else {
                    loadMoreBtn.hide();
                }
            }
        });

        loadMoreBtn.click(() => {
            loadMoreBtn.hide();
            getPostBySupplierType(true);
            if (allPosts > currentPosts) {
                loadMoreBtn.show();
            }
        });

        const getPostBySupplierType = (append) => {
            var request = {
                'action': 'get_posts_by_cat_json_ajax',
                'postType': 'suppliers',
                'postsPerPage': postsPerPage,
                'offset': currentPosts,
                'categoryNo': supplierType,
            };

            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: request,
                async: false,
                dataType: "json",
                success: function(postsObject) {
                    currentPosts += postsObject.posts.length;
                    allPosts = postsObject.posts_count;
                    const posts = postsObject.posts;
                    if (!append) {
                        $("#content-card").html('');
                    }
                    if (posts.length > 0) {
                        posts.map((supplier, i) => {
                            $("#content-card").append(`
                            <a href="${supplier.link}" class="py-8 flex items-center justify-between w-full cursor-pointer" style="border-bottom:1px solid rgba(0,0,0,0.12)">
                                <div class="flex justify-between items-center w-4/5 lg:flex-nowrap flex-wrap">
                                    <h1 class="font-bold lg:w-2/3 w-full pr-12 text-xl">${supplier.ชื่อธุรกิจ}</h1>
                                    <h2 class="lg:w-1/3 w-full lg:text-xl text-base">${supplier.รายละเอียดเจ้าของธุรกิจ.เบอร์โทร} (${supplier.รายละเอียดเจ้าของธุรกิจ.ชื่อ})</h2>
                                </div>
                                <img src="<?= get_theme_file_uri() ?>/assets/images/big-right.svg" alt="" />
                            </a>
                        `);
                        })
                    } else {
                        $("#content-card").html(`<div class="flex justify-center items-center">ไม่พบ Supplier ในประเภทธุรกิจนี้</div>`);
                    }
                }
            })
        }

        $(".tab-button").click(function(e) {
            $(".tab-button").removeClass('tab-button-active')
            $(this).addClass('tab-button-active')
        });

        const swiper = new Swiper('.swiper-container', {
            // Optional parameters
            loop: false,
            slidesPerView: 'auto',
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