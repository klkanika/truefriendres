<?php
require_once('custom-classes/class-posts.php');
$Restaurant101PostsObject = Post::getPostsByCategory('post', get_category_by_slug('restaurant101')->cat_ID, 20, 0, null);
$Restaurant101Posts = $Restaurant101PostsObject->posts;
?>
<section id="restaurant101" class="pt-8 lg:pl-8 pl-4 test" style="color:#062241;">
  <div class="lg:mb-4 mb-8 flex justify-between items-center">
    <p class="font-bold text-2xl">Restaurant 101</p>
    <a href="restaurant-101" class="lg:text-base text-xs font-bold lg:mr-8 mr-4">ดูทั้งหมด (<?= count($Restaurant101Posts); ?>)</a>
  </div>
  <?php
  $restaurantCategoriesObject = acf_get_field('restaurant_101_category');
  $restaurantCategories = $restaurantCategoriesObject['choices'];
  ?>
  <div class="swiper-container mb-6">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="tab-button select-none cursor-pointer tab-button-active border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs swiper-slide">ทั้งหมด</div>
      <?php foreach ($restaurantCategories as $category) : ?>
        <div class="tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs swiper-slide"><?= $category ?></div>
      <?php endforeach; ?>
    </div>
  </div>
  <div id="restaurant101Slider" class="owl-carousel pb-16 border-red-900 border-b" style="border-color:#E9E9E9">
    <?php foreach ($Restaurant101Posts as $thePost) : ?>
      <a href="<?= $thePost->link ?>">
        <div class="relative fourthSliderClass">
          <img class="object-cover w-full h-full rounded-xl" src="<?= $thePost->featuredImage ?>" />
          <div class="border-white border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-white text-xs">อ่านต่อ</div>
          <img class="absolute top-5 left-5" src="<?= get_theme_file_uri() ?>/assets/images/101.svg" style="width: 40px;" />
          <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0 text-white">
            <p class="lg:text-xs text-xs mb-1"><?= $thePost->restaurantCategory[0] ?></p>
            <p class="lg:text-lg text-xs"><?= $thePost->title; ?></p>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
  <!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
  <script>
    $(window).resize(function() {
      // $("#tabSlider").trigger('destroy.owl.carousel');
      // $("#tabSlider").owlCarousel({
      //   items: $(window).width() < 1024 ? 3.5 : 7.5,
      //   margin: 10,
      //   slideBy: 1,
      //   dots: false,
      // });
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
      // $("#tabSlider").owlCarousel({
      //   items: $(window).width() < 1024 ? 3.5 : 7.5,
      //   margin: 10,
      //   slideBy: 0,
      //   dots: false,
      //   nav: false,
      // });
      $("#restaurant101Slider").owlCarousel({
        items: $(window).width() < 1024 ? 1.1 : 2.25,
        loop: true,
        // autoplay: true,
        autoplayHoverPause: true,
        slideBy: 1,
        margin: 20,
        dots: false,
      });
      const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        loop: false,
        slidesPerView: 3.5,
        spaceBetween: 10,
        breakpoints: {
          1024: {
            slidesPerView: 7.5,
            spaceBetween: 10,
          },
        }
      });
    });
  </script>
</section>