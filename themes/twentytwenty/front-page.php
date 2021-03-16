<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพื่อนแท้ร้านอาหาร</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>

<?php
require_once('custom-classes/class-posts.php');
require_once('custom-classes/class-suppliertypes.php');
$stickyPosts = Post::getStickyPosts('post', 5);
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$galleryCatId = get_category_by_slug('gallery')->cat_ID;
$galleryPosts = Post::getPostsByCategory('post', get_category_by_slug('gallery')->cat_ID, 4, 0, null);
$supplierTypes = SupplierType::getSupplierTypes(20);
$supplierPosts = Post::getPostsByCategory('suppliers', null, 1, 0, null);
$postCategories = array('news', 'marketing', 'knowledge');
$postObjects = array();
foreach ($postCategories as $postCategory) {
    $catObject = get_category_by_slug($postCategory);

    if (!empty($catObject)) {
        $posts = Post::getPostsByCategory('post', $catObject->cat_ID, 4, 0, null);
        array_push($postObjects, json_decode(
            '{' .
                '"posts" : ' . json_encode($posts) . ',' .
                '"catObject" : ' . json_encode($catObject) .
                '}'
        ));
    }
}
$terms = get_terms(array(
    'taxonomy' => 'suppliertypes',
    'hide_empty' => false,
    'orderby' => 'count',
    'order' => 'DESC'
));
$defaultImage = get_theme_file_uri()."/assets/images/img-default.jpg";
?>

