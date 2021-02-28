<?php $interviewPosts = Post::getPostsByCategory('interviews', null, 8, 0, [get_the_ID()]); ?>
<section id="section-3rdSlider" class="pt-14 pb-10 lg:px-8 lg:px-4 text-white" style="background-color:#19181F;">
    <div class="mb-6 flex justify-between lg:px-0 px-4">
        <p class="font-bold text-2xl lg:mb-0 mb-2">Interview</p>
        <div class="flex items-center">
            <a href="interviews" class="lg:mr-6 lg:text-base text-xs font-bold">ดูทั้งหมด (<?= $interviewPosts->posts_count ?>)</a>
            <!-- 3rd navigator -->
            <div class="lg:flex items-center justify-between w-16 hidden">
                <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-left.svg" referTo="3rdSlider" class="cursor-pointer toTheLeft" />
                <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right.svg" referTo="3rdSlider" class="cursor-pointer toTheRight" />
            </div>
        </div>
    </div>
    <div id="3rdSlider" class="owl-carousel lg:pl-0 pl-4 w-full">
        <?php
        foreach ($interviewPosts->posts as $thePost) {
        ?>
            <div class="relative cursor-pointer" onclick="window.open('<?= $thePost->link ?>','_self')">
                <div style="height:60vh">
                    <img class="object-cover w-full h-full rounded-xl" src="<?= $thePost->featuredImage ?>" />
                </div>
                <?php if ($thePost->intervieweeBusinessLogo) : ?>
                    <div class="absolute top-3 left-3" style="width:45px;height:45px;">
                        <img class="object-cover w-full h-full rounded-full" src="<?= $thePost->intervieweeBusinessLogo ?>" />
                    </div>
                <?php endif; ?>
                <div class="absolute left-0 bottom-0 w-full rounded-b-xl" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.8));">
                    <div class="ml-6 mb-6 mr-6">
                        <p class="font-bold text-white text-base mb-2"><?= $thePost->intervieweeBusiness ? $thePost->intervieweeBusiness : $thePost->interviewee ?></p>
                        <p class="text-white text-base"><?= $thePost->title ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>