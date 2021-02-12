<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Infohub</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
</head>
<?php
require_once('custom-classes/class-posts.php');
$featuredImages = get_field('featuredImages');
$args = array(
  'taxonomy' => 'suppliertypes',
  'orderby' => 'name',
  'order'   => 'ASC'
);
$suppliertypes = get_categories($args);
$theSupplierTypes = get_the_terms(get_the_ID(), 'suppliertypes');
$goods = explode("\r\n", get_field('goods'));
$deliveryAreas = get_field('deliveryArea');
$socialMedia = get_field('socialMedia');
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full" style="background-color:#f2f2f2;color:#262145;">
    <!-- Slider main container -->
    <div class="swiper-container">
      <div class="swiper-wrapper lg:ml-48 ml-4">
        <!-- Slides -->
        <?php foreach ($featuredImages as $featuredImage) : ?>
          <div class="swiper-slide" style="width:auto"><img class="h-72 object-cover rounded-xl" src="<?= $featuredImage['image'] ?>" alt="" /></div>
        <?php endforeach ?>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
    </div>
    <section class="lg:mx-48 lg:mx-4 my-16" id="content" style="color:#062241">
      <div class="w-full flex lg:mx-0 px-4">
        <div class="flex flex-wrap gap-x-3 lg:w-4/5 w-full">
          <a href="<?= get_site_url() ?>/suppliers" class="px-8 py-3 lg:mb-4 mb-2 rounded-full text-base" style="color:#262145;background-color:#FEDA52;">Supplier hub</a>
          <?php foreach ($theSupplierTypes as $theSupplierType) : ?>
            <a href="#" class="pl-14 pr-8 py-3 lg:mb-4 mb-2 rounded-full text-base text-white relative cursor-pointer flex items-center" style="background-color:#062241;">
              <div class="w-10 h-10 absolute left-0 top-1/2 ml-2 rounded-full" style="transform:translate(0,-50%)">
                <img class="object-cover h-full w-full rounded-full" src="<?= get_field('pictureUrl', $theSupplierType) ? get_field('pictureUrl', $theSupplierType) :  get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'; ?>" alt="" />
              </div>
              <?= $theSupplierType->name ?>
            </a>
          <?php endforeach ?>
        </div>
        <div class="items-center justify-center flex-wrap gap-4 w-1/5 hidden lg:flex">
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></a>
        </div>
      </div>
      <div class="mx-4 lg:mx-0">
        <h1 class="text-4xl font-black mt-4"><?= get_field('supplierName') ?></h1>
        <h2 class="text-xl mt-3"><?= get_field('telInfo')['tel'] ?> (<?= get_field('telInfo')['telOwner'] ?>)</h2>
        <p class="text-sm mt-8" style="color:rgba(6,34,65,0.5)">รายละเอียด</p>
        <p class="text-base mt-1"><?= get_field('supplierDetail') ?></p>
        <div class="items-center justify-end flex-wrap gap-4 lg-hidden flex">
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></a>
        </div>
      </div>
      <hr class="my-5" />
      <div class="mx-4 lg:mx-0">
        <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">สินค้า</p>
        <div class="flex flex-wrap">
          <?php foreach ($goods as $g) : ?>
            <div style="border:1px solid #062241" class="px-8 py-1 mr-2 rounded-full mb-2"><?= $g ?></div>
          <?php endforeach ?>
        </div>
      </div>
      <hr class="my-5" />
      <div class="mx-4 lg:mx-0">
        <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">พื้นที่การจัดส่ง</p>
        <div class="flex flex-wrap">
          <?php foreach ($deliveryAreas as $deliveryArea) : ?>
            <div style="border:1px solid #062241" class="px-8 py-1 mr-2 rounded-full mb-2"><?= $deliveryArea ?></div>
          <?php endforeach ?>
        </div>
      </div>
      <hr class="my-5" />
      <div class="mx-4 lg:mx-0">
        <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">ติดต่อ / Social media</p>
        <div class="flex flex-col">
          <div class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/phone-icon.svg" alt="" /><?= $socialMedia['telInfo']['tel'] ? $socialMedia['telInfo']['tel'] : '-' ?> <?= $socialMedia['telInfo']['telOwner'] ? '(' . $socialMedia['telInfo']['telOwner'] . ')' : '' ?></div>
          <div class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/line-icon.svg" alt="" /><?= $socialMedia['line'] ? $socialMedia['line'] : '-' ?></div>
          <div class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/email-icon.svg" alt="" /><?= $socialMedia['email'] ? $socialMedia['email'] : '-' ?></div>
          <div class="flex items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /><?= $socialMedia['facebook'] ? $socialMedia['facebook'] : '-' ?></div>
        </div>
      </div>
      <hr class="my-5" />
      <div class="mx-4 lg:mx-0 mb-4 flex items-center justify-between">
        <p class="text-sm" style="color:rgba(6,34,65,0.5)">แผนที่</p>
        <a href="#" class="text-base mt-1 font-black">เปิดใน Google Maps</a>
      </div>
      <div style="background-color:#C4C4C4;" class="flex items-center justify-center h-96">GOOGLE MAP</div>
    </section>
    <section id="register" style="background-color:#FEDA52;" class="flex flex-col items-center w-full py-24">
      <h1 class="text-3xl font-black">สมัครเป็น Supplier ฟรี</h1>
      <a href="<?= get_site_url() ?>/supplier-register" class="text-center text-xs pt-6">
        <button class="rounded-full px-8 py-3 px-28 bg-white" style="color:#262145">ลงทะเบียน</button>
      </a>
    </section>
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

    const swiper = new Swiper('.swiper-container', {
      // Optional parameters
      slidesPerView: 'auto',
      spaceBetween: 15,
      // breakpoints: {
      //   1024: {
      //     slidesPerView: 'auto',
      //     spaceBetween: 15,
      //   },
      // }
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>