<body class="w-full">
    <?php include 'truefriend-header.php'; ?>
    <!-- Set up your HTML -->
    <style>
        .banner {
            height: 70vh;
        }

        .banner__title {
            width: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6));
        }

        @media (max-width: 992px) {
            .banner {
                height: 50vh;
            }
        }
    </style>
    <!--Sticky Slide -->
    <?php if(!empty($stickyPosts)) :?>
        <section id="section-1stSlider" class="relative">
            <div id="1stSlider" class="owl-carousel">
                <?php
                foreach ($stickyPosts as $thePost) {
                    $image = $defaultImage;
                    if(file_exists($thePost->featuredImage)){
                        $image = $thePost->featuredImage ;
                    }
                ?>
                    <div class="relative banner">
                        <a href="<?= $thePost->link ?>">
                            <img class="object-cover w-full h-full" src="<?= $image ?>" />
                            <div class="absolute left-0 bottom-0 banner__title">
                                <div class="lg:ml-12 ml-5 lg:mr-12 mr-32 lg:mb-10 mb-6">
                                    <div onclick="window.open('<?= get_site_url() ?>/<?= $thePost->categories[0]->slug ?>','_self')" class="select-none rounded-full text-center lg:w-44 w-32 p-2 mb-5 lg:text-base text-sm" style="color:#262145;background-color:#FEDA52;"><?= $thePost->categories[0]->name ?></div>
                                    <p class="text-white lg:text-2xl text-xl"><?= $thePost->title ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <!-- 1st navigator -->
            <div class="absolute flex items-center justify-between w-16 right-0 bottom-0 lg:mr-8 mr-5 lg:mb-10 mb-6 z-20">
                <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-left.svg" referTo="1stSlider" class="cursor-pointer toTheLeft" />
                <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right.svg" referTo="1stSlider" class="cursor-pointer toTheRight" />
            </div>
        </section>
    <?php else: ?>
        <div class="relative banner">
                <img class="object-cover w-full h-full" src="<?= $defaultImage ?>" />
                <div class="absolute left-0 bottom-0 banner__title">
                    <div class="lg:ml-12 ml-5 lg:mr-12 mr-32 lg:mb-10 mb-6">
                        <div class="select-none rounded-full text-center lg:w-44 w-32 p-2 mb-5 lg:text-base text-sm" style="color:#262145;background-color:#FEDA52;">ไม่พบข้อมูล</div>
                    </div>
                </div>
        </div>
    <?php endif; ?>

    <!--Last update Post Slide -->
    <?php if(!empty($recentPosts->posts_count)) :?>
        <section id="section-2ndSlider" class="pt-8 pb-10 lg:pl-8 lg:pr-8 pl-4" style="color:#062241">
            <div class="mb-4 flex justify-between">
                <p class="font-bold text-2xl">Last update</p>
                <!-- 2nd navigator -->
                <div class="items-center justify-between w-16 hidden lg:flex">
                    <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-left-blue.svg" referTo="2ndSlider" class="cursor-pointer toTheLeft" />
                    <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right-blue.svg" referTo="2ndSlider" class="cursor-pointer toTheRight" />
                </div>
            </div>
            <div id="2ndSlider" class="owl-carousel">
                <?php
                foreach ($recentPosts->posts as $thePost) {
                    $image = $defaultImage;
                    if(file_exists($thePost->featuredImage)){
                        $image = $thePost->featuredImage ;
                    }
                ?>
                    <a href="<?= $thePost->link ?>">
                        <div class="relative">
                            <div style="height:30vh">
                                <img class="object-cover w-full h-full rounded-xl" src="<?= $image ?>" />
                            </div>
                            <p class="mt-4"> <?= $thePost->title ?> </p>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
        </section>
    <?php endif; ?>

    <?php include 'truefriend-advertisement.php'; ?>
    <?php include 'truefriend-interview.php'; ?>
    <?php include 'truefriend-restaurant101.php'; ?>
    
    <!--Supplier Hub-->
    <section id="section-5thSlider" class="pt-12 lg:pl-8 lg:pr-0 pb-16 px-4 text-white" style="background-color:#262145;">
        <div class="lg:mb-12 mb-8">
            <div class="mb-1 flex justify-between lg:pr-8">
                <p class="font-bold text-2xl">Supplier Hub</p>
                <div class="flex items-center">
                    <form id="supplier-type-search">
                        <div style="border:1px solid #062241;background-color:#f2f2f2;color:#262145;" class="rounded-full flex justify-center mr-6 hidden" id="supplier-type-search-field">
                            <input type="text" class="rounded-full h-12 px-4" placeholder="search..." style="background-color:inherit" id="supplier-type-input" />
                            <button type="submit" class="cursor-pointer pr-2">
                                <img src="<?= get_theme_file_uri() ?>/assets/images/magnifier.svg" />
                            </button>
                        </div>
                    </form>
                    <?php if(!empty($supplierPosts->posts_count)): ?>
                        <p class="font-bold mr-8 hidden lg:block cursor-pointer" id="supplier-type-search-btn"> ค้นหา</p>
                        <a href="<?= get_site_url() ?>/supplier-hub" class="lg:text-base text-xs font-bold">ดูทั้งหมด (<?= $supplierPosts->posts_count < 1000 ? $supplierPosts->posts_count : '999+' ?>)</a>
                    <?php endif; ?>
                </div>
            </div>
            <p class="lg:text-base text-xs">แหล่งรวมเบอร์ติดต่อ Supplier ประเภทต่างๆ</p>
        </div>
        <div class="lg:block hidden">
            <div class="swiper-container supplier-container" style="border-color:#E9E9E9">
                <div class="swiper-wrapper supplier-wrapper" id="supplier-wrapper">
                    <?php
                    if(!empty($supplierTypes->posts_count) && !empty($supplierPosts->posts_count)):
                        foreach ($supplierTypes->supplierTypes as $supplierType) :
                            if ((int)$supplierType->supplierTypeCount > 0) :
                        ?>
                                <a href="<?= $supplierType->link ?>" class="swiper-slide">
                                    <div class="relative" style="height:40vh;">
                                        <div style="height:40vh;">
                                            <img class="object-cover w-full h-full rounded-xl" src="<?= $supplierType->featuredImage ?>" />
                                        </div>
                                        <div class="absolute flex justify-center items-center text-white top-0 right-0 mb-2 py-1 px-2 rounded-xl m-2 text-sm" style="color:#262145;background-color:#FFDA4F;">
                                            <?php if ((int)$supplierType->supplierTypeCount < 99) {
                                                echo $supplierType->supplierTypeCount;
                                            } else {
                                                echo '99+';
                                            } ?>
                                        </div>
                                        <div class="absolute flex justify-center text-white text-xl font-bold bottom-0 left-0 w-full flex items-end pb-2 h-2/4 rounded-xl" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.5));">
                                            <p><?= $supplierType->name ?></p>
                                        </div>
                                    </div>
                                </a>
                        <?php endif;
                        endforeach; ?>
                    <?php else: ?>
                        <p class="text-center w-full">ไม่พบข้อมูล</p>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="lg:hidden">
            <?php
            foreach ($supplierTypes->supplierTypes as $supplierType) :
                if ((int)$supplierType->supplierTypeCount > 0) :
            ?>
                    <a href="<?= $supplierType->link ?>">
                        <div class="py-2 border-b flex items-center relative">
                            <div class="w-20 h-20 mr-4">
                                <img class="object-cover w-full h-full rounded-lg" src="<?= $supplierType->featuredImage ?>" />
                            </div>
                            <div>
                                <div class="text-lg font-bold"><?= $supplierType->name ?></div>
                                <div class="text-sm"><?= (int)$supplierType->supplierTypeCount ?> เบอร์โทร</div>
                            </div>
                            <img class="absolute right-0" src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right.svg" />
                        </div>
                    </a>
            <?php endif;
            endforeach; ?>
        </div>
    </section>
    <?php include 'truefriend-advertisement.php'; ?>

    <!--News & Marketing & Knowledge Post-->
    <section id="section-blogs" class="pt-12 lg:ml-8 lg:mr-2 ml-4 mr-4 lg:pb-16 pb-12 flex flex-wrap" style="color:#062241">
        <?php
        foreach ($postObjects as $postObject) {
            $catObject = $postObject->catObject;
            $posts = $postObject->posts->posts;
        ?>
            <div class="lg:w-1/3 w-full lg:pr-6 lg:text-sm text-xs mb-12 lg:mb-0">
                <div onclick="window.open('<?= get_site_url() ?>/<?= $catObject->slug ?>/','_self')" class="flex items-center lg:text-2xl text-base font-bold cursor-pointer select-none w-max lg:mb-6 mb-4">
                    <p><?= $catObject->name ?></p>
                    <img class="lg:ml-2" src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right-blue.svg" />
                </div>
                <?php
                if (count($posts) > 0) {
                    for ($i = 0; $i < count($posts); $i++) {
                        $thePost = $posts[$i];
                        if ($i === 0) {
                            $image = $defaultImage;
                            if(file_exists($thePost->featuredImage)){
                                $image = $thePost->featuredImage ;
                            }
                ?>
                            <div onclick="window.open('<?= $thePost->link ?>','_self')" class="cursor-pointer mb-8">
                                <div class="mb-4" style="height:30vh">
                                    <img class="object-cover w-full h-full rounded-xl" src="<?= $image ?>" />
                                </div>
                                <p><?= $thePost->title ?></p>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="mt-6 pb-4 cursor-pointer border-grey-800 border-b <?= $i === 3 ? 'lg:border-none' : '' ?>" onclick="window.open('<?= $thePost->link ?>','_self')">
                                <p class="font-bold lg:text-base text-sm">HOT UPDATE</p>
                                <p><?= $thePost->title ?></p>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        <?php
        }
        ?>
    </section>

    <!-- Gallery -->
    <section class="text-white" style="background-color:#19181F;">
        <div class="pt-16 lg:ml-8 lg:mr-8 ml-4 mr-4 lg:pb-16 pb-10 lg:text-base text-xs">
            <p class="text-2xl mb-16 text-center">G A L L E R Y</p>
            <div class="flex flex-wrap justify-between" id="gallery-posts">
                <?php
                if (!empty($galleryCatId)) :
                    foreach ($galleryPosts->posts as $key => $thePost) : ?>
                        <a href="<?= $thePost->link; ?>" class="<?= $key % 3 == 0 ? 'w-3/5' : 'w-2/5'; ?>  lg:mb-4 mb-2 relative">
                            <div class="gallery-thumbnail relative <?= $key % 2 == 0 ? 'lg:mr-4 mr-2' : ''; ?>">
                                <img class="object-cover w-full h-full rounded-lg" src="<?= $thePost->featuredImage ?>" />
                                <div class="absolute w-full left-0 bottom-0 lg:p-6 p-3 rounded-lg" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6));"><?= $thePost->title ?></div>
                            </div>
                        </a>
                <?php endforeach;
                else: ?>
                    <p class="text-center w-full">ไม่พบข้อมูล</p>
                <?php endif; ?>
            </div>
            <div class="flex justify-center">
                <p class="mt-4 select-none cursor-pointer hidden" id="loadmore">Load More</p>
            </div>
        </div>
    </section>

    <?php include 'truefriend-footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(window).resize(function() {
        $("#2ndSlider").trigger('destroy.owl.carousel');
        $("#2ndSlider").owlCarousel({
            items: $(window).width() < 1024 ? 1.3 : 4,
            loop: true,
            // autoplay: true,
            autoplayHoverPause: true,
            slideBy: 2,
            margin: 20,
            dots: false,
        });

        $("#3rdSlider").trigger('destroy.owl.carousel');
        $("#3rdSlider").owlCarousel({
            items: $(window).width() < 1024 ? 1.3 : 4,
            loop: true,
            // autoplay: true,
            autoplayHoverPause: true,
            slideBy: 2,
            margin: 20,
            dots: false,
        });
    });

    $("#1stSlider").owlCarousel({
        items: 1,
        loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        dots: false,
    });

    $("#2ndSlider").owlCarousel({
        items: $(window).width() < 1024 ? 1.3 : 4,
        loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        slideBy: 2,
        margin: 20,
        dots: false,
    });

    $("#3rdSlider").owlCarousel({
        items: $(window).width() < 1024 ? 1.3 : 4,
        // loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        slideBy: 2,
        margin: 20,
        dots: false,
    });

    $(".toTheLeft").click(function() {
        let carousel = $(this).attr('referTo')
        $(`#${carousel}`).trigger('prev.owl.carousel');
    });

    $(".toTheRight").click(function() {
        let carousel = $(this).attr('referTo')
        $(`#${carousel}`).trigger('next.owl.carousel');
    });

    //Restaurant 101
    $(".tab-button").click(function() {
        $(".tab-button").removeClass('tab-button-active')
        $(this).addClass('tab-button-active')
    })

    //Supplier
    const supplier_swiper_setting = {
        slidesPerView: 5.5,
        spaceBetween: 15,
        loop: false,
    };

    let supplier_swiper = new Swiper('.supplier-container', supplier_swiper_setting);
    $("#supplier-type-search-btn").click(function() {
        $(this).hide();
        $("#supplier-type-search-field").show();
        $("#supplier-type-input").focus();
    })

    $("#supplier-type-search").submit(function() {
        const keyword = $("#supplier-type-input").val();
        var request = {
            'action': 'get_cat_by_name_json_ajax',
            'keyword': keyword,
            'taxonomy': 'suppliertypes',
            'orderby': 'count',
            'order': 'DESC',
            'number': '100',
        };

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: request,
            async: false,
            dataType: "json",
            success: function(postsObject) {
                supplier_swiper.destroy();
                $("#supplier-wrapper").html(``);
                postsObject.map((material, i) => {
                    $("#supplier-wrapper").append(`
                        <a href="${material.link}" class="swiper-slide">
                            <div class="relative" style="height:40vh;">
                                <div style="height:40vh;">
                                    <img class="object-cover w-full h-full rounded-xl" src="${material.pictureUrl}" />
                                </div>
                                <div class="absolute flex justify-center items-center text-white top-0 right-0 mb-2 py-1 px-2 rounded-xl m-2 text-sm" style="color:#262145;background-color:#FFDA4F;">
                                    ${material.category_count < 100 ? material.category_count : '99+'}
                                </div>
                                <div class="absolute flex justify-center text-white text-xl font-bold bottom-0 left-0 w-full flex items-end pb-2 h-2/4 rounded-xl" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.5));">
                                    <p>${material.name}</p>
                                </div>
                            </div>
                        </a>
                    `);
                })
                supplier_swiper = new Swiper('.supplier-container', supplier_swiper_setting);
            }
        })
        return false;
    });
