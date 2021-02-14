<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Offline Courses Detail</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js"></script>
</head>

<?php
require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$documentsPosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'offline-courses-detail',
    array_map(function ($c) {
      return $c->slug;
    }, $p->categories)
  );
});
echo '<script>console.log("PHP error: ' . $knowledgePosts . '")</script>';
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <style>
    #headder {
      background: transparent;
    }

    .burger-bar,
    .balloon-chat {
      fill: #262145;
    }

    .logo {
      color: #262145;
    }

    #documents {
      background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-b.svg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: 100%;
    }

    @media (max-width: 992px) {
      #documents {
        background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-b-mobile.svg');
      }
    }

    .flickity-button:disabled {
      display: none;
    }

    .carousel {
      background: transparent;
    }

    .carousel-cell {
      width: 240px;
      height: 193px;
      margin-right: 10px;
      background: #C4C4C4;
      border-radius: 5px;
      counter-increment: gallery-cell;
    }

    @media screen and (min-width: 768px) {

      /* half-width cells for larger devices */
      .carousel-cell {
        width: 440px;
        height: 293px;
      }
    }

    /* cell number */
    .carousel-cell:before {
      display: block;
      text-align: center;
      /* content: counter(gallery-cell); */
      line-height: 200px;
      font-size: 80px;
      color: white;
    }
  </style>

  <section id="documents" class="text-white pt-32 w-full flex items-center flex-col" style="background-color: #F2F2F2; color:#262145;">
    <div class="carousel w-full md:pl-32 hidden md:block" 
      data-flickity='{ "cellAlign": "left", "pageDots": false }'>
      <div class="carousel-cell"></div>
      <div class="carousel-cell"></div>
      <div class="carousel-cell"></div>
      <div class="carousel-cell"></div>
      <div class="carousel-cell"></div>
    </div>
    <div class="carousel w-full px-4 block md:hidden" 
      data-flickity='{ "freeScroll": true, "contain": true, "prevNextButtons": false, "pageDots": false }'>
      <div class="carousel-cell"></div>
      <div class="carousel-cell"></div>
      <div class="carousel-cell"></div>
      <div class="carousel-cell"></div>
      <div class="carousel-cell"></div>
    </div>

    <div class="w-full md:pl-32 md:pr-32 mt-16 mb-12 px-4">
      <div class="flex items-center justify-between">
        <button class="h-10 rounded-full flex items-center justify-center p-4 md:p-6 font-bold hover:bg-gray-50 focus:outline-none" style="background-color:#262145; color: #DBDBDB;">
          offline
        </button>
        <div class="flex">
          <a href="" class="mr-4"><img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
          <a href="" class="mr-4"><img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
          <a href=""><img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
        </div>
      </div>
      <p class="text-2xl md:text-5xl font-bold my-6">บริหารร้านอาหารให้โตแบบก้าวกระโดด</p>
      <div class="flex mb-2 md:mb-6">
        <button type="submit" class="flex h-14 p-4 rounded-lg" style="background-color:#FFD950; color: #262145;">
          <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/icon-clock.svg" alt="">
          <span class="text-sm md:text-base pl-2 font-bold">ปิดรับสมัครในอีก 3 วัน</span>
        </button>
        <div class="flex p-4">
          <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/icon-person.svg" alt="">
          <span class="text-sm md:text-base pl-2 font-bold" style="color: #B82020;">10 ท่านสุดท้าย</span>
        </div>
      </div>
      <a href="" class="w-full lg:w-1/2 px-4">
        <div class="w-full lg:h-80 h-56 bg-cover bg-center rounded-xl relative" style="background-image:url('<?= get_theme_file_uri() ?>/assets/images/img-default.jpg')">
          <img class="absolute right-0 bottom-0 mr-4 mb-4 w-10 h-10 lg:w-12 lg:h-12" src="<?= get_theme_file_uri() ?>/assets/images/play-btn.svg" />
        </div>
      </a>
      <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">รายละเอียด</p>
      <p>เสวนาเปิดใจผู้บริหารมืออาชีพ 3 ท่าน ที่จะมาบอกกลยุทธ์ อุปสรรค ปัจจัยความสำเร็จ แนวทางบริหาร วิธีการขยายธุรกิจ วิธีสร้างแบรนด์ เทคนิคการบริหารพนักงาน และอื่นๆที่สำคัญต่อความสำเร็จ ในการสร้างธุรกิจอาหาร</p>

      <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">ผู้สอน</p>
      <p>สถาบัน ธุรกิจแฟรนไชส์อาหาร</p>

      <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">เนื้อหาของคอร์สนี้</p>
      <p>Part 1: ก่อนจะริเริ่มธุรกิจอาหาร….เตรียมตัวอย่างไร?</p>
      <p>Part 2: ร้านแรกในเมืองไทย...ทำอย่างไรให้ประสบความสำเร็จ</p>
      <p>Part 3: ขยายธุรกิจอาหารแบบก้าวกระโดด</p>
      <p>Part 4: ถาม-ตอบ</p>

    </div>
  </section>

  <section id="register" class="text-white py-16 w-full flex items-center flex-col" style="background-color: #FFD950; color:#262145;">
    <p class="text-5xl font-bold pb-4">ลงทะเบียนเรียน</p>
    <button class="h-10 rounded-full w-4/12 flex items-center justify-center p-2 font-bold hover:bg-gray-50 focus:outline-none" style="background-color:#FFFFFF; color: #000000;">
      ลงทะเบียน
    </button>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $(".owl-carousel").owlCarousel({
      items: $(window).width() < 1024 ? 1.3 : 4,
      loop: true,
      // autoplay: true,
      autoplayHoverPause: true,
      slideBy: 2,
      margin: 16,
      dots: false,
    });
  });
</script>