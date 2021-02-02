<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interview</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
</head>
<?php
require_once('custom-classes/class-posts.php');
$recentPosts = Post::getPostsByCategory('post', null, 12, 0);
$knowledgePosts = array_filter($recentPosts->posts, function ($p) {
  return in_array(
    'knowledge',
    array_map(function ($c) {
      return $c->slug;
    }, $p->categories)
  );
});
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;background-color: #19181F;" class="text-white w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="w-full">
    <div class="relative interview-cover">
      <div class="absolute bottom-0 w-full block lg:flex justify-center lg:px-0 px-6 py-6">
        <div class="flex lg:flex-row flex-col lg:items-center lg:justify-between lg:border-t border-white py-4 lg:w-1/2">
          <span class="text-2xl font-medium">Interview</span>
          <div class="flex items-center lg:pt-0 pt-6">
            <img src="<?= get_theme_file_uri() ?>/assets/images/interview-cover.png" alt="" class="w-10 h-10 rounded-full">
            <div class="flex flex-col ml-2">
              <span>พีท พัชร</span>
              <span>Potato corner</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="relative w-full flex flex-col items-center">
    <div class="absolute right-0 hidden lg:flex flex-col mr-8" style="bottom: 50; transform: translate(0 ,50%);">
      <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5 mt-6" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
      <a href=""><img class="w-5 h-5 mt-6" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
    </div>
    <div class="lg:w-1/2 lg:px-0 px-5">
      <div class="flex flex-col items-center py-8">
        <p class="lg:text-3xl text-xl text-center">
          ความสำเร็จของ "Potato Corner" <br> จนต่อคิวซื้อเฟรนช์ฟรายส์
        </p>
        <div class="lg:px-32 lg:mx-8 px-8 py-4 flex lg:justify-start justify-center gap-4">
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
          <a href=""><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></a>
        </div>
      </div>
      <div class="text-sm font-thin leading-8">
        <span>
          “การตลาด” หนึ่งสำคัญที่คนทำร้านอาหารจำเป็นต้องทำ โดยเฉพาะยุคนี้ที่มีตัวเลือกร้านอาหารมากมายหากร้านเราไม่ทำการตลาดให้ผู้คนรู้จัก สนใจ โอกาสที่ร้านเราจะกลายเป็นตัวเลือกลูกค้าก็น้อยลง มันน่าเสียดายมาก ๆ หากเราลงทุนทำทุกอย่างเต็มที่ แต่สุดท้ายลูกค้าไม่เข้าร้านเพราะลูกค้าไม่รู้จักร้านเรา
        </span>
        <div class="bg-gray-600 lg:h-96 h-48 lg:-mx-24 flex items-center justify-center my-12 rounded-xl">Video</div>
        <span>
          1 พนักงานมีเพียงพอแล้วหรือยัง :คงเคยเจอ ร้านอาหารบางร้านทำโปรโมชั่นที่แรงมากเช่น “มา 4 จ่าย 3” , “เมนูพิเศษลด 50%” ผลคือได้ลูกค้าเข้าเต็มร้าน แต่พนักงานไม่เพียงพอต่อการให้บริการ จนทำให้เกิดการบริการไม่ทั่วถึงการบริการล่าช้า ทำให้ลูกค้าเกิดความหงุดหงิด และเกิดการ complain บอกต่อในแง่ลบออกไปในโลกออนไลน์ นอกจากลูกค้าจะไม่พอใจแล้ว ผลกระทบอีกด้านคือ อาจทำให้พนักงานที่มีอยู่นั้นเหนื่อยล้ากับการทำงานเกิน เนื่องจากมีพนักงานไม่เพียงพอทำให้แต่ละคน ต้องทำ OT บ้างทำงานควบตำแหน่งบ้าง จนทำให้เกิดความรู้สึกว่าลาออกและหางานใหม่จะดีกว่าก็เป็นได้
        </span>
      </div>
    </div>
  </section>
  <section class="pt-14 pb-10 px-5 text-white">
    Interview Component From front-page
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<style>
  .interview-cover {
    background: url('<?= get_theme_file_uri() ?>/assets/images/interview-cover.png') no-repeat;
    background-size: auto 100%;
    background-position: center;
    height: 80vh
  }

  @media (min-width: 1024px) {
    .interview-cover {
      background-size: 100% auto;
      height: 80vh
    }
  }
</style>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>