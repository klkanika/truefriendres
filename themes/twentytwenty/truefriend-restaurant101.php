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
  <div class="swiper-container res101cat-container mb-6">
    <div class="swiper-wrapper">
      <div class="tab-button select-none cursor-pointer tab-button-active border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs swiper-slide res101-cat" value="">ทั้งหมด</div>
      <?php foreach ($restaurantCategories as $category) : ?>
        <div class="tab-button select-none cursor-pointer border-black-400 border flex items-center justify-center rounded-full lg:text-base text-xs swiper-slide res101-cat" value="<?= $category ?>"><?= $category ?></div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="swiper-container res101-container pb-16 mb-6" style="border-color:#E9E9E9">
    <div class="swiper-wrapper" id="res101-wrapper">
      <?php foreach ($Restaurant101Posts as $thePost) : ?>
        <a href="<?= $thePost->link ?>" class="swiper-slide">
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
  </div>
  <!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
  <script>
    // $(window).resize(function() {
    //   $("#restaurant101Slider").trigger('destroy.owl.carousel');
    //   $("#restaurant101Slider").owlCarousel({
    //     items: $(window).width() < 1024 ? 1.1 : 2.25,
    //     loop: true,
    //     // autoplay: true,
    //     autoplayHoverPause: true,
    //     slideBy: 1,
    //     margin: 20,
    //     dots: false,
    //   });

    // });

    $(document).ready(function() {
      const ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
      const res101_swiper_setting = {
        slidesPerView: 1.1,
        spaceBetween: 5,
        loop: false,
        breakpoints: {
          1024: {
            slidesPerView: 2.25,
            spaceBetween: 15,
          }
        }
      };
      let res101_swiper = new Swiper('.res101-container', res101_swiper_setting);

      const swiper = new Swiper('.res101cat-container', {
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

      $(".res101-cat").click(function() {
        const value = $(this).attr('value');
        const request = {
          'action': 'get_posts_by_acf_field_json_ajax',
          'postType': 'post',
          'postsPerPage': 20,
          'categoryNo': <?= get_category_by_slug('restaurant101')->cat_ID ?>,
          'acf_fields': [{
            field: 'restaurant_101_category',
            compare: 'LIKE',
            value: value,
          }]
        };

        $.ajax({
          type: "POST",
          url: ajaxurl,
          data: request,
          async: false,
          dataType: "json",
          success: function(postsObject) {
            console.log(postsObject)
            res101_swiper.destroy();
            $("#res101-wrapper").html(``);
            postsObject.map((thePost, i) => {
              $("#res101-wrapper").append(`
                <a href="${thePost.link}" class="swiper-slide">
                  <div class="relative fourthSliderClass">
                    <img class="object-cover w-full h-full rounded-xl" src="${thePost.pictureUrl}" />
                    <div class="border-white border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mr-5 mt-3 mb-3 absolute top-0 right-0 text-white text-xs">อ่านต่อ</div>
                    <img class="absolute top-5 left-5" src="<?= get_theme_file_uri() ?>/assets/images/101.svg" style="width: 40px;" />
                    <div class="rounded-xl lg:ml-5 lg:mr-5 ml-4 mr-4 mb-5 absolute bottom-0 left-0 text-white">
                      <p class="lg:text-xs text-xs mb-1">${value ? value : thePost.restaurantCategory}</p>
                      <p class="lg:text-lg text-xs">${thePost.title}</p>
                    </div>
                  </div>
                </a>
              `);
            })
            res101_swiper = new Swiper('.res101-container', res101_swiper_setting);
          }
        })
      })
    });
  </script>
</section>