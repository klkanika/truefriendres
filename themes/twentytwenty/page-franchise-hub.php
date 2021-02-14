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
  <section id="section-1stSlider" class="relative">
    <div id="1stSlider" class="owl-carousel">
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

  <section class="text-white py-12" style="background-color: #23212e;">
    <div class="flex items-center justify-center pb-12">
      <div class="hit-tab-active rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
      <?php foreach (["ร้านกาฟแฟ", "ร้านชาบู", "ร้านติ่มซำ", "ร้านชานม", "ร้านอาหารไทย"] as $type) : ?>
        <div class="hit-tab rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type ?></div>
      <?php endforeach; ?>
    </div>
    <div class="flex w-full lg:px-16">
      <div class="relative grid grid-cols-5 grid-rows-5 gap-2 border border-gray-300 rounded-lg p-3 lg:w-2/4">
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
    </div>
  </section>

  <section class="bg-white" style="color: #262145;">
    <div class="py-12 px-8">
      <p class="text-xl mb-2">เฟรนชายเปิดใหม่</p>
      <p class="font-semibold text-2xl">Newly submitted Franchise</p>

      <div class="flex items-center py-8">
        <div class="new-tab-active rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
        <?php foreach (["ร้านกาฟแฟ", "ร้านชาบู", "ร้านติ่มซำ", "ร้านชานม", "ร้านอาหารไทย"] as $type) : ?>
          <div class="new-tab rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type ?></div>
        <?php endforeach; ?>
      </div>

      <div class="w-full flex ">
        <?php foreach ([0, 0] as $type) : ?>
          <div class="grid grid-cols-4 grid-rows-4 gap-2 border border-gray-300 rounded-lg p-3 shadow-md mr-8 lg:w-1/4">
            <div class="col-span-4 flex items-center text-black">
              <div class="mr-auto">
                <p>สาขา</p>
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

    <div class="w-full h-48 bg-gray-500 flex items-center justify-center">
      <span class="text-white">Banner</span>
    </div>

    <div class="py-12 px-8">
      <p class="text-xl mb-2">เฟรนชายเปิดใหม่</p>
      <p class="font-semibold text-2xl">Newly submitted Franchise</p>

      <div class="flex items-center py-8">
        <div class="new-tab-active rounded-full px-8 py-1 cursor-pointer">ทั้งหมด</div>
        <?php foreach (["ร้านกาฟแฟ", "ร้านชาบู", "ร้านติ่มซำ", "ร้านชานม", "ร้านอาหารไทย"] as $type) : ?>
          <div class="new-tab rounded-full px-8 py-1 ml-4 cursor-pointer"><?= $type ?></div>
        <?php endforeach; ?>
      </div>

      <div class="w-full flex ">
        <?php foreach ([0, 0] as $type) : ?>
          <div class="grid grid-cols-4 grid-rows-4 gap-2 border border-gray-300 rounded-lg p-3 shadow-md mr-8 lg:w-1/4">
            <div class="col-span-4 flex items-center text-black">
              <div class="mr-auto">
                <p>สาขา</p>
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
      <?php foreach ([0, 0] as $type) : ?>
        <div class="border-b border-gray-300 py-4">
          <div class="flex items-center justify-between pb-4 text-xl">
            <p class="text-2xl font-semibold">บริษัทอนุภัทรเสต็กเนื้อ</p>
            <p>ร้านเสต็ก</p>
            <p>200 สาขา</p>
            <p>20,000 บาท</p>
            <img class="w-4 h-4" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
          </div>
          <div class="hidden lg:grid grid-cols-5 gap-2">
            <?php foreach ([0, 0, 0, 0, 0] as $type) : ?>
              <img class="" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="">
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="flex items-center justify-center py-12">
        <button class="rounded-full py-3 px-24 text-xs" style="background-color: #262145; color: white;">LOAD MORE</button>
      </div>
    </div>

  </section>
  <div class="w-full h-72 flex flex-col items-center justify-center" style="background-color: #FEDA52;">
    <span class="text-3xl font-bold">
      ลงทะเบียน Restaurant ฟรี
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