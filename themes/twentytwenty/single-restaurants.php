<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Detail</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <script>
      // Initialize and add the map
      let map;

      function initMap() {
        var lat = '<?php echo get_field('ปักหมุดแผนที่')['lat']; ?>';
        var lng = '<?php echo get_field('ปักหมุดแผนที่')['lng']; ?>';
        // The location of Uluru
        const uluru = { lat: parseFloat(lat), lng: parseFloat(lng) };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
  </script>
</head>

<body style="font-family: 'Noto Sans Thai', sans-serif; background-color: #F2F2F2;" class="w-full">
  <?php
  include 'truefriend-header.php';
  $อาเรย์รูปภาพ = get_field('รูปภาพ');
  $เมนูแนะนำ = get_field('เมนูแนะนำ');
  $restaurant_type = wp_get_post_terms(get_the_ID(), 'restaurant_type');
  $restaurant_products = wp_get_post_terms(get_the_ID(), 'restaurant_product');
  $restaurant_available = get_field('restaurantAvailable');
  $restaurant_delivery_available = get_field('restaurantDeliveryAvailable');
  $restaurant_facility = wp_get_post_terms(get_the_ID(), 'restaurant_facility');
  ?>
  <style>
    #headder {
      background: transparent;
      color: var(--primary);
    }

    #headder svg {
      fill: var(--primary);
    }

    #suppliers-content .swiper-button-next,
    #suppliers-content .swiper-button-prev {
      background-color: #fff;
      border-radius: 100%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #suppliers-content .swiper-button-next:after,
    #suppliers-content .swiper-button-prev:after {
      font-size: 15px;
      color: #000;
    }

    #suppliers-content .swiper-button-disabled {
      display: none;
    }

    #suppliers-content .swiper-button-next {
      right: 1rem;
    }

    #suppliers-content .swiper-button-prev {
      left: 1rem;
    }

    #suppliers-content .banner-slide {
      width: 35%;
      height: 18rem;
    }

    #suppliers-content .banner-slide-menu {
      width: 35%;
      height: 10rem;
    }

    @media (max-width:992px) {

      #suppliers-content .swiper-button-next,
      #suppliers-content .swiper-button-prev {
        display: none;
      }

      #suppliers-content .banner-slide {
        width: 80%;
      }

      #suppliers-content .banner-slide-menu {
        width: 80%;
      }
    }
  </style>

  <!-- Set up your HTML -->
  <section id="suppliers-content" class="text-white pt-32 w-full lg:px-52 px-4" style="color: #262145;">
    <div class="swiper-container pictureSlider">
      <div class="swiper-wrapper pl-4">
        <!-- Slides -->
        <?php
        if ($อาเรย์รูปภาพ):
          foreach ($อาเรย์รูปภาพ as $รูปภาพ) : 
            $image = $defaultImage;
            if(file_exists($รูปภาพ['รูป'])){
                $image = $รูปภาพ['รูป'] ;
            }
          ?>
            <div class="swiper-slide rounded-xl overflow-hidden banner-slide"><img class="object-cover w-full h-full" src="<?= $image ?>" alt="" /></div>
        <?php endforeach;
        endif; ?>

      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div class="flex items-center justify-between mt-12">
      <div class="flex items-center justify-center">
        <div class="text-xs rounded-full text-sm px-4 py-2" style="background-color: #FEDA52;">Restautant hub</div>
        <?php foreach ($restaurant_type as $rstype) : 
          $termImage = $defaultImage;
          if(!empty(get_field('pictureUrl', $rstype)) && file_exists(get_field('pictureUrl', $rstype))){
              $termImage = get_field('pictureUrl', $rstype) ;
          }
          ?>
          <div class="relative rounded-full text-sm px-4 py-2 ml-2 text-white flex items-center" style="background-color: #062241;">
            <img class="w-7 h-7 absolute left-0 ml-1 rounded-full object-cover" src="<?= $termImage ?>" alt="">
            <span class="ml-6 text-xs"><?= $rstype->name ?></span>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="lg:flex hidden lg:px-32 lg:mx-8 px-8 py-5 lg:justify-start justify-center ">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()) ?>"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt=""></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink()) ?>"><img class="w-5 h-5 ml-4" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt=""></a>
        <div copytoclipboard="<?= get_permalink() ?>" class="btn-copytoclipboard"><img class="w-5 h-5 ml-4" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt=""></div>
      </div>
    </div>
    <div class="mt-4">
      <p class="lg:text-4xl text-3xl font-semibold "><?= get_field('ชื่อร้าน') ?></p>
      <?php if (!empty(get_field('telInfo')['telNo'])):?>
        <p class="text-lg mt-2">
          <a href="tel:<?= get_field('telInfo')['telNo'] ?>">
            <?= get_field('telInfo')['telNo'] ?> (<?= get_field('telInfo')['telOwner'] ?>)
          </a>
        </p>
      <?php endif;?>
    </div>
    <div class="lg:mt-12 mt-8">
      <?php if (!empty(get_field('restaurantDetail'))):?>
        <p class="text-gray-500 mb-2">รายละเอียด</p>
        <p class="text-xl"><?= get_field('restaurantDetail') ?></p>
        <hr class="my-5" />
      <?php endif;?>
      <div class="lg:hidden flex justify-end">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()) ?>"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt=""></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink()) ?>"><img class="w-5 h-5 ml-4" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt=""></a>
        <div copytoclipboard="<?= get_permalink() ?>" class="btn-copytoclipboard"><img class="w-5 h-5 ml-4" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt=""></div>
        <hr class="my-5" />
      </div>
      <?php if (!empty($restaurant_products)):?>
        <p class="text-gray-500 mb-2">สินค้า</p>
        <div class="flex flex-wrap">
          <?php foreach ($restaurant_products as $rp) : ?>
            <span class="border rounded-full px-4 py-1 text-center mr-2" style="border-color: #262145; min-width: 5rem;"><?= $rp->name ?></span>
          <?php endforeach; ?>
        </div>
        <hr class="my-5" />
      <?php endif;?>
      <p class="text-gray-500 mb-2">เวลาเปิดร้าน</p>
      <?php foreach ($restaurant_available as $ra) : ?>
        <p class="text-xl"><?= $ra['restaurantDay'] ?> <?= $ra['restaurantOpen'] ?> - <?= $ra['restaurantClose'] ?> น.</p>
      <?php endforeach; ?>
      <hr class="my-5" />
      <?php if (!empty(get_field('ปักหมุดแผนที่'))):?>
        <div class="flex items-center justify-between mb-2 lg:mx-0 mx-4">
          <p class="text-gray-500 mb-2">สถานที่และเส้นทาง</p>
          <a target="_blank" href="https://maps.google.com/?q=<?=get_field('ปักหมุดแผนที่')['lat']?>,<?=get_field('ปักหมุดแผนที่')['lng']?>" class="font-semibold">เปิดใน Google Map</a>
        </div>
        <div id="map"  style="height: 60vh;">
          <!-- GOOGLE MAP -->
        </div>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3pXEQOhjrbzcdYXvB-K6T336pRJx0XJ0&callback=initMap&libraries=&v=weekly"
          async
        ></script>
        <hr class="my-5" />
      <?php endif;?>
      
      <?php if (!empty($เมนูแนะนำ)):?>
        <p class="text-gray-500 mb-2">เมนูแนะนำ</p>
        <div class="swiper-container menuSlider">
          <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach ($เมนูแนะนำ as $เมนู) : ?>
              <div class="swiper-slide rounded-xl overflow-hidden banner-slide-menu">
                <img class="object-cover w-full h-full" src="<?= $เมนู['menuPic'] ?>" alt="" onerror="this.src='<?= $defaultImage ?>';"/>
              </div>
            <?php endforeach ?>
          </div>
        </div>
        <hr class="my-5" />
      <?php endif;?>
      <p class="text-gray-500 lg:mb-2">ช่วงราคา</p>
      <p class="lg:text-xl"><?= get_field('ช่วงราคาอาหาร')['priceStart'] ?> - <?= get_field('ช่วงราคาอาหาร')['priceEnd'] ?> บาท</p>
        <hr class="my-5" />
      <p class="text-gray-500 lg:mb-2">เวลาเปิด-ปิด เดลิเวอรี่</p>
      <?php foreach ($restaurant_delivery_available as $rda) : ?>
        <p class="lg:text-xl"><?= $rda['restaurantDeliveryDay'] ?> <?= $rda['restaurantDeliveryOpen'] ?> - <?= $rda['restaurantDeliveryClose'] ?> น.</p>
      <?php endforeach; ?>
      <hr class="my-5" />
      <?php if (!empty(get_field('seat'))):?>
        <p class="text-gray-500 lg:mb-2">จำนวนที่นั่ง</p>
        <p class="lg:text-xl">มากกว่า <?= get_field('seat') ?> ที่นั่ง</p>
        <hr class="my-5" />
      <?php endif;?>
      <?php if (!empty($restaurant_products)):?>
        <p class="text-gray-500 lg:mb-2">สิ่งอำนวยความสะดวก</p>
        <div class="flex flex-wrap lg:mt-0 mt-4">
          <?php foreach ($restaurant_facility as $rfa) : ?>
            <span class="border rounded-full px-4 py-1 text-center mr-2 lg:mb-0 mb-2" style="border-color: #262145; min-width: 5rem;"><?= $rfa->name ?></span>
          <?php endforeach; ?>
        </div>
        <hr class="my-5" />
      <?php endif;?>
      <?php if (!empty(get_field('จำนวนสาขา'))):?>
        <p class="text-gray-500 mb-2">จำนวนสาขา</p>
        <p class="text-xl"><?= get_field('จำนวนสาขา') ?> สาขา (ข้อมูลเมื่อ <?= get_field('branchCountLastUpdate') ?>)</p>
        <hr class="my-5" />
      <?php endif;?>
      <?php if (!empty(get_field('ข้อมูลเพิ่มเติมอื่นๆ'))):?>
        <p class="text-gray-500 mb-2">ข้อมูลเพิ่มเติมอื่นๆ</p>
        <p class="text-xl"><?= get_field('ข้อมูลเพิ่มเติมอื่นๆ') ?></p>
        <hr class="my-5" />
      <?php endif;?>
      <?php if (!empty(get_field('ช่องทางติดตาม')['facebook_page']) && !empty(get_field('ช่องทางติดตาม')['line'])):?>
        <div class="pb-8">
          <p class="lg:text-gray-500 mb-2">Social Media</p>
          <div>
            <?php if (!empty(get_field('ช่องทางติดตาม')['facebook_page'])):?>
              <p>
                <a target="_blank" href="https://<?= get_field('ช่องทางติดตาม')['facebook_page']?>">
                  <span class="font-semibold">Facebook: </span><?= get_field('ช่องทางติดตาม')['facebook_page'] ?>
                </a>
              </p>
            <?php endif;?>
            <?php if (!empty(get_field('ช่องทางติดตาม')['line'])):?>
              <p>
                <a target="_blank" href="https://line.me/ti/p/~<?= get_field('ช่องทางติดตาม')['line']?>">
                  <span class="font-semibold">Line: </span><?= get_field('ช่องทางติดตาม')['line'] ?>
                </a>
              </p>
            <?php endif;?>
          </div>
        </div>
        <?php endif;?>
    </div>
  </section>
  <div class="w-full h-72 flex flex-col items-center justify-center" style="background-color: #FEDA52;">
    <span class="text-3xl font-bold">
      ลงทะเบียน Restaurant ฟรี
    </span>
    <a class="rounded-full py-3 px-24 bg-white my-6" href="<?=get_site_url()?>/restaurant-register">
      ลงทะเบียน
    </a>
  </div>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function() {
    var lastestCoursesSlider = new Swiper('.menuSlider', {
      slidesPerView: 'auto',
      spaceBetween: 15,
    });

    const swiper = new Swiper('.pictureSlider', {
      slidesPerView: 'auto',
      spaceBetween: 15,
      // loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      // breakpoints: {
      //   992: {
      //   },
      // }
    });
  });
</script>
