<?php
$count_material = 0;
foreach ($thumbnail_slider_material as $material) {
    $count_material += $material->count;
}
?>
<section class="text-white pt-32 w-full lg:px-52 px-4" style="color: #262145;">
    <div class="flex items-center justify-between">
        <p class="text-2xl font-bold"><?= $thumbnail_slider_title ?></p>
        <div class="flex lg:items-center font-semibold">
            <span class="mr-8 lg:block hidden">ค้นหา</span>
            <a href="<?= get_site_url() ?>/<?= $thumbnail_slider_type ?>" class="mr-8 lg:text-base text-xs">ดูทั้งหมด (<?= $count_material < 1000 ? $count_material : '999+' ?>)</a>
            <div class=" lg:flex hidden items-center justify-between w-12 ">
                <img src="<?= get_theme_file_uri() ?>/assets/images/left.svg" class="cursor-pointer" />
                <img src="<?= get_theme_file_uri() ?>/assets/images/chev-right.svg" class="cursor-pointer" />
            </div>
        </div>
    </div>
    <p><?= $thumbnail_slider_sub_title ?></p>

    <div class="grid lg:grid-cols-5 grid-cols-1 gap-y-3 gap-x-4 py-8">
        <?php foreach ($thumbnail_slider_material as $material) : ?>
            <a href="<?= get_site_url() ?>/<?= $thumbnail_slider_type ?>?type=<?= $material->term_id ?>" class="border-b border-gray-300 py-2 flex items-center">
                <img src="<?= get_field('pictureUrl', $material) ? get_field('pictureUrl', $material) :  get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'; ?>" class="w-12 h-12 rounded mr-2 object-cover" />
                <div>
                    <p class="font-semibold"><?= $material->name ?></p>
                    <p class="text-sm"><?= $material->count ?> เบอร์โทร</p>
                </div>
                <img src="<?= get_theme_file_uri() ?>/assets/images/right.svg" class="w-4 h-4 ml-auto lg:hidden block" />
            </a>
        <?php endforeach ?>
    </div>
</section>