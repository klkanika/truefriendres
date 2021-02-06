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
$recentPosts = Post::getPostsByCategory('post', null, 12, 0, null);
$interviewPosts = Post::getPostsByCategory('interviews', null, 8, 0, null);
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;background-color: #19181F;" class="text-white w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="w-full pt-16">
    <div class="interview-cover">
      <div class="absolute w-full lg:pl-32 lg:pr-0 px-8 lg:w-1/2" style="z-index: 1;">
        <div class="mb-16">
          <p class="text-xl">สัมภาษณ์</p>
          <p class="text-5xl font-bold mt-2">Interview</p>
        </div>
        <div>
          <p class="border-b border-white pb-4 text-xl font-light w-2/4 md:w-full">ล่าสุด</p>
          <div class="flex items-center py-4">
            <img src="<?= get_theme_file_uri() ?>/assets/images/image 8.png" alt="" class="object-cover w-full h-full rounded-full" style="width:45px;height:45px;">
            <p class="ml-4">Potato corner</p>
          </div>
          <p class="text-lg md:text-2xl break-words">ความสำเร็จของ "Potato Corner" จนต่อคิวซื้อเฟรนช์ฟรายส์</p>
        </div>
      </div>
      <div class="absolute top-0 h-full w-full">
        <div class="h-1/2 absolute bottom-0 w-full" style="background-image: linear-gradient(180deg, rgba(0,0,0,0), rgba(25,25,32,1));"></div>
        <img src="<?= get_theme_file_uri() ?>/assets/images/interview-page-cover-pc.png" class="interview-cover-img xs:none md:block" style="z-index: -1;">
        <img src="<?= get_theme_file_uri() ?>/assets/images/interview-page-cover-mobile.png" class="interview-cover-img xs:block md:none" style="z-index: -1;">
      </div>
    </div>
  </section>
  <section class="grid lg:grid-cols-4 grid-cols-1 lg:px-5 px-4 gap-5 pb-12 -mt-6 md:-mt-12">
    <?php foreach ($interviewPosts->posts as $thePost) :?>
      <div class="relative cursor-pointer" onclick="window.open('<?= $thePost->link ?>','_blank')">
        <div class="interview-card">
          <img class="object-cover w-full h-full rounded-xl" src="<?= $thePost->featuredImage ?>" />
        </div>
        <?php if ($thePost->intervieweeBusinessLogo) : ?>
        <div class="absolute top-3 left-3" style="width:45px;height:45px;">
          <img class="object-cover w-full h-full rounded-full" src="<?= $thePost->intervieweeBusinessLogo ?>" />
        </div>
        <?php endif; ?>
        <div class="absolute left-0 bottom-0" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6));">
          <div class="ml-6 mb-6 mr-6">
            <p class="font-bold text-white text-base mb-2"><?= $thePost->intervieweeBusiness ? $thePost->intervieweeBusiness : $thePost->interviewee ?></p>
            <p class="text-white text-base"><?= $thePost->title ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>


  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<style>
  .interview-card {
    height: 80vh;
  }

  .interview-cover {
    height: 85vh;
    position: relative;
    display: flex;
    align-items: center;
  }
  .interview-cover-img{
    position: absolute;
    right: 10%;
  }

  @media (min-width: 1024px) {

    .interview-card {
      height: 60vh;
    }
  }
  @media (max-width: 992px) {
    .interview-cover {
      display: block;
      padding-top: 50px;
      height: unset;
      min-height: 60vh;
    }
    .interview-cover-img{
      right: 0;
      bottom: 0;
    }
  }
</style>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>