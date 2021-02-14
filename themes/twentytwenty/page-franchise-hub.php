<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Franchise</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>

<body style="font-family: 'Noto Sans Thai', sans-serif; background-color: #F2F2F2;" class="w-full">
  <style>
    .hit-tab {
      background-color: transparent;
      color: white;
      border: 1px solid white;
    }

    .hit-tab-active,
    .hit-tab:hover {
      background-color: white;
      color: #23212e;
      border: 1px solid white;
    }

    .new-tab {
      background-color: white;
      color: #23212e;
      border: 1px solid #262145;
    }

    .new-tab-active,
    .new-tab:hover {
      background-color: #262145;
      color: white;
      border: 1px solid #262145;
    }
  </style>

  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full" style="color: #262145;">
    <div class="flex flex-col items-center justify-center border-b border-gray-300 pb-12">
      <p class="lg:text-lg lg:tracking-wider">รวมเบอร์ติดต่อ <span class="font-semibold">Franchise</span> สำหรับทำธุรกิจไว้ทนี่ที่เดียว</p>
      <p class="lg:text-5xl text-4xl font-extrabold tracking-tight my-6">Franchise hub</p>
      <div class="flex">
        <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt=""></a>
        <a href=""><img class="w-5 h-5 mx-4" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt=""></a>
        <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt=""></a>
      </div>
    </div>

  </section>
  <section class="relative">
    <div class="">
      <div class="relative">
        <img class="lg:object-cover w-full lg:h-full h-64" src="<?= get_theme_file_uri() ?>/assets/images/cover-franchise.png" />
        <div class="absolute left-0 bottom-0">
          <div class="lg:ml-12 ml-5 lg:mr-12 mr-32 lg:mb-10 mb-6">
            <p class="lg:text-2xl text-xl">เฟรนชายยอดนิยม</p>
            <p class="lg:text-2xl text-xl font-semibold">Most Hit Franchise</p>
          </div>
        </div>
      </div>
    </div>
    <!-- 1st navigator -->
    <div class="absolute flex items-center justify-between w-16 right-0 bottom-0 lg:mr-8 mr-5 lg:mb-10 mb-6 z-20">
      <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-left.svg" referTo="1stSlider" class="cursor-pointer toTheLeft" />
      <img src="<?= get_theme_file_uri() ?>/assets/images/carbon-chevron-right.svg" referTo="1stSlider" class="cursor-pointer toTheRight" />
    </div>
  </section>

  <section class="text-white py-12 lg:pl-16 pl-4" style="background-color: #23212e;">
    <div class="swiper-container cat-swiper">
      <div class="swiper-wrapper pb-12">
        <div style="width: auto;" class="swiper-slide hit-tab-active rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
        <?php foreach (["ร้านกาฟแฟ", "ร้านชาบู", "ร้านติ่มซำ", "ร้านชานม", "ร้านอาหารไทย"] as $type) : ?>
          <div style="width: auto;" class="swiper-slide hit-tab rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type ?></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="swiper-container hit-swiper py-4">
      <div class="swiper-wrapper" style="padding: 1.25rem 1.25rem;">
        <div style="height: 40vh;" class="swiper-slide relative grid grid-cols-5 grid-rows-5 gap-2 border border-gray-300 rounded-lg p-3 lg:w-2/4">
          <div class="absolute left-0 rounded-full w-10 h-10 bg-gray-300 -ml-5 -mt-5 flex items-center justify-center">
            <span class="font-semibold" style="color: #23212e;">#1</span>
          </div>

          <img class="row-span-4 col-span-4 h-full" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
          <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
          <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
          <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
          <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">

          <div class="col-span-5 flex items-center justify-center">
            <div>
              <p>สาขา</p>
              <p>200</p>
            </div>
            <p class="mx-12 text-xl font-semibold">
              โคตรดีวากิว
            </p>
            <div class="">
              <p>ค่าสมัคร</p>
              <p>20,000</p>
            </div>
          </div>
        </div>

        <?php foreach ([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] as $type) : ?>
          <div style="background-color: #464356; width:auto; height: 40vh;" class="swiper-slide relative grid grid-cols-4 grid-rows-5 gap-2 border border-gray-300 rounded-lg p-3 shadow-md mr-8">
            <div class="absolute left-0 rounded-full w-10 h-10 bg-gray-300 -ml-5 -mt-5 flex items-center justify-center">
              <span class="font-semibold" style="color: #23212e;">#1</span>
            </div>

            <img class="row-span-3 col-span-4 w-full" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
            <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
            <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
            <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
            <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">

            <div class="col-span-4 flex items-center">
              <div class="mr-auto">
                <p>เนื้อ</p>
                <p class="text-xl font-semibold">โคตรดีวากิว</p>
              </div>
              <div class="mr-4">
                <p>สาขา</p>
                <p class="text-xl font-semibold">200</p>
              </div>
              <div class="">
                <p>ค่าสมัคร</p>
                <p class="text-xl font-semibold">20,000</p>
              </div>
            </div>

          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </section>

  <section class="bg-white" style="color: #262145;">
    <div class="py-12 lg:px-16 px-4">
      <p class="text-xl mb-2">เฟรนชายเปิดใหม่</p>
      <p class="font-semibold text-2xl">Newly submitted Franchise</p>

      <div class="swiper-container cat-swiper">
        <div class="swiper-wrapper py-8">
          <div style="width: auto;" class="swiper-slide new-tab-active rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
          <?php foreach (["ร้านกาฟแฟ", "ร้านชาบู", "ร้านติ่มซำ", "ร้านชานม", "ร้านอาหารไทย"] as $type) : ?>
            <div style="width: auto;" class="swiper-slide new-tab rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type ?></div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="swiper-container new-swiper">
        <div class="swiper-wrapper">
          <?php foreach ([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] as $type) : ?>
            <div class="swiper-slide grid grid-cols-4 grid-rows-4 gap-2 border border-gray-300 rounded-lg p-3 shadow-md mr-8">
              <div class="col-span-4 flex items-center text-black">
                <div class="mr-auto">
                  <p>เนื้อ</p>
                  <p class="text-xl font-semibold">โคตรดีวากิว</p>
                </div>
                <div class="mr-4">
                  <p>สาขา</p>
                  <p class="text-xl font-semibold">200</p>
                </div>
                <div class="">
                  <p>ค่าสมัคร</p>
                  <p class="text-xl font-semibold">20,000</p>
                </div>
              </div>

              <img class="row-span-4 col-span-4 w-full" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">

              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">


            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="w-full h-48 bg-gray-500 flex items-center justify-center">
      <span class="text-white">Banner</span>
    </div>

    <div class="py-12 lg:px-16 px-4">
      <p class="text-xl mb-2">เฟรนชายเปิดใหม่</p>
      <p class="font-semibold text-2xl">Newly submitted Franchise</p>

      <div class="swiper-container cat-swiper">
        <div class="swiper-wrapper py-8">
          <div style="width: auto;" class="swiper-slide new-tab-active rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
          <?php foreach (["ร้านกาฟแฟ", "ร้านชาบู", "ร้านติ่มซำ", "ร้านชานม", "ร้านอาหารไทย"] as $type) : ?>
            <div style="width: auto;" class="swiper-slide new-tab rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type ?></div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="swiper-container new-swiper">
        <div class="swiper-wrapper">
          <?php foreach ([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] as $type) : ?>
            <div class="swiper-slide grid grid-cols-4 grid-rows-4 gap-2 border border-gray-300 rounded-lg p-3 shadow-md mr-8">
              <div class="col-span-4 flex items-center text-black">
                <div class="mr-auto">
                  <p>เนื้อ</p>
                  <p class="text-xl font-semibold">โคตรดีวากิว</p>
                </div>
                <div class="mr-4">
                  <p>สาขา</p>
                  <p class="text-xl font-semibold">200</p>
                </div>
                <div class="">
                  <p>ค่าสมัคร</p>
                  <p class="text-xl font-semibold">20,000</p>
                </div>
              </div>

              <img class="row-span-4 col-span-4 w-full" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">

              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">

            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="py-8 lg:px-40 px-4 lg:pt-8" style="background-color: #F2F2F2; color: #262145;">
    <div class="flex lg:flex-row flex-col-reverse lg:mb-0 mb-8">
      <div class="flex items-center">
        <select class="bg-transparent border border-gray-300 rounded-full px-2 py-1">
          <option value="">ประเภทธุรกิจ</option>
        </select>
        <select class="ml-2 bg-transparent border border-gray-300 rounded-full px-2 py-1">
          <option value="">ค่าเปิด</option>
        </select>
      </div>
      <div class="lg:ml-auto lg:w-auto lg:my-0 my-4 w-full flex items-center bg-transparent border border-gray-300 rounded-full px-4 py-1">
        <img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/search-blue.svg" alt="">
        <input type="text" class="bg-transparent focus:outline-none" placeholder="ค้นหาชื่อร้านอาหาร">
      </div>
    </div>

    <div class="pb-8">
      <?php foreach ([0, 0] as $item) : ?>
        <div class="border-b border-gray-300 py-4 lg:block flex items-center justify-between">
          <div>
            <div class="lg:flex block lg:items-center lg:justify-between pb-4 text-xl">
              <p class="text-2xl font-semibold lg:mb-0 mb-2">บริษัทอนุภัทรเสต็กเนื้อ</p>
              <p class="inline-block">ร้านเสต็ก</p>
              <p class="inline-block">200 สาขา</p>
              <p class="inline-block">20,000 บาท</p>
              <img class="w-4 h-4 lg:block hidden" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
            </div>
            <div class="hidden lg:grid grid-cols-5 gap-2">
              <?php foreach ([0, 0, 0, 0, 0] as $item) : ?>
                <img class="object-cover rounded-lg" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
              <?php endforeach; ?>
            </div>
            <div class="lg:hidden grid grid-cols-3 gap-2 w-5/6">
              <?php foreach ([0, 0, 0] as $item) : ?>
                <img class="object-cover h-20  rounded-lg" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
              <?php endforeach; ?>
            </div>
          </div>
          <img class="w-5 h-5 lg:hidden block" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
        </div>

      <?php endforeach; ?>
      <div class="flex items-center justify-center py-12">
        <button class="rounded-full py-3 px-24 text-xs" style="background-color: #262145; color: white;">LOAD MORE</button>
      </div>
    </div>

  </section>
  <div class="w-full h-72 flex flex-col items-center justify-center" style="background-color: #FEDA52;">
    <span class="text-3xl font-bold">
      ลงทะเบียน Franchise ฟรี
    </span>
    <button class="rounded-full py-3 px-24 text-xs bg-white my-6">
      ลงทะเบียน
    </button>
  </div>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function() {

    const hitSwiper = new Swiper('.hit-swiper', {
      // Optional parameters
      loop: false,
      slidesPerView: 1.1,
      spaceBetween: 30,
      breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      }
    });

    const newSwiper = new Swiper('.new-swiper', {
      // Optional parameters
      loop: false,
      slidesPerView: 1.25,
      spaceBetween: 30,
      breakpoints: {
        1024: {
          slidesPerView: 2.75,
          spaceBetween: 30,
        },
      }
    });

    const catSwiper = new Swiper('.cat-swiper', {
      // Optional parameters
      loop: false,
      slidesPerView: 'auto',
      spaceBetween: 10,
      breakpoints: {
        1024: {
          slidesPerView: 'auto',
          spaceBetween: 10,
        },
      }
    });


  });
</script>