<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Courses Detail</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
</head>

<?php
require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$documentsPosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'online-courses-detail',
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
    /* Tab content - closed */
    .tab-content {
      max-height: 0;
      -webkit-transition: max-height .35s;
      -o-transition: max-height .35s;
      transition: max-height .35s;
      border-top-left-radius: 0rem;
      border-top-right-radius: 0rem;
    }

    /* :checked - resize to full height */
    .tab input:checked~.tab-content {
      max-height: 100vh;
      border-bottom-width: 2px;
    }

    /* Label formatting when open */
    .tab input:checked+label {
      padding: 0.5rem;
      border-color: #DCDCDC;
      border-top-left-radius: 0rem;
      border-top-right-radius: 0rem;
      border-bottom-left-radius: 0rem;
      border-bottom-right-radius: 0rem;
    }

    /* Icon */
    .tab label::after {
      float: right;
      right: 0;
      top: 0;
      display: block;
      width: 1.5em;
      height: 1.5em;
      line-height: 1.5;
      text-align: center;
      -webkit-transition: all .35s;
      -o-transition: all .35s;
      transition: all .35s;
    }

    /* Icon formatting - closed */
    .tab input[type=checkbox]+label::after {
      content: url(<?= get_theme_file_uri() ?>/assets/images/collapse.svg);

    }

    /* Icon formatting - open */
    .tab input[type=checkbox]:checked+label::after {
      transform: rotate(180deg);

    }

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

    #documents .swiper-button-next,
    #documents .swiper-button-prev {
      background-color: #fff;
      border-radius: 100%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #documents .swiper-button-next:after,
    #documents .swiper-button-prev:after {
      font-size: 15px;
      color: #000;
    }

    #documents .swiper-button-disabled {
      display: none;
    }

    #documents .swiper-button-next {
      right: 1rem;
    }

    #documents .swiper-button-prev {
      left: 1rem;
    }

    #documents .banner-slide {
      width: 35%;
      height: 18rem;
      background-color: #C4C4C4;
    }

    #document .swiper-container {
      padding: "auto";
    }

    @media (max-width:992px) {

      #documents .swiper-button-next,
      #documents .swiper-button-prev {
        display: none;
      }

      #documents .banner-slide {
        width: 80%;
      }
    }
  </style>

  <section id="documents" class="text-white pt-32 w-full flex items-center flex-col" style="background-color: #F2F2F2; color:#262145;">
    <!-- Slider main container -->
    <div class="swiper-container w-full">
      <div class="swiper-wrapper pl-4 md:pl-32">
        <!-- Slides -->
        <!-- <?//php foreach ($อาเรย์รูปภาพ as $รูปภาพ) : ?> -->
        <div class="swiper-slide rounded-xl overflow-hidden banner-slide bg-gray-300">
        </div>
        <div class="swiper-slide rounded-xl overflow-hidden banner-slide bg-gray-300">
        </div>
        <div class="swiper-slide rounded-xl overflow-hidden banner-slide bg-gray-300">
        </div>
        <div class="swiper-slide rounded-xl overflow-hidden banner-slide bg-gray-300">
        </div>
        <!-- <?//php endforeach ?> -->

      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <div class="w-full md:pl-32 md:pr-32 mt-16 mb-12 px-4">
      <div class="flex items-center justify-between">
        <button class="h-10 rounded-full flex items-center justify-center p-4 md:p-6 font-bold hover:bg-gray-50 focus:outline-none" style="background-color:#262145; color: #DBDBDB;">
          offline
        </button>
        <div class="flex">
          <a href="" class="mr-4"><img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/facebook-black-icon.png" alt=""></a>
          <a href="" class="mr-4"><img class="w-8 h-8" src="<?= get_theme_file_uri() ?>/assets/images/twitter-black-icon.png" alt=""></a>
          <a href=""><img class="w-8 h-8 fill-current text-green-600" src="<?= get_theme_file_uri() ?>/assets/images/link-black-icon.png" alt=""></a>
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
        <div class="w-full lg:h-96 h-56 flex items-center justify-center rounded-xl relative bg-gray-400">
          <img class="object-none object-center" src="<?= get_theme_file_uri() ?>/assets/images/play-btn.svg" />
        </div>
      </a>
      <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">รายละเอียด</p>
      <p>เสวนาเปิดใจผู้บริหารมืออาชีพ 3 ท่าน ที่จะมาบอกกลยุทธ์ อุปสรรค ปัจจัยความสำเร็จ แนวทางบริหาร วิธีการขยายธุรกิจ วิธีสร้างแบรนด์ เทคนิคการบริหารพนักงาน และอื่นๆที่สำคัญต่อความสำเร็จ ในการสร้างธุรกิจอาหาร</p>

      <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">ผู้สอน</p>
      <p>สถาบัน ธุรกิจแฟรนไชส์อาหาร</p>

      <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">เนื้อหาของคอร์สนี้</p>
      <div class="block md:hidden">
        <div class="tab w-full overflow-hidden">
          <input class="absolute opacity-0 " id="tab-multi-one" type="checkbox" name="tabs">
          <label class="block p-2 leading-normal cursor-pointer rounded-none border-t-2 border-b-2 mb-2" for="tab-multi-one">
            <span class="font-bold">Part 1: ก่อนจะริเริ่มธุรกิจอาหาร….เตรียมตัวอย่างไร?</span>
          </label>
          <div class="tab-content overflow-hidden leading-normal rounded-none">
            <p class="pl-2 py-2">- ก่อนเริ่มต้นธุรกิจอาหารของ คุณหนึ่งฤทัย ตวงโชคดี ผู้ก่อตั้ง Yakiniku Giants</p>
            <p class="pl-2 py-2">- ก่อนเริ่มต้นธุรกิจอาหารของ คุณวิเชียร อุดมศาสตร์พร CEO Kimju Food</p>
            <p class="pl-2 py-2">- ก่อนเริ่มต้นธุรกิจอาหารของ คุณสุวัฒน์ ทรงพัฒนะโยธิน รองกรรมการผู้จัดการ Chester's Grill</p>
            <p class="pl-2 py-2">- ก่อนจะเป็นร้านแรกที่เมืองไทย (คุณหนึ่งฤทัย)</p>
          </div>
        </div>
        <div class="tab w-full overflow-hidden">
          <input class="absolute opacity-0 " id="tab-multi-two" type="checkbox" name="tabs">
          <label class="block p-2 leading-normal cursor-pointer rounded-none border-b-2 mb-2" for="tab-multi-two">
            <span class="font-bold">Part 2: ร้านแรกในเมืองไทย...ทำอย่างไร ให้ประสบความสำเร็จ</span>
          </label>
          <div class="tab-content overflow-hidden leading-normal rounded-none">
            <p class="pl-2 py-2">- ร้านแรก...ปัญหา อุปสรรค และวิธีแก้ไข (คุณหณึ่งฤทัย)</p>
            <p class="pl-2 py-2">- ต้นทุนมาตรฐานของร้านอาหาร ควรเป็นเท่าไร?</p>
            <p class="pl-2 py-2">- รายได้ต่อหัว และ profit margin ของแต่ละธุรกิจอาหาร ควรเป็นเท่าไร?</p>
          </div>
        </div>
        <div class="tab w-full overflow-hidden">
          <input class="absolute opacity-0 " id="tab-multi-three" type="checkbox" name="tabs">
          <label class="block p-2 leading-normal cursor-pointer rounded-none border-b-2 mb-2" for="tab-multi-three">
            <span class="font-bold">Part 3: ขยายธุรกิจอาหารแบบก้าวกระโดด</span>
          </label>
          <div class="tab-content overflow-hidden leading-normal rounded-none">
            <p class="pl-2 py-2">- เทคนิคการหาพนักงาน และทำอย่างไรเพื่อดึงพนักงาน</p>
            <p class="pl-2 py-2">- กลยุทธ์การเลือกทำเล และสถานที่ - กรณีนอกห้าง</p>
            <p class="pl-2 py-2">- ขยายสาขา...ขยายเอง vs. แฟรนไชส์ อันไหนดีกว่ากัน</p>
          </div>
        </div>
        <div class="tab w-full overflow-hidden">
          <input class="absolute opacity-0 " id="tab-multi-four" type="checkbox" name="tabs">
          <label class="block p-2 leading-normal cursor-pointer rounded-none border-b-2 mb-2" for="tab-multi-four">
            <span class="font-bold">Part 4: ถาม-ตอบ</span>
          </label>
          <div class="tab-content overflow-hidden leading-normal rounded-none">
            <p class="pl-2 py-2">- บริหารงบการเงินอย่างไร</p>
            <p class="pl-2 py-2">- แนวโน้วเศรษฐกิจไทย และผลกระทบต่อธุรกิจอาหาร</p>
            <p class="pl-2 py-2">- สรุป</p>
          </div>
        </div>
      </div>

      <div class="hidden md:flex">
        <div class="w-full overflow-hidden">
          <label class="block p-2 leading-normal rounded-none border-t-2 border-b-2 mb-2">
            <span class="font-bold">Part 1: ก่อนจะริเริ่มธุรกิจอาหาร….เตรียมตัวอย่างไร?</span>
          </label>
          <div class="overflow-hidden leading-normal rounded-none">
            <p class="pl-2 py-2 flex justify-between">
              - ก่อนเริ่มต้นธุรกิจอาหารของ คุณหนึ่งฤทัย ตวงโชคดี ผู้ก่อตั้ง Yakiniku Giants
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - ก่อนเริ่มต้นธุรกิจอาหารของ คุณวิเชียร อุดมศาสตร์พร CEO Kimju Food
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - ก่อนเริ่มต้นธุรกิจอาหารของ คุณสุวัฒน์ ทรงพัฒนะโยธิน รองกรรมการผู้จัดการ Chester's Grill
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - ก่อนจะเป็นร้านแรกที่เมืองไทย (คุณหนึ่งฤทัย)
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
          </div>
        </div>
      </div>

      <div class="hidden md:flex">
        <div class="w-full overflow-hidden">
          <label class="block p-2 leading-normal rounded-none border-t-2 border-b-2 mb-2">
            <span class="font-bold">Part 2: ร้านแรกในเมืองไทย...ทำอย่างไร ให้ประสบความสำเร็จ</span>
          </label>
          <div class="overflow-hidden leading-normal rounded-none">
            <p class="pl-2 py-2 flex justify-between">
              - ร้านแรก...ปัญหา อุปสรรค และวิธีแก้ไข (คุณหณึ่งฤทัย)
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - ต้นทุนมาตรฐานของร้านอาหาร ควรเป็นเท่าไร?
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - รายได้ต่อหัว และ profit margin ของแต่ละธุรกิจอาหาร ควรเป็นเท่าไร?
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
          </div>
        </div>
      </div>

      <div class="hidden md:flex">
        <div class="w-full overflow-hidden">
          <label class="block p-2 leading-normal rounded-none border-t-2 border-b-2 mb-2">
            <span class="font-bold">Part 3: ขยายธุรกิจอาหารแบบก้าวกระโดด</span>
          </label>
          <div class="overflow-hidden leading-normal rounded-none">
            <p class="pl-2 py-2 flex justify-between">
              - เทคนิคการหาพนักงาน และทำอย่างไรเพื่อดึงพนักงาน
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - กลยุทธ์การเลือกทำเล และสถานที่ - กรณีนอกห้าง
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - ขยายสาขา...ขยายเอง vs. แฟรนไชส์ อันไหนดีกว่ากัน
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
          </div>
        </div>
      </div>

      <div class="hidden md:flex">
        <div class="w-full overflow-hidden">
          <label class="block p-2 leading-normal rounded-none border-t-2 border-b-2 mb-2">
            <span class="font-bold">Part 4: ถาม-ตอบ</span>
          </label>
          <div class="overflow-hidden leading-normal rounded-none">
            <p class="pl-2 py-2 flex justify-between">
              - บริหารงบการเงินอย่างไร
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - แนวโน้วเศรษฐกิจไทย และผลกระทบต่อธุรกิจอาหาร
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
            <p class="pl-2 py-2 flex justify-between">
              - สรุป
              <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt="">
            </p>
          </div>
        </div>
      </div>

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