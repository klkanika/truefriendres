<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Register</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <style>
    input:focus {
      outline: none;
    }

    .required:after {
      content: " *";
      color: red;
    }
  </style>
</head>

<body style="font-family: 'Noto Sans Thai', sans-serif; background-color: #F2F2F2;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full lg:px-52 px-4" style="color: #262145;">
    <div class="text-lg">
      <p>ลงทะเบียน <span class="font-semibold">ร้านอาหาร</span> </p>
      <p class="mt-3 font-extrabold lg:text-5xl text-2xl">Register Restaurant</p>
      <p class="text-sm mt-2">หลังจากที่แอดมินได้ Approve แล้วข้อมูลของคุณจะลงไปที่ Website</p>
      <div class="flex items-center my-6">
        <div class="flex items-center">
          <img class="mr-3" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" alt="">
          <p class="font-semibold text-sm">ขยายฐานลูกค้า</p>
        </div>
        <div class="flex items-center ml-6">
          <img class="mr-3" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" alt="">
          <p class="font-semibold text-sm">สมัครฟรี</p>
        </div>
        <div class="flex items-center  ml-6">
          <img class="mr-3" src="<?= get_theme_file_uri() ?>/assets/images/content-check.png" alt="">
          <p class="font-semibold text-sm">ได้ SEO ไปในตัว</p>
        </div>
      </div>
    </div>
    <form action="">
      <div class="bg-white rounded-xl shadow-md">
        <div class="border-b border-gray-300 w-full flex items-center pt-12 pb-8 px-10">
          <img class="w-6 h-6 mr-3" src="<?= get_theme_file_uri() ?>/assets/images/icon-info.svg" alt="">
          <span class="font-semibold">ข้อมูลทั่วไป</span>
        </div>
        <div class="grid grid-cols-4 gap-4 px-20 pt-4">
          <label class="required text-right leading-10 mr-12">ชื่อ - นามสกุล</label>
          <input class="col-span-2 border border-gray-300 rounded-lg py-2 px-4" placeholder="ชื่อ - นามสกุล" />

          <label class="required col-start-1 text-right leading-10 mr-12">ชื่อร้าน</label>
          <input class="col-span-2 border border-gray-300 rounded-lg py-2 px-4" />

          <label class="required col-start-1 text-right leading-10 mr-12">ประเภทร้าน</label>
          <select class="col-span-1 border border-gray-300 rounded-lg py-2 px-4">
            <option value="">เลือก</option>
          </select>

          <label class="required col-start-1 text-right leading-10 mr-12">จำนวนสาขา</label>
          <input class="col-span-2 border border-gray-300 rounded-lg py-2 px-4" />

          <label class=" col-start-1 text-right leading-10 mr-12">จำนวนสาขา</label>
          <input class="col-span-2 border border-gray-300 rounded-lg py-2 px-4" />

          <label class="col-start-1 text-right leading-10 mr-12">รูปภาพ</label>
          <div class="col-span-3 grid grid-cols-3 gap-4">
            <div class="border border-gray-300 rounded-lg flex flex-col items-center justify-center h-32">
              <img class="w-6 h-6 mr-3" src="<?= get_theme_file_uri() ?>/assets/images/icon-upload.svg" alt="">
              Upload
            </div>

            <!-- For image holder after upload -->
            <div class="border border-gray-300 rounded-lg flex flex-col items-center justify-center h-32"></div>
          </div>

          <label class=" col-start-1 text-right leading-10 mr-12">ปักหมุดแผนที่</label>
          <a href="#" class="col-start-4 font-semibold text-right">เปิดใน Google Map</a>
          <div class="col-start-2 col-span-3 bg-gray-400" style="height: 60vh;">GOOGLE MAP</div>

          <button class="col-span-4 flex items-center justify-center border-t border-gray-300 -mx-8 py-3 mt-4 focus:outline-none">
            <span class="font-semibold">ถัดไป</span>
            <img class="w-4 h-4 ml-3" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
          </button>
        </div>
      </div>

      <div class="bg-white rounded-xl mt-8 shadow-md">
        <div class="border-b border-gray-300 w-full flex items-center pt-12 pb-8 px-10">
          <img class="w-6 h-6 mr-3" src="<?= get_theme_file_uri() ?>/assets/images/icon-info.svg" alt="">
          <span class="font-semibold">ข้อมูลอื่นๆ</span>
        </div>
        <div class="grid grid-cols-4 gap-4 px-20 pt-4">
          <label class="text-right leading-10 mr-12">เมนูแนะนำ</label>
          <input class="col-span-2 border border-gray-300 rounded-lg py-2 px-4" placeholder="ชื่อ - นามสกุล" />

          <label class="required col-start-1 text-right leading-10 mr-12">ช่วงราคาอาหาร</label>
          <div class="col-span-2">
            <select class="border border-gray-300 rounded-lg py-2 px-4 w-32">
              <option value="">0</option>
            </select>
            -
            <select class="border border-gray-300 rounded-lg py-2 px-4 w-32">
              <option value="">0</option>
            </select>
          </div>

          <label class="col-start-1 text-right leading-10 mr-12">สิ่งอำนวนความสะดวก</label>
          <div class="col-span-2 border border-gray-300 rounded-lg py-2 px-4 grid grid-cols-3 gap-4">
            <div>
              <input type="checkbox">
              <label class="ml-2" for="">ที่จอดรถ</label>
            </div>
            <div>
              <input type="checkbox">
              <label class="ml-2" for="">รับบัตรเครดิท</label>
            </div>
            <div class="col-start-1">
              <input type="checkbox">
              <label class="ml-2" for="">wifi</label>
            </div>
            <div>
              <input type="checkbox">
              <label class="ml-2" for="">เดลิเวอรี่</label>
            </div>
          </div>

          <label class="col-start-1 text-right leading-10 mr-12">สิ่งอำนวนความสะดวก</label>
          <input class="col-start-2 col-span-2 border border-gray-300 rounded-lg py-2 px-4" type="text" placeholder="Facebook Page">
          <input class="col-start-2 col-span-2 border border-gray-300 rounded-lg py-2 px-4" type="text" placeholder="Line">
          <input class="col-start-2 col-span-2 border border-gray-300 rounded-lg py-2 px-4" type="text" placeholder="Website">
          <input class="col-start-2 col-span-2 border border-gray-300 rounded-lg py-2 px-4" type="text" placeholder="Instagram">
          <button class="col-start-2 col-span-1 flex items-center">
            <img src="<?= get_theme_file_uri() ?>/assets/images/icon-add.svg" alt="">
            <span class="ml-3 cursor-pointer">เพิ่มช่องทาง</span>
          </button>

          <button class="col-span-4 flex items-center justify-center border-t border-gray-300 -mx-8 py-3 mt-4 focus:outline-none">
            <span class="font-semibold">ถัดไป</span>
            <img class="w-4 h-4 ml-3" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
          </button>
        </div>
      </div>

      <div class="my-12 flex items-center justify-center">
        <button class="px-24 py-4 rounded-full" style="background-color: #FFD950;">ลงทะเบียน</button>
      </div>

    </form>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>