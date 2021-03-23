<?php
$interviewPosts = Post::getPostsByCategory('interviews', null, 8, 0, [get_the_ID()]);
$defaultImage = get_theme_file_uri() . "/assets/images/img-default.jpg";
?>
<div class="overflow-hidden" style="background-color:#19181F;">
    <div class="bro-max-width  carousel-overflow">
        <section id="section-3rdSlider" class="pt-14 pb-10 lg:px-8 lg:px-4 text-white" >
            <div class="mb-6 flex justify-between lg:px-0 px-4">
                <p style="letter-spacing:-0.1rem;" class="font-semibold text-4xl text-en">Interview</p>
                <?php if (!empty($interviewPosts->posts_count)) : ?>
                    <div class="flex items-center">
                        <a href="interviews" class="lg:mr-6 lg:text-base text-xs font-bold button_ghost h-full">ดูทั้งหมด (<?= $interviewPosts->posts_count ?>)</a>
                        <!-- 3rd navigator -->
                        <div class="items-center justify-between  hidden lg:flex">
                            <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-left.svg" referTo="3rdSlider" class="cursor-pointer button_ghost toTheLeft" />
                            <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right.svg" referTo="3rdSlider" class="cursor-pointer button_ghost hilight toTheRight ml-2" />
                        </div>                        
                    </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($interviewPosts->posts_count)) : ?>
                <div id="3rdSlider" class="owl-carousel lg:pl-0 pl-4 w-full">
                    <?php
                    foreach ($interviewPosts->posts as $thePost) {
                    ?>
                        <div class="relative cursor-pointer" onclick="window.open('<?= $thePost->link ?>','_self')">
                            <div style="height:60vh">
                                <img class="object-cover w-full h-full rounded-xl" src="<?= $thePost->featuredImage ?>" onerror="this.src='<?= $defaultImage ?>'" />
                            </div>
                            <?php if ($thePost->intervieweeBusinessLogo) : ?>
                                <div class="absolute top-3 left-3" style="width:45px;height:45px;">
                                    <img class="object-cover w-full h-full rounded-full" src="<?= $thePost->intervieweeBusinessLogo ?>" onerror="this.src='<?= $defaultImage ?>'" />
                                </div>
                            <?php endif; ?>
                            <div class="absolute left-0 bottom-0 w-full rounded-b-xl" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.8));">
                                <div class="ml-6 mb-6 mr-6">
                                    <p class="font-bold text-white text-base mb-2"><?= $thePost->intervieweeBusiness ? $thePost->intervieweeBusiness : $thePost->interviewee ?></p>
                                    <p class="text-white text-sans-serift text-lg font-light 	 leading-relaxed mt-4"><?= $thePost->title ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php else : ?>
                <p>ไม่พบข้อมูล</p>
            <?php endif; ?>
        </section>
    </div>
</div>