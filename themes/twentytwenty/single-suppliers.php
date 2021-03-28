<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suppliers</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <script>
    // Initialize and add the map
    let map;

    function initMap() {
      var lat = '<?php echo get_field('ปักหมุดแผนที่')['lat']; ?>';
      var lng = '<?php echo get_field('ปักหมุดแผนที่')['lng']; ?>';
      // The location of Uluru
      const uluru = {
        lat: parseFloat(lat),
        lng: parseFloat(lng)
      };
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
<?php
require_once('custom-classes/class-provinces.php');
require_once('custom-classes/class-suppliertypes.php');
$supplierTypes = wp_get_post_terms(get_the_ID(), 'suppliertypes', array('orderby' => 'name'));
$supplierGoods = wp_get_post_terms(get_the_ID(), 'suppliergoods');
$อาเรย์รูปภาพ = get_field('รูปภาพ');
$อาเรย์สินค้า = get_field('สินค้าที่จำหน่าย');
$อาเรย์สถานที่จัดส่ง = get_field('สถานที่จัดส่ง');
$ภาคการจัดส่ง = array('ภาคกลาง' => false, 'ภาคตะวันตก' => false, 'ภาคตะวันออก' => false, 'ภาคตะวันออกเฉียงเหนือ' => false, 'ภาคเหนือ' => false, 'ภาคใต้' => false);
$โซเชียลมีเดีย = get_field('โซเชียลมีเดีย');
$รายละเอียดเจ้าของธุรกิจ = get_field('รายละเอียดเจ้าของธุรกิจ');
foreach ($อาเรย์สถานที่จัดส่ง as $จังหวัดจัดส่ง) {
  foreach ($provinces as $ภาค => $อาเรย์จังหวัด) {
    if (in_array($จังหวัดจัดส่ง, $อาเรย์จังหวัด)) {
      $ภาคการจัดส่ง[$ภาค] = true;
    }
  }
}
?>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <style>

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

    @media (max-width:992px) {

      #suppliers-content .swiper-button-next,
      #suppliers-content .swiper-button-prev {
        display: none;
      }

      #suppliers-content .banner-slide {
        width: 80%;
      }
    }
  </style>
  <section id="suppliers-content" class="text-white pt-32 w-full" style="background-color:#f2f2f2;color:#262145;">
    <!-- Slider main container -->
    <div class="swiper-container supplier-swiper">
      <div class="swiper-wrapper md:mx-12 mx-4">
        <!-- Slides -->
        <?php
        if ($อาเรย์รูปภาพ) {
          $image = $defaultImage;
          foreach ($อาเรย์รูปภาพ as $รูปภาพ) :
            $image = $รูปภาพ['image'];
        ?>
            <div class="swiper-slide rounded-xl overflow-hidden banner-slide">
              <img class="object-cover w-full h-full" src="<?= $image ?>" alt="" onerror="this.src='<?= $defaultImage ?>'"/>
            </div>
        <?php
          endforeach;
        } ?>

      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <section class="md:mx-12 mx-4 mt-16" id="content" style="color:#062241">
      <div class="w-full flex lg:mx-0">
        <div class="flex flex-wrap gap-x-3 lg:w-4/5 w-full pl-4 lg:pl-0">
          <div class="flex flex-wrap gap-2">
            <a class="text-xs rounded-full text-sm px-4 py-2 mb-2" style="background-color: #FEDA52;" href="<?= get_site_url() ?>/supplier-hub">Supplier hub</a>
            <?php foreach ($supplierTypes as $supplierType) : ?>
              <a href="<?= get_site_url() ?>/supplier-hub?type=<?= $supplierType->term_id ?>" class="relative rounded-full text-sm px-4 py-2 mb-2 text-white flex items-center cursor-pointer select-none" style="background-color: #062241;">
                <img class="w-7 h-7 absolute left-0 ml-1 rounded-full object-cover" src="<?= get_field('pictureUrl', $supplierType) ?>" onerror="this.src='<?= $defaultImage ?>'" alt="">
                <span class="ml-6 text-xs text-en"><?= $supplierType->name ?></span>
              </a>
            <?php endforeach ?>
          </div>
        </div>
        <div class="items-center justify-center flex-wrap gap-4 w-1/5 hidden lg:flex">
          <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
          <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink()) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
          <div copytoclipboard="<?= get_permalink() ?>" class="btn-copytoclipboard"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
        </div>
      </div>
      <div class="mx-4 lg:mx-0">
        <h1 class="text-4xl font-bold mt-4"><?= get_field('ชื่อธุรกิจ') ?></h1>
        <h2 class="text-lg mt-3"><?= get_field('รายละเอียดเจ้าของธุรกิจ')['เบอร์โทร'] ?> (<?= get_field('รายละเอียดเจ้าของธุรกิจ')['ชื่อ'] ?>)</h2>
        <?php if (!empty(get_field('แนะนำธุรกิจ'))) : ?>
          <p class="text-sm mt-8" style="color:rgba(6,34,65,0.5)">รายละเอียด</p>
          <p class="text-base mt-1"><?= get_field('แนะนำธุรกิจ') ?></p>
        <?php endif; ?>
        <div class="items-center justify-end flex-wrap gap-4 lg:hidden flex">
          <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
          <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink()) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
          <div copytoclipboard="<?= get_permalink() ?>" class="btn-copytoclipboard"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
        </div>
      </div>
      <hr class="my-5" />
      <?php if (!empty($supplierGoods)) : ?>
        <div class="mx-4 lg:mx-0">
          <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">สินค้า</p>
          <div class="flex flex-wrap">
            <?php foreach ($supplierGoods as $sg) : ?>
              <div style="border:1px solid #062241" class="px-4 lg:px-8 py-1 mr-2 rounded-full mb-2 text-xs lg:text-base"><?= $sg->name ?></div>
            <?php endforeach ?>
          </div>
        </div>
        <hr class="my-5" />
      <?php endif; ?>
      <?php if (!empty($อาเรย์สถานที่จัดส่ง)) : ?>
        <div class="mx-4 lg:mx-0">
          <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">พื้นที่การจัดส่ง</p>
          <div class="flex flex-wrap">
            <?php foreach ($ภาคการจัดส่ง as $ภาค => $มีภาค) : ?>
              <?= $มีภาค ? '<div style="border:1px solid #062241" class="px-4 lg:px-8 py-1 mr-2 rounded-full mb-2 text-xs lg:text-base">' . $ภาค . '</div>' : '' ?>
            <?php endforeach ?>
          </div>
        </div>
        <hr class="my-5" />
      <?php endif; ?>
      <div class="mx-4 lg:mx-0">
        <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">ติดต่อ / Social media</p>
        <div class="flex flex-col">
          <?php if (!empty($รายละเอียดเจ้าของธุรกิจ['เบอร์โทร'])) : ?>
            <a href="tel:<?= $รายละเอียดเจ้าของธุรกิจ['เบอร์โทร'] ?>" class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/phone-icon.svg" alt="" /><?= $รายละเอียดเจ้าของธุรกิจ['เบอร์โทร'] ? $รายละเอียดเจ้าของธุรกิจ['เบอร์โทร'] : '-' ?> <?= $รายละเอียดเจ้าของธุรกิจ['เบอร์โทร'] ? '(' . $รายละเอียดเจ้าของธุรกิจ['ชื่อ'] . ')' : '' ?></a>
          <?php endif; ?>
          <?php if (!empty($โซเชียลมีเดีย['line'])) : ?>
            <a target="_blank" href="https://line.me/ti/p/~<?= $โซเชียลมีเดีย['line'] ?>" class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/line-icon.svg" alt="" /><?= $โซเชียลมีเดีย['line'] ? $โซเชียลมีเดีย['line'] : '-' ?></a>
          <?php endif; ?>
          <?php if (!empty($รายละเอียดเจ้าของธุรกิจ['email'])) : ?>
            <a href="mailto:<?= $รายละเอียดเจ้าของธุรกิจ['email'] ?>" class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/email-icon.svg" alt="" /><?= $รายละเอียดเจ้าของธุรกิจ['email'] ? $รายละเอียดเจ้าของธุรกิจ['email'] : '-' ?></a>
          <?php endif; ?>
          <?php if (!empty($โซเชียลมีเดีย['facebook'])) : ?>
            <a target="_blank" href="https://<?= $โซเชียลมีเดีย['facebook'] ?>" class="flex items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /><?= $โซเชียลมีเดีย['facebook'] ? $โซเชียลมีเดีย['facebook'] : '-' ?></a>
          <?php endif; ?>
        </div>
      </div>
      <hr class="my-5" />
      <?php if (!empty(get_field('ปักหมุดแผนที่'))) : ?>
        <div class="mx-4 lg:mx-0 mb-4 flex items-center justify-between">
          <p class="text-sm" style="color:rgba(6,34,65,0.5)">แผนที่</p>
          <a target="_blank" href="https://maps.google.com/?q=<?= get_field('ปักหมุดแผนที่')['lat'] ?>,<?= get_field('ปักหมุดแผนที่')['lng'] ?>" class="text-base mt-1 font-bold">เปิดใน Google Maps</a>
        </div>
        <div id="map" style="background-color:#C4C4C4;" class="flex items-center justify-center h-96"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3pXEQOhjrbzcdYXvB-K6T336pRJx0XJ0&callback=initMap&libraries=&v=weekly" async></script>
      <?php endif; ?>
    </section>
    <?php
    $args = array(
      'taxonomy' => 'suppliertypes',
      'orderby' => 'count',
      'order'   => 'DESC',
      'number' => 100
    );
    $suppliertypes = get_categories($args);
    $thumbnail_slider_title = 'Supplier hub';
    $thumbnail_slider_sub_title = 'แหล่งรวมเบอร์ติดต่อ Supplier ประเภทต่างๆ';
    $thumbnail_slider_type = 'supplier-hub';
    $thumbnail_slider_material = $suppliertypes;
    $post_type = 'suppliers';
    $category_name = 'suppliertypes';
    include 'truefriend-thumbnail-slider.php';
    ?>
    <div class="w-full h-72 flex flex-col items-center justify-center" style="background-color: #FEDA52;">
      <span class="text-3xl font-bold">
        ลงทะเบียน Supplier ฟรี
      </span>
      <a href="<?= get_site_url() ?>/supplier-register" class="rounded-full py-3 px-24 bg-white my-6">
        ลงทะเบียน
      </a>
    </div>
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
    $(".tab-button").click(function(e) {
      $(".tab-button").removeClass('tab-button-active')
      $(this).addClass('tab-button-active')
    });

    const swiper = new Swiper('.supplier-swiper', {
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>