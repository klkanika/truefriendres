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
$thisLink = get_permalink();
$courseDetail = [
  [
    "header" => "part1 จ้า",
    "line" => [
      "- afasgasggasga",
      "- gasgsagsaf",
      "- rwqrwqrwqr",
    ]
  ],
  [
    "header" => "part2 อิอิ",
    "line" => []
  ],
];

$end = new DateTime(get_field('วันปิดรับสมัคร'));
$today = new DateTime();
$interval = $today->diff($end);
$left = intval($interval->format('%a'));
$dateleft =  ($left + 1) . ' วัน';

$courseDetail = [];
foreach (get_field('เนื้อหาของคอร์สนี้') as $key => $part) {
  $tmp_array = ["header" => "Part " . ($key + 1) . ': ' . $part['ชื่อ_part']];
  $line = [];
  foreach ($part['subpart'] as $key => $subpart) {
    array_push($line, $subpart['ชื่อ_sub_part']);
  }
  $tmp_array['line'] = $line;
  array_push($courseDetail, $tmp_array);
}
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
      content: url('<?= get_theme_file_uri() ?>/assets/images/collapse.svg');
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
      <div class="swiper-wrapper pl-4 md:pl-48">
        <!-- Slides -->
        <?php foreach (get_field('รูปภาพ') as $รูป) : ?>
          <div class="swiper-slide rounded-xl overflow-hidden banner-slide bg-gray-300 object-cover bg-no-repeat">
            <img class="object-cover w-full h-full" src="<?= $รูป['รูป']['url'] ?>" alt="" />
          </div>
        <?php endforeach; ?>
      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <div class="w-full md:pl-48 md:pr-48 mt-16 mb-12 px-4">
      <div class="flex items-center justify-between">
        <div class="flex flex-wrap gap-x-3 lg:w-4/5 w-full pl-4 lg:pl-0">
          <div class="flex items-center justify-center">
            <div class="text-xs rounded-full text-sm px-4 py-2 text-white" style="background-color: #062241;">online</div>
          </div>
        </div>
        <div class="items-center justify-center flex-wrap gap-4 w-1/5 hidden lg:flex">
          <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($thisLink) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
          <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode($thisLink) ?>"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
          <div copytoclipboard="<?= $thisLink ?>" class="btn-copytoclipboard"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
        </div>
      </div>
      <p class="text-2xl md:text-5xl font-bold my-6"><?= get_field('ชื่อ') ?></p>
      <div class="flex mb-2 md:mb-6">
        <?php if (!empty(get_field('วันปิดรับสมัคร'))) : ?>
          <div type="submit" class="flex h-14 p-4 rounded-lg" style="background-color:#FFD950; color: #262145;">
            <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/icon-clock.svg" alt="">
            <span class="text-sm md:text-base pl-2 font-bold">ปิดรับสมัครในอีก <?= $dateleft ?></span>
          </div>
        <?php endif; ?>
        <?php if (!empty(get_field('จำนวนคนที่รับสมัคร'))) : ?>
          <div class="flex p-4">
            <img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/icon-person.svg" alt="">
            <span class="text-sm md:text-base pl-2 font-bold" style="color: #B82020;"><?= intval(get_field('จำนวนคนที่รับสมัคร')) - intval(get_field('จำนวนคนตอนนี้')) ?> ท่านสุดท้าย</span>
          </div>
        <?php endif; ?>
      </div>
      <!-- <a href="" class="w-full lg:w-1/2 px-4">
        <div class="w-full lg:h-96 h-56 flex items-center justify-center rounded-xl relative bg-gray-400">
          <img class="object-none object-center" src="<?= get_theme_file_uri() ?>/assets/images/play-btn.svg" />
        </div>
      </a> -->
      <div class="flex justify-center">
        <style>
          iframe {
            width: 100% !important;
            height: 450px !important;
          }
        </style>
        <?= get_field('วิดีโอ') ?>
      </div>
      <?php if (!empty(get_field('รายละเอียด'))) : ?>
        <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">รายละเอียด</p>
        <p><?= get_field('รายละเอียด') ?></p>
      <?php endif; ?>
      <?php if (!empty(get_field('ผู้สอน'))) : ?>
        <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">ผู้สอน</p>
        <p><?= get_field('ผู้สอน') ?></p>
      <?php endif; ?>
      <?php if (!empty($courseDetail)) : ?>
        <p class="text-sm text-gray-400 pb-2 mt-4 mb-2 md:mt-6 md:mb-4">เนื้อหาของคอร์สนี้</p>
        <div class="block md:hidden">
          <?php foreach ($courseDetail as $i => $detail) : ?>
            <div class="tab w-full overflow-hidden">
              <input class="absolute opacity-0 " id="tab-multi-<?= $i ?>" type="checkbox" name="tabs">
              <label <?php if ($i == 0) : ?> class="block p-2 leading-normal cursor-pointer rounded-none border-t-2 border-b-2 mb-2" <?php else : ?>class="block p-2 leading-normal cursor-pointer rounded-none border-b-2 mb-2" <?php endif; ?> for="tab-multi-<?= $i ?>">
                <span class="font-bold"><?= $detail['header'] ?></span>
              </label>
              <?php if (!empty($detail['line'])) : ?>
                <div class="tab-content overflow-hidden leading-normal rounded-none">
                  <?php foreach ($detail['line'] as $lineDetail) : ?>
                    <p class="pl-2 py-2"><?= $lineDetail ?></p>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="hidden md:block">
          <div class="w-full overflow-hidden">
            <?php foreach ($courseDetail as $i => $detail) : ?>
              <label class="block p-2 leading-normal rounded-none border-t-2 border-b-2 mb-2">
                <span class="font-bold"><?= $detail['header'] ?></span>
              </label>
              <?php if (!empty($detail['line'])) : ?>
                <div class="overflow-hidden leading-normal rounded-none">
                  <?php foreach ($detail['line'] as $lineDetail) : ?>
                    <p class="pl-2 py-2 flex justify-between">
                      <?= $lineDetail ?>
                      <!-- <img class="w-5 h-5 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/play-btn-blue.svg" alt=""> -->
                    </p>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>


    </div>
  </section>

  <section id="register" class="text-white py-16 w-full flex items-center flex-col" style="background-color: #FFD950; color:#262145;">
    <p class="text-3xl font-bold pb-4">ลงทะเบียนเรียน</p>
    <a href="<?= get_site_url() ?>/courses-register?courseId=<?= get_the_ID() ?>" class="h-10 rounded-full w-4/12 flex items-center justify-center p-2 hover:bg-gray-50 focus:outline-none" style="background-color:#FFFFFF; color: #000000;">
      ลงทะเบียน
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    const swiper = new Swiper('.swiper-container', {
      slidesPerView: 'auto',
      spaceBetween: 15,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  });
</script>