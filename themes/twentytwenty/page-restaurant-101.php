<!DOCTYPE html>
<html lang="en">

<?php
require_once('custom-classes/class-posts.php');
$restaurant101PostsObject = Post::getPostsByCategory('post', get_category_by_slug('restaurant101')->cat_ID, 8, 0, null);
$restaurant101Posts = $restaurant101PostsObject->posts;
$defaultImage = get_theme_file_uri() . "/assets/images/img-default.jpg";
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant 101</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <style>
    .grid-line {
      width: 33.33%;
    }

    @media (min-width: 1024px) {
      .grid-line {
        width: 14.285%
      }
    }

    .loadmore:hover {
      background-color: white;
      color: #19181F;
    }
  </style>
</head>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white w-full pb-12" style="background-color: #262145;" id="banner">
    <section class="w-full relative overflow-hidden" id="banner">
      <!-- bg of banner -->
      <div class="w-full h-full flex flex-row absolute flex-wrap">
        <div class="w-full h-1/3 flex flex-column">
          <div class="h-full border-white border opacity-20 border-r-0 border-l-0 border-b-0 border-t-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-t-0 hidden lg:block grid-line"></div>
        </div>
        <div class="w-full h-1/3 flex flex-column">
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-l-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
        </div>
        <div class="w-full h-1/3 flex flex-column">
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 border-l-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
          <div class="h-full border-white border opacity-20 border-r-0 border-b-0 hidden lg:block grid-line"></div>
        </div>
      </div>
      <section class="flex items-center justify-center flex-col w-full pt-32 pb-3" id="banner-wording">
        <h1 class="text-xl z-20">บทความที่ทุกร้านอาหารต้องอ่าน</h1>
        <h1 class="text-5xl font-black mt-3 z-20">Restaurant 101</h1>
        <img class="z-20" src="<?= get_theme_file_uri() ?>/assets/images/restaurant-101.svg" />
        <h2 class="z-20 text-base">นอกจากการเป็นคลังความรู้สำหรับธุรกิจร้านอาหารแล้ว <br /> เรายังมีบริการอื่นๆเพื่อช่วยผู้ประกอบการไปถึงฝั่งฝัน</h2>
        <div class="flex mt-10 z-20">
          <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('restaurant-101'))) ?>" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
          <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('restaurant-101'))) ?>" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
          <div copytoclipboard="<?= get_permalink(get_page_by_path('restaurant-101')) ?>" class="btn-copytoclipboard"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></div>
        </div>
      </section>
    </section>
    <?php if (!empty(get_category_by_slug('restaurant101')->cat_ID)) : ?>
      <section class="w-full lg:px-8 px-4 grid lg:grid-cols-2 gap-5 mt-16" id="card-list">
        <?php foreach ($restaurant101Posts as $thePost) : ?>
          <a href="<?= $thePost->link ?>" class="w-full lg:h-80 h-56 bg-cover bg-center rounded-xl relative" style="background-image:url('<?= $thePost->featuredImage ?>');border:1px solid rgba(255,255,255,0.2);">
            <div class="p-6 w-full">
              <div class="w-full relative flex items-center h-48 lg:h-64">
                <!-- <div class="bg-center bg-contain bg-no-repeat h-36 lg:h-48 w-full" style="background-image:url('<?= $thePost->featuredImage ?>')"></div> -->
                <img class="absolute left-0 top-0" src="<?= get_theme_file_uri() ?>/assets/images/101.svg" />
                <div class="border-white border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mb-3 absolute top-0 right-0 text-white text-xs">อ่านต่อ</div>
                <div class="absolute left-0 bottom-0 lg:mb-0 mb-2">
                  <p class="text-xs"><?= $thePost->restaurantCategory ? $thePost->restaurantCategory[0] : '' ?></p>
                  <p class="lg:text-base text-sm mt-2"><?= $thePost->title; ?></p>
                </div>
              </div>
            </div>
          </a>
        <?php endforeach ?>
      </section>
      <div class="flex w-full justify-center mt-8">
        <div class="lg:text-base text-xs rounded-3xl border-white border text-center py-2 w-1/2 lg:w-1/5 select-none cursor-pointer loadmore hidden" id="loadmore">LOAD MORE</div>
      </div>
    <?php else : ?>
      <p class="text-center w-full">ไม่พบข้อมูล</p>
    <?php endif; ?>
  </section>
  <?php
  $footerbgcolor = '#262145';
  $footercolor = 'white';
  $footerheadercolor = 'rgba(255,255,255,0.5)';
  $footerlogo = get_theme_file_uri() . '/assets/images/logo-white.svg';
  ?>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function() {
    var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
    let allPosts = <?= $restaurant101PostsObject->posts_count ?>;
    let currentPosts = 8;
    let postsPerPage = 8;
    let loadMoreBtn = $("#loadmore");

    if (allPosts > currentPosts) {
      loadMoreBtn.show();
    }

    loadMoreBtn.click(() => {
      loadMoreBtn.hide();
      loadMorePost(postsPerPage);
      if (allPosts > currentPosts) {
        loadMoreBtn.show();
      }
    });

    const loadMorePost = (postsPerPage) => {
      var request = {
        'action': 'get_posts_by_cat_json_ajax',
        'postType': 'post',
        'postsPerPage': postsPerPage,
        'offset': currentPosts,
        'categoryNo': <?= get_category_by_slug('restaurant101')->cat_ID ?>,
      };

      $.ajax({
        type: "POST",
        url: ajaxurl,
        data: request,
        async: false,
        dataType: "json",
        success: function(postsObject) {
          currentPosts += postsObject.posts.length;
          const posts = postsObject.posts;
          posts.map((thePost, i) => {
            $("#card-list").append(`
            <a href="${thePost.link}" class="w-full lg:h-80 h-56 bg-cover bg-center rounded-xl relative" style="background-image:url('${thePost.featuredImage}');border:1px solid rgba(255,255,255,0.2);">
              <div class="p-6 w-full">
                <div class="w-full relative flex items-center h-48 lg:h-64">
                  <!-- <div class="bg-center bg-contain bg-no-repeat h-36 lg:h-48 w-full" style="background-image:url('${thePost.featuredImage}')"></div> -->
                  <img class="absolute left-0 top-0" src="<?= get_theme_file_uri() ?>/assets/images/101.svg" />
                  <div class="border-white border rounded-xl lg:pl-5 lg:pr-5 lg:pt-3 lg:pb-3 pl-4 pr-4 pt-2 pb-2 ml-5 mb-3 absolute top-0 right-0 text-white text-xs">อ่านต่อ</div>
                  <div class="absolute left-0 bottom-0 lg:mb-0 mb-2">
                    <p class="text-xs">${thePost.restaurantCategory?thePost.restaurantCategory[0]:''}</p>
                    <p class="lg:text-base text-sm mt-2">${thePost.title}</p>
                  </div>
                </div>
              </div>
            </a>
            `);
          })
        }
      })
    }
  });
</script>