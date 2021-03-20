<?php
$count_material = 0;
$count_material = wp_count_posts($post_type)->publish;
?>
<section class="text-white pt-8 w-full lg:px-52 px-4" style="color: #262145;">
    <div class="flex items-center justify-between">
        <p class="text-2xl font-bold"><?= $thumbnail_slider_title ?></p>
        <div class="flex lg:items-center font-semibold">
            <form id="thumbnail-search">
                <div style="border:1px solid #062241;background-color:#f2f2f2" class="rounded-full flex justify-center hidden mr-6" id="thumbnail-search-field">
                    <input type="text" class="rounded-full h-12 px-4 focus:outline-none" placeholder="search..." style="background-color:inherit" id="thumbnail-input" />
                    <button type="submit" class="cursor-pointer pr-2">
                        <img src="<?= get_theme_file_uri() ?>/assets/images/magnifier.svg" />
                    </button>
                </div>
            </form>
            <span class="mr-8 lg:block hidden cursor-pointer" id="thumbnail-search-btn">ค้นหา</span>
            <a href="<?= get_site_url() ?>/<?= $thumbnail_slider_type ?>" class="lg:mr-8 lg:text-base text-xs">ดูทั้งหมด (<?= $count_material < 1000 ? $count_material : '999+' ?>)</a>
            <div class=" lg:flex hidden items-center justify-between w-12 ">
                <img src="<?= get_theme_file_uri() ?>/assets/images/left.svg" class="cursor-pointer swiper-thumbnail-button-prev" />
                <img src="<?= get_theme_file_uri() ?>/assets/images/chev-right.svg" class="cursor-pointer swiper-thumbnail-button-next" />
            </div>
        </div>
    </div>
    <p><?= $thumbnail_slider_sub_title ?></p>

    <div class="swiper-container thumbnail-container">
        <div class="swiper-wrapper" id="thumbnail-wrapper">
            <?php foreach ($thumbnail_slider_material as $key => $material) :?>
                <?php if ($key % 20 === 0) { ?>
                    <div class="grid lg:grid-cols-5 grid-cols-1 gap-y-3 gap-x-4 py-8 swiper-slide <?= $key % 20 > 0 ? 'lg:flex hidden' : '' ?>">
                    <?php } ?>
                    <a href="<?= get_site_url() ?>/<?= $thumbnail_slider_type ?>?type=<?= $material->term_id ?>" class="border-b border-gray-300 py-2 flex items-center" >
                        <img src="<?= get_field('pictureUrl', $material)?>" class="w-12 h-12 rounded mr-2 object-cover" onerror="this.src='<?= $defaultImage ?>'"/>
                        <div>
                            <p class="font-semibold"><?= $material->name ?></p>
                            <p class="text-sm"><?= $material->count ?> เบอร์โทร</p>
                        </div>
                        <img src="<?= get_theme_file_uri() ?>/assets/images/right.svg" class="w-4 h-4 ml-auto lg:hidden block" />
                    </a>
                    <?php if ($key === count($thumbnail_slider_material) - 1 || $key % 20 === 19) { ?>
                    </div>
                <?php } ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
        const thumbnail_swiper_setting = {
            slidesPerView: 'auto',
            spaceBetween: 15,
            loop: true,
            navigation: {
                nextEl: '.swiper-thumbnail-button-next',
                prevEl: '.swiper-thumbnail-button-prev',
            },
        };
        let thumbnail_swiper = new Swiper('.thumbnail-container', thumbnail_swiper_setting);

        $("#thumbnail-search-btn").click(function() {
            $(this).hide();
            $("#thumbnail-search-field").show();
            $("#thumbnail-input").focus();
        })

        $("#thumbnail-search").submit(function() {
            const keyword = $("#thumbnail-input").val();
            var request = {
                'action': 'get_cat_by_name_json_ajax',
                'keyword': keyword,
                'taxonomy': '<?= $category_name ?>',
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
                    const defaultImage = "<?= $defaultImage ?>";
                    thumbnail_swiper.destroy();
                    $("#thumbnail-wrapper").html(``);
                    postsObject.map((material, i) => {
                        if (i % 20 === 0) {
                            $("#thumbnail-wrapper").append(`<div class="grid lg:grid-cols-5 grid-cols-1 gap-y-3 gap-x-4 py-8 swiper-slide">`);
                        }
                        $(".swiper-slide").last().append(`
                            <a href="<?= get_site_url() ?>/<?= $thumbnail_slider_type ?>?type=${material.cat_ID}" class="border-b border-gray-300 py-2 flex items-center">
                                <img src="${material.pictureUrl}" class="w-12 h-12 rounded mr-2 object-cover" onerror="this.src = '${defaultImage}'"/>
                                <div>
                                    <p class="font-semibold">${material.cat_name}</p>
                                    <p class="text-sm">${material.category_count} เบอร์โทร</p>
                                </div>
                                <img src="<?= get_theme_file_uri() ?>/assets/images/right.svg" class="w-4 h-4 ml-auto lg:hidden block" />
                            </a>
                            `);
                    })
                    thumbnail_swiper = new Swiper('.thumbnail-container', thumbnail_swiper_setting);
                }
            })
            return false;
        });
    });
</script>