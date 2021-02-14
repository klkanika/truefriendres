<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Franchise Detail</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
</head>

<body style="font-family: 'Noto Sans Thai', sans-serif; background-color: #F2F2F2;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full lg:px-52 px-4" style="color: #262145;">
    <div class="flex">
      <div class="bg-gray-300 h-64 w-72 rounded-lg"></div>
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
        <p class="text-gray-500 mb-2">ลักษณะกิจการ</p>
        <p class="text-xl">แฟรนไชส์ชานมไข่มุก, ชา</p>
      </div>

      <div class="border-b border-gray-300 grid lg:grid-cols-2 py-8">
        <div class="border-b border-gray-300 py-8">
          <p class="text-gray-500 mb-2">รูปแบบธุรกิจ</p>
          <p class="text-xl">ขายแฟรนไชส์ | Franchise</p>
        </div>
        <div class="border-b border-gray-300 py-8 lg:border-l lg:pl-16">
          <p class="text-gray-500 mb-2">ค่าแฟรนไชส์</p>
          <p class="text-xl">350,000 บาท</p>
        </div>
        <div class="border-b border-gray-300 py-8">
          <p class="text-gray-500 mb-2">ระยะเวลาคืนทุน</p>
          <p class="text-xl">ขึ้นอยู่กับยอดการจำหน่ายของแต่ละพื้นที่</p>
        </div>
        <div class="border-b border-gray-300 py-8 lg:border-l lg:pl-16">
          <p class="text-gray-500 mb-2">ระยะเวลาสัญญา</p>
          <p class="text-xl">6 ปี</p>
        </div>
        <div class="border-b border-gray-300 py-8">
          <p class="text-gray-500 mb-2">ปีที่ก่อตั้ง</p>
          <p class="text-xl">พ.ศ. 2550 (ขายแฟรนไชส์มา 13 ปี)</p>
        </div>
        <div class="border-b border-gray-300 py-8 lg:border-l lg:pl-16">
          <p class="text-gray-500 mb-2">ค่า Royalty Free</p>
          <p class="text-xl">3%</p>
        </div>
        <div class="border-gray-300 py-8">
          <p class="text-gray-500 mb-2">ประเทศ</p>
          <p class="text-xl">Thailand</p>
        </div>
        <div class="border-gray-300 py-8 lg:border-l lg:pl-16">
          <p class="text-gray-500 mb-2">ค่า Marketing Free</p>
          <p class="text-xl">1%</p>
        </div>
      </div>

      <div class="border-b border-gray-300 py-8">
        <p class="text-gray-500 mb-2">ความเป็นมา</p>
        <p class="text-xl">โอชายะเป็นแฟรนไชส์ที่ประสบความสำเร็จในด้านชานม, ไข่มุกและน้ำผลไม้ ด้วยร้านค้ากว่า 350 ร้านทั่วประเทศในปีพ. ศ. 2563 เรามุ่งมั่นที่จะเติบโตอย่างต่อเนื่องในประเทศไทย เราเชื่อในความซื่อสัตย์และคุณภาพในการดำเนินธุรกิจของเราและเรายินดีต้อนรับผู้ที่มีคุณสมบัติเหมาะสมที่จะเข้าร่วมกับเราในการเพิ่มมูลค่าให้กับลูกค้าและระบบแฟรนไชส์ของเรา!</p>
      </div>

      <?php foreach (["สินค้าและบริการ", "จำนวนสาขา", "อัตราการขยายสาขา", "การลงทุน", "คุณสมบัติผู้สลงทุน", "สิ่งที่ได้รับ", "อื่นๆ"] as $item) : ?>
        <div class="border-b border-gray-300 py-4">
          <div class="flex items-center justify-between">
            <p class="text-gray-500 mb-2">
              <?= $item ?>
            </p>
            <img src="<?= get_theme_file_uri() ?>/assets/images/collapse.svg" class="collapse-icon" />
          </div>
        </div>
      <?php endforeach; ?>

      <div class="py-4">
        <div class="flex items-center justify-between">
          <p class="text-gray-500 mb-2">
            ติดต่อเจ้าของแฟรนไชส์
          </p>
          <img src="<?= get_theme_file_uri() ?>/assets/images/collapse.svg" class="collapse-icon" />
        </div>
        <?php foreach (["ชื่อผู้ติดต่อ" => "น้องมิก", "อีเมล" => "น้องมิก", "เบอร์โทร" => "น้องมิก", "เว็บไซต์" => "น้องมิก",] as $key => $value) : ?>
          <div class="flex items-center border-b border-gray-300 py-2">
            <p class="font-bold lg:w-1/4 w-1/3"><?= $key ?></p>
            <p class=""><?= $value ?></p>
          </div>
        <?php endforeach ?>
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
  </section>
  <section class="text-white pt-32 w-full lg:px-52 px-4" style="color: #262145;">
    <div class="flex items-center justify-between">
      <p class="text-2xl font-bold">Franchise hub</p>
      <div class="flex lg:items-center font-semibold">
        <span class="mr-8 lg:block hidden">ค้นหา</span>
        <span class="mr-8 lg:text-base text-xs">ดูทั้งหมด (360)</span>
        <div class=" lg:flex hidden items-center justify-between w-12 ">
          <img src="<?= get_theme_file_uri() ?>/assets/images/left.svg" class="cursor-pointer" />
          <img src="<?= get_theme_file_uri() ?>/assets/images/chev-right.svg" class="cursor-pointer" />
        </div>
      </div>
    </div>
    <p>แหล่งรวมเบอร์ติดต่อ Franchise hub ประเภทต่างๆ</p>

    <div class="grid lg:grid-cols-5 grid-cols-1 gap-y-3 gap-x-4 py-8">
      <?php foreach ([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] as $f) : ?>
        <div class="border-b border-gray-300 py-2 flex items-center">
          <img src="<?= get_theme_file_uri() ?>/assets/images/menu-sample.png" class="w-12 h-12 rounded mr-2 object-cover" />
          <div>
            <p class="font-semibold">ร้านเสต็ก</p>
            <p class="text-sm">100 แฟรนไชส์</p>
          </div>
          <img src="<?= get_theme_file_uri() ?>/assets/images/right.svg" class="w-4 h-4 ml-auto lg:hidden block" />
        </div>
      <?php endforeach ?>
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