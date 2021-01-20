
<?php
  require_once('custom-classes/class-posts.php');
  require_once('custom-classes/class-suppliertypes.php');
  $recentPosts = Post::getPostsByCategory('post', null, 12, 0);
  ?>
<section id="restaurant101" class="pt-8 lg:pl-8 pl-4 test" style="color:#062241;">
  <?php $Restaurant101Posts = array_filter($recentPosts->posts,function($p){
    return in_array('restaurant101', 
    array_map(function($c){return $c->slug;}, $p->categories)
  );
});?>
  <div class="lg:mb-4 mb-8 flex justify-between items-center">
      <p class="font-bold text-2xl">Restaurant 101</p>
      <a href="#" target="_blank" class="lg:text-base text-xs font-bold lg:mr-8 mr-4">ดูทั้งหมด (<?= count($Restaurant101Posts);?>)</a>
  </div>
  <div id="tabSlider" class="owl-carousel lg:mb-8 mb-6" style="border-color:#E9E9E9">
      <div class="tab-button select-none cursor-pointer tab-button-active border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs">ทั้งหมด</div>
      <div class="tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs">ร้านกาแฟ</div>
      <div class="tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs">ร้านชาบู</div>
      <div class="tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs">ร้านติ่มซำ</div>
      <div class="tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs">ร้านชานม</div>
      <div class="tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs">ร้านอาหารไทย</div>
  </div>
  <div id="restaurant101Slider" class="owl-carousel pb-16 border-red-900 border-b" style="border-color:#E9E9E9">
    <?php  foreach($Restaurant101Posts as $thePost):?>
      <a href="<?= $thePost->link ?>" target="_blank">
        <div class="relative fourthSliderClass">
            <img class="object-cover w-full h-full rounded-xl" src="<?= $thePost->featuredImage ?>" />
            <div class="border-white border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-white text-xs">อ่านต่อ</div>
            <img class="absolute top-4 left-4" src="<?= get_theme_file_uri() ?>/assets/images/101.svg" style="width: 40px;" />
            <div class="rounded-xl lg:ml-6 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0 text-white">
                <p class="lg:text-sm text-xs mb-2">ทั่วไป</p>
                <p class="lg:text-lg text-xs"><?= $thePost->title;?></p>
            </div>
        </div>
      </a>
    <?php endforeach;?>
  </div>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script>
    $(window).resize(function() {
        $("#tabSlider").trigger('destroy.owl.carousel');
        $("#tabSlider").owlCarousel({
            items: $(window).width() < 1024 ? 3.5 : 7.5,
            margin: 10,
            slideBy: 1,
            dots: false,
        });
        $("#restaurant101Slider").trigger('destroy.owl.carousel');
        $("#restaurant101Slider").owlCarousel({
            items: $(window).width() < 1024 ? 1.1 : 2.25,
            loop: true,
            // autoplay: true,
            autoplayHoverPause: true,
            slideBy: 1,
            margin: 20,
            dots: false,
        });

    });

    $(document).ready(function() {
        $("#tabSlider").owlCarousel({
            items: $(window).width() < 1024 ? 3.5 : 7.5,
            margin: 10,
            slideBy: 1,
            dots: false,
        });
        $("#restaurant101Slider").owlCarousel({
            items: $(window).width() < 1024 ? 1.1 : 2.25,
            loop: true,
            // autoplay: true,
            autoplayHoverPause: true,
            slideBy: 1,
            margin: 20,
            dots: false,
        });
    });
</script>
</section>