</script>
<script>
    //Loadmore
    $(document).ready(function() {
        var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
        let allGalleryPosts = <?= $galleryPosts->posts_count ?>;
        let currentGalleryPosts = 4;
        let galleryPostsPerPage = 8;
        let loadMoreBtn = $("#loadmore");

        if (allGalleryPosts > currentGalleryPosts) {
            loadMoreBtn.show();
        }

        loadMoreBtn.click(() => {
            loadMoreBtn.hide();
            getPostByType('post', <?= $galleryCatId ?>, galleryPostsPerPage, currentGalleryPosts);
            if (allGalleryPosts > currentGalleryPosts) {
                loadMoreBtn.show();
            }
        });

        const getPostByType = (postType, galleryCatId, postsPerPage, offset) => {
            var request = {
                'action': 'get_posts_by_cat_json_ajax',
                'postType': postType,
                'postsPerPage': postsPerPage,
                'offset': offset,
                'categoryNo': galleryCatId,
            };

            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: request,
                async: false,
                dataType: "json",
                success: function(postsObject) {
                    console.log(postsObject)
                    currentGalleryPosts += postsObject.posts.length;
                    const posts = postsObject.posts;
                    posts.map((thePost, key) => {
                        $("#gallery-posts").append(`
                        <a href="${thePost.link}" class="${key % 4 === 1 || key % 4 === 2 ? 'w-3/5' : 'w-2/5'}  lg:mb-4 mb-2 relative">
                            <div class="gallery-thumbnail relative ${ key % 2 == 0 ? 'lg:mr-4 mr-2' : '' }">
                                <img class="object-cover w-full h-full rounded-lg" src="${thePost.featuredImage}" />
                                <div class="absolute w-full left-0 bottom-0 lg:p-6 p-3 rounded-lg" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6));">${thePost.title}</div>
                            </div>
                        </a>
                        `);
                    })
                }
            })
        }
    });
</script>