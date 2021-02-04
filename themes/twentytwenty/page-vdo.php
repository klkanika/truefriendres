<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <style>
    .loadmore:hover {
      background-color: white;
      color: #19181F;
    }
  </style>
</head>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white w-full pb-12 overflow-hidden" style="background-color: #19181F;" id="banner">
    <section class="w-full h-64 relative overflow-hidden lg:pl-32 lg:pr-32 pl-8 pr-8" id="banner">
      <section class="flex items-start justify-center flex-col w-full pt-32" id="banner-wording">
        <h1 class="lg:text-xl text-xl z-20">video</h1>
        <h1 class="lg:text-5xl text-4xl font-black mt-2 z-20">Video content</h1>
      </section>
      <img class="absolute right-0 top-0 h-full hidden lg:block" src="<?= get_theme_file_uri() ?>/assets/images/vdo-banner.svg" />
    </section>
    <hr class="opacity-20 lg:ml-8 lg:mr-8" />
    <section class="lg:pl-32 mt-6 pb-12" id="contact">
      <div class="flex justify-center lg:justify-start z-20">
        <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
        <a href="" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
        <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
      </div>
    </section>
    <section class="lg:pl-32 lg:pr-32 pl-6 pr-6 -mx-4" id="card-list">
      <div class="w-full flex flex-wrap">
        <?php
        for ($i = 0; $i < 10; $i++) {
        ?>
          <a href="" class="w-full lg:w-1/2 px-4">
            <div class="w-full lg:h-80 h-56 bg-cover bg-center rounded-xl relative" style="background-image:url('<?= get_theme_file_uri() ?>/assets/images/img-default.jpg')">
              <img class="absolute right-0 bottom-0 mr-4 mb-4 w-10 h-10 lg:w-12 lg:h-12" src="<?= get_theme_file_uri() ?>/assets/images/play-btn.svg" />
            </div>
            <p class="mt-6 mb-8 text-base">แม็คโครจับมือDezpaX เปิด One Stop Solutions ครบจบเรื่องบรรจุภัณฑ์ในงบจำกัด</p>
        </a>
        <?php
        }
        ?>
      </div>
    </section>
    <div class="flex w-full justify-center mt-8 ">
      <div class="lg:text-base text-xs rounded-3xl border-white border text-center py-2 w-1/2 lg:w-1/5 select-none cursor-pointer loadmore">LOAD MORE</div>
    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>