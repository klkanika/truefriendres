<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Detail</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
</head>

<body style="font-family: 'Noto Sans Thai', sans-serif; background-color: #F2F2F2;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
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
  <!-- Set up your HTML -->
  <section id="suppliers-content" class="text-white pt-32 w-full lg:px-52 px-4" style="color: #262145;">
    <div class="swiper-container">
      <div class="swiper-wrapper lg:pl-48 pl-4">
        <!-- Slides -->
        <?php foreach ([0, 0, 0, 0] as $รูปภาพ) : ?>
          <div class="swiper-slide rounded-xl overflow-hidden banner-slide"><img class="object-cover w-full h-full" src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="" /></div>
        <?php endforeach ?>

      </div>
      <!-- Add Arrows -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
    <div class="flex items-center justify-between mt-12">
      <div class="flex items-center justify-center">
        <div class="text-xs rounded-full text-sm px-4 py-2" style="background-color: #FEDA52;">Franchise hub</div>
        <div class="relative rounded-full text-sm px-4 py-2 ml-2 text-white flex items-center" style="background-color: #062241;">
          <img class="w-7 h-7 absolute left-0 ml-1" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt="">
          <span class="ml-6 text-xs">ร้านเสต็ก</span>
        </div>
      </div>
      <div class="lg:flex hidden lg:px-32 lg:mx-8 px-8 py-5 lg:justify-start justify-center ">
        <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt=""></a>
        <a href=""><img class="w-5 h-5 ml-4" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt=""></a>
        <a href=""><img class="w-5 h-5 ml-4" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt=""></a>
      </div>
    </div>
    <div class="mt-4">
      <p class="lg:text-4xl text-3xl font-semibold ">บริษัทอนุภัทร เสต็กเนื้อ</p>
      <p class="text-lg mt-2">0824564755 (คุณริน)</p>
    </div>
    <div class="lg:mt-12 mt-8">
      <div class="border-b border-gray-300 py-8">
        <p class="text-gray-500 mb-2">รายละเอียด</p>
        <p class="text-xl">เราขายสินค้าประเภทผักสดปลอดสารพิษราคาถูกมาก สั่งเยอะลดราคาได้ จัดส่งฟรี คลังสินค้าอยู่บริเวณห้วยขวาง</p>

        <div class="lg:hidden flex pt-8 justify-end">
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt=""></a>
          <a href=""><img class="w-5 h-5 ml-4" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt=""></a>
          <a href=""><img class="w-5 h-5 ml-4" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt=""></a>
        </div>
      </div>
      <div class="border-b border-gray-300 py-8">
        <p class="text-gray-500 mb-2">สินค้า</p>
        <div class="flex flex-wrap">
          <?php foreach (["ผัก", "ผักชี", "ผักกาดขาว"] as $product) : ?>
            <span class="border rounded-full px-4 py-1 text-center mr-2" style="border-color: #262145; min-width: 5rem;"><?= $product ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="border-b border-gray-300 py-8">
        <p class="text-gray-500 mb-2">เวลาเปิดร้าน</p>
        <p class="text-xl">ทุกวัน 11:00 - 21:00 น.</p>
      </div>
      <div class="border-b border-gray-300 py-8 -mx-4">
        <div class="flex items-center justify-between mb-2 lg:mx-0 mx-4">
          <p class="text-gray-500 mb-2">สถานที่และเส้นทาง</p>
          <a href="#" class="font-semibold">เปิดใน Google Map</a>
        </div>
        <div class="w-full bg-gray-400 rounded-lg" style="height: 60vh;">
          GOOGLE MAP
        </div>
      </div>
      <div class="border-b border-gray-300 py-8">
        <p class="text-gray-500 mb-2">เมนูแนะนำ</p>
        <div class="flex">
          <?php foreach ([0, 0] as $menu) : ?>
            <a href="#">
              <img src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" alt="" class="h-40 mr-2 rounded-lg">
            </a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="border-b border-gray-300 lg:py-8 py-3 lg:block grid grid-cols-2">
        <p class="text-gray-500 lg:mb-2">ช่วงราคา</p>
        <p class="lg:text-xl">251 - 500 บาท</p>
      </div>
      <div class="border-b border-gray-300 lg:py-8 py-3 lg:block grid grid-cols-2">
        <p class="text-gray-500 lg:mb-2">เวลาเปิด-ปิด เดลิเวอรี่</p>
        <p class="lg:text-xl">ทุกวัน 11:00 - 20:00 น.</p>
      </div>
      <div class="border-b border-gray-300 lg:py-8 py-3 lg:block grid grid-cols-2">
        <p class="text-gray-500 lg:mb-2">จำนวนที่นั่ง</p>
        <p class="lg:text-xl">มากกว่า 150 ที่นั่ง</p>
      </div>
      <div class="border-b border-gray-300 lg:py-8 py-3">
        <p class="text-gray-500 lg:mb-2">สิ่งอำนวยความสะดวก</p>
        <div class="flex flex-wrap lg:mt-0 mt-4">
          <?php foreach (["ที่จอดรถ", "รับบัตรเครดิท", "ห้องน้ำ", "wifi", "เดลิเวอรี่", "แอลกอฮอล์"] as $product) : ?>
            <span class="border rounded-full px-4 py-1 text-center mr-2 lg:mb-0 mb-2" style="border-color: #262145; min-width: 5rem;"><?= $product ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="border-b border-gray-300 py-8">
        <p class="text-gray-500 mb-2">จำนวนสาขา</p>
        <p class="text-xl">200 สาขา (ข้อมูลเมื่อ 20 Dec 2563)</p>
      </div>
      <div class="border-b border-gray-300 py-8">
        <p class="text-gray-500 mb-2">ข้อมูลเพิ่มเติมอื่นๆ</p>
        <p class="text-xl">หยุดทุกวันพุธที่ 2 ของเดือน</p>
      </div>
      <div class="py-8">
        <p class="lg:text-gray-500 mb-2">Social Media</p>
        <div>
          <p>
            <span class="font-semibold">Facebook: </span>facebook.com/anupat_steak
          </p>
          <p>
            <span class="font-semibold">Line: </span>@anupat_steak
          </p>
        </div>
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
<script>
  $(document).ready(function() {

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