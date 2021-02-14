<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Hub</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <style>
    .restaurant-table th {
      font-weight: 400;
      text-align: left;
      padding-bottom: 1.5rem;
    }

    .restaurant-table td {
      padding: 0.75rem 0;
    }
  </style>
</head>

<body style="font-family: 'Noto Sans Thai', sans-serif; background-color: #F2F2F2;" class="w-full">
  <?php
  include 'truefriend-header.php';
  require_once('custom-classes/class-posts.php');
  $args = array(
    'taxonomy' => 'restaurant_type',
    'orderby' => 'name',
    'order'   => 'ASC',
  );
  $restaurant_type = get_categories($args);
  $restaurantsObject = Post::getPostsByCategory('restaurants', null, 10, 0, null);
  $restaurants = $restaurantsObject->posts;
  ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full" style="color: #262145;">
    <div class="flex flex-col items-center justify-center border-b border-gray-300 pb-12">
      <p class="lg:text-lg lg:tracking-wider">รวมเบอร์ติดต่อ <span class="font-semibold">Franchise</span> สำหรับทำธุรกิจไว้ทนี่ที่เดียว</p>
      <p class="lg:text-5xl text-4xl font-extrabold tracking-tight my-6">Restaurant hub</p>
      <div class="flex">
        <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt=""></a>
        <a href=""><img class="w-5 h-5 mx-4" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt=""></a>
        <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt=""></a>
      </div>
    </div>
    <div class="flex lg:flex-row flex-col-reverse lg:px-52 px-4 lg:pt-8 lg:mb-0 mb-8">
      <div class="flex items-center">
        <select class="bg-transparent border border-gray-300 rounded-full px-2 py-1">
          <option value="">ประเภทธุรกิจ</option>
          <?php foreach ($restaurant_type as $rstype) : ?>
            <option value="<?= $rstype->slug ?>"><?= $rstype->name ?></option>
          <?php endforeach; ?>
        </select>
        <select class="ml-2 bg-transparent border border-gray-300 rounded-full px-2 py-1">
          <option value="">%กำไรต่อปี</option>
        </select>
      </div>
      <div class="lg:ml-auto lg:w-auto lg:my-0 my-4 w-full flex items-center bg-transparent border border-gray-300 rounded-full px-4 py-1">
        <img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/search-blue.svg" alt="">
        <input type="text" class="bg-transparent focus:outline-none" placeholder="ค้นหาชื่อร้านอาหาร">
      </div>
    </div>
    <div class="lg:block hidden lg:px-52 px-4 lg:pt-8">
      <table class="w-full restaurant-table">
        <thead>
          <tr>
            <th>ชื่อ</th>
            <th>ประเภทธุรกิจ</th>
            <th>จำนวนสาขา</th>
            <th>จังหวัด</th>
            <th>เบอร์โทรศัพท์</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($restaurants as $res) : ?>
            <tr class="border-b border-gray-300">
              <td class="font-bold pb-3 pt-2">
                <?= $res->ชื่อร้าน ?>
              </td>
              <td>
                <?= $res->ประเภทธุรกิจ ? $res->ประเภทธุรกิจ : '-' ?>
              </td>
              <td>
                <?= $res->จำนวนสาขา ? $res->จำนวนสาขา . ' สาขา' : '-' ?>
              </td>
              <td>
                <?= $res->จังหวัด ? $res->จังหวัด : '-' ?>
              </td>
              <td>
                <?= $res->เบอร์โทรศัพท์ ? $res->เบอร์โทรศัพท์ : '-' ?>
              </td>
              <td>
                <a href="<?= $res->link ?>">
                  <img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="lg:hidden block px-4">
      <?php foreach ([0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0] as $row) : ?>
        <a href="#" class="flex items-center justify-between py-4 border-b border-gray-300">
          <div class="flex flex-col">
            <p class="text-xl font-semibold">บริษัทอนุภัทรเสต็กเนื้อ</p>
            <p class="text-base my-2">ธุรกิจ ร้านเสต็ก จำนว 200 สาขา นนทบุรี</p>
            <p class="text-xl">0824564755</p>
          </div>
          <img class="w-4 h-4" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
        </a>
      <?php endforeach; ?>
    </div>
    <div class="flex items-center justify-center py-20">
      <button class="rounded-full py-3 px-24 text-xs" style="background-color: #262145; color: white;">LOAD MORE</button>
    </div>
    <div class="w-full h-72 flex flex-col items-center justify-center" style="background-color: #FEDA52;">
      <span class="text-3xl font-bold">
        ลงทะเบียน Restaurant ฟรี
      </span>
      <a class="rounded-full py-3 px-24 text-xs bg-white my-6" href="<?= get_site_url() ?>/restaurant-register">
        ลงทะเบียน
      </a>
    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>