<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suppliers</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>
<?php
require_once('custom-classes/class-provinces.php');
require_once('custom-classes/class-suppliertypes.php');
$supplierTypes = wp_get_post_terms(get_the_ID(), 'suppliertypes');
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
    <div class="swiper-container">
      <div class="swiper-wrapper lg:pl-48 pl-4">
        <!-- Slides -->
        <?php foreach ($อาเรย์รูปภาพ as $รูปภาพ) : ?>
          <div class="swiper-slide rounded-xl overflow-hidden banner-slide"><img class="object-cover w-full h-full" src="<?= $รูปภาพ['image'] ?>" alt="" /></div>
        <?php endforeach ?>

      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <section class="lg:mx-48 lg:mx-4 my-16" id="content" style="color:#062241">
      <div class="w-full flex lg:mx-0">
        <div class="flex flex-wrap gap-x-3 lg:w-4/5 w-full pl-4 lg:pl-0">
          <a href="<?= get_site_url() ?>/suppliers" class="px-8 py-3 lg:mb-4 mb-2 rounded-full text-base" style="color:#262145;background-color:#FEDA52;">Supplier hub</a>
          <?php foreach ($supplierTypes as $supplierType) : ?>
            <a href="<?= get_site_url() ?>/suppliers?suppliertype=<?= $supplierType->term_id ?>" class="pl-14 pr-8 py-3 lg:mb-4 mb-2 rounded-full lg:text-base text-sm text-white relative cursor-pointer flex items-center" style="background-color:#062241;">
              <div class="lg:w-10 lg:h-10 w-8 h-8 absolute left-0 top-1/2 ml-2 rounded-full" style="transform:translate(0,-50%)">
                <img class="object-cover h-full w-full rounded-full" src="<?= get_field('pictureUrl', $supplierType) ? get_field('pictureUrl', $supplierType) :  get_theme_file_uri() . '/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'; ?>" alt="" />
              </div>
              <?= $supplierType->name ?>
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
        <h1 class="text-4xl font-bold mt-4"><?= get_field('ชื่อธุรกิจ') ?></h1>
        <h2 class="text-lg mt-3"><?= get_field('รายละเอียดเจ้าของธุรกิจ')['เบอร์โทร'] ?> (<?= get_field('รายละเอียดเจ้าของธุรกิจ')['ชื่อ'] ?>)</h2>
        <p class="text-sm mt-8" style="color:rgba(6,34,65,0.5)">รายละเอียด</p>
        <p class="text-base mt-1"><?= get_field('แนะนำธุรกิจ') ? get_field('แนะนำธุรกิจ') : '-' ?></p>
        <div class="items-center justify-end flex-wrap gap-4 lg:hidden flex">
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
          <a href=""><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></a>
        </div>
      </div>
      <hr class="my-5" />
      <div class="mx-4 lg:mx-0">
        <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">สินค้า</p>
        <div class="flex flex-wrap">
          <?php foreach ($supplierGoods as $sg) : ?>
            <div style="border:1px solid #062241" class="px-4 lg:px-8 py-1 mr-2 rounded-full mb-2 text-xs lg:text-base"><?= $sg->name ?></div>
          <?php endforeach ?>
        </div>
      </div>
      <hr class="my-5" />
      <div class="mx-4 lg:mx-0">
        <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">พื้นที่การจัดส่ง</p>
        <div class="flex flex-wrap">
          <?php foreach ($ภาคการจัดส่ง as $ภาค => $มีภาค) : ?>
            <?= $มีภาค ? '<div style="border:1px solid #062241" class="px-4 lg:px-8 py-1 mr-2 rounded-full mb-2 text-xs lg:text-base">' . $ภาค . '</div>' : '' ?>
          <?php endforeach ?>
        </div>
      </div>
      <hr class="my-5" />
      <div class="mx-4 lg:mx-0">
        <p class="text-sm mb-2" style="color:rgba(6,34,65,0.5)">ติดต่อ / Social media</p>
        <div class="flex flex-col">
          <div class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/phone-icon.svg" alt="" /><?= $รายละเอียดเจ้าของธุรกิจ['เบอร์โทร'] ? $รายละเอียดเจ้าของธุรกิจ['เบอร์โทร'] : '-' ?> <?= $รายละเอียดเจ้าของธุรกิจ['เบอร์โทร'] ? '(' . $รายละเอียดเจ้าของธุรกิจ['ชื่อ'] . ')' : '' ?></div>
          <div class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/line-icon.svg" alt="" /><?= $โซเชียลมีเดีย['line'] ? $โซเชียลมีเดีย['line'] : '-' ?></div>
          <div class="flex mb-3 items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/email-icon.svg" alt="" /><?= $รายละเอียดเจ้าของธุรกิจ['email'] ? $รายละเอียดเจ้าของธุรกิจ['email'] : '-' ?></div>
          <div class="flex items-center"><img class="w-6 h-6 cursor-pointer mr-4" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /><?= $โซเชียลมีเดีย['facebook'] ? $โซเชียลมีเดีย['facebook'] : '-' ?></div>
        </div>
      </div>
      <hr class="my-5" />
      <div class="mx-4 lg:mx-0 mb-4 flex items-center justify-between">
        <p class="text-sm" style="color:rgba(6,34,65,0.5)">แผนที่</p>
        <a href="#" class="text-base mt-1 font-bold">เปิดใน Google Maps</a>
      </div>
      <div style="background-color:#C4C4C4;" class="flex items-center justify-center h-96">GOOGLE MAP</div>
    </section>
    <section id="register" style="background-color:#FEDA52;" class="flex flex-col items-center w-full py-24">
      <h1 class="text-3xl font-bold">สมัครเป็น Supplier ฟรี</h1>
      <a href="<?= get_site_url() ?>/supplier-register" class="text-center text-xs pt-6">
        <button class="rounded-full px-8 py-3 px-28 bg-white text-lg" style="color:#262145">ลงทะเบียน</button>
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