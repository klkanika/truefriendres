<!DOCTYPE html>
<html lang="en">
<?php
require_once('custom-classes/class-posts.php');
$interviewPostsObject = Post::getPostsByCategory('interviews', null, 8, 0, null);
$interviewPosts = $interviewPostsObject->posts;
$firstPost = $interviewPosts ? $interviewPosts[0] : null;
array_shift($interviewPosts);
$footerbgcolor = '#19181F';
$defaultImage = get_theme_file_uri() . "/assets/images/img-default.jpg";
//Shift out for the first post
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interview</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <style>
    .interview-card {
      height: 80vh;
    }

    .interview-cover {
      background: url('<?= $firstPost ? $firstPost->featuredImage : '' ?>') no-repeat;
      background-size: auto 100%;
      background-position: top right;
      height: 80vh
    }

    @media (min-width: 1024px) {
      .interview-cover {
        background-size: 100% auto;
        background-position: top right;
        height: 80vh
      }

      .interview-card {
        height: 60vh;
      }
    }
  </style>
</head>

<body style="background-color: #19181F;" class="text-white w-full text-en">
  <?php include 'truefriend-header.php'; ?>
  
  <?php if ($firstPost) { ?>
    <section class="w-full pt-24">
      <div class="relative interview-cover cursor-pointer" onclick="window.open('<?= $firstPost->link ?>','_self')">
        <div class="absolute w-full h-full" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.6));"></div>
        <div class="absolute bottom-0 w-full lg:px-40 px-8 lg:w-1/2 lg:pb-16">
          <div class="mb-16">
            <p class="text-xl">สัมภาษณ์</p>
            <p class="text-5xl font-bold mt-2">Interview</p>
          </div>
          <div>
            <p class="border-b border-white pb-4 text-xl font-light">ล่าสุด</p>
            <div class="flex items-center py-4">
              <?php
              $logo = $firstPost->intervieweeBusinessLogo;
              if (!empty($logo)) :
              ?>
                <img src="<?= $logo ?>" alt="" class="w-12 h-12 rounded-full object-cover">
              <?php else : ?>
                <img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png" alt="" class="w-12 h-12 rounded-full object-cover bg-white p-2">
              <?php endif; ?>
              <p class="ml-2"><?= $firstPost->intervieweeBusiness ? $firstPost->intervieweeBusiness : $firstPost->interviewee ?></p>
            </div>
            <p class="text-2xl"><?= $firstPost->title ?></p>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>
  <div class="bro-max-width">
    <section id="interview-list" class="grid lg:grid-cols-4 grid-cols-1 lg:px-5 px-4 gap-5 pb-12 pt-16">
      <?php
      foreach ($interviewPosts as $item) {
      ?>
        <div class="relative cursor-pointer" onclick="window.open('<?= $item->link ?>','_self')">
          <div style="height:60vh">
            <img class="object-cover w-full h-full rounded-xl" src="<?= $item->featuredImage ?>" onerror="this.src='<?= $defaultImage ?>'" />
          </div>
          <div class="absolute top-3 left-3" style="width:45px;height:45px;">
            <?php if (!empty($item->intervieweeBusinessLogo)) : ?>
              <img class="object-cover w-full h-full rounded-full" src="<?= $item->intervieweeBusinessLogo ?>" onerror="this.src='<?= $defaultImage ?>'" />
            <?php endif; ?>
          </div>
          <div class="absolute left-0 bottom-0 w-full rounded-b-xl" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.8));">
            <div class="ml-6 mb-6 mr-6">
              <p class="font-bold text-white text-base mb-2"><?= $item->intervieweeBusiness ? $item->intervieweeBusiness : $item->interviewee ?></p>
              <p class="text-white text-sans-serift text-lg font-light leading-relaxed mt-4"><?= $item->title ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </section>
    <div class="flex items-center justify-center py-8">
      <button id="loadmore" class="rounded-full text-xs button_ghost hover:text-black" style="background-color: #262145; color: white;padding-left: 7rem!important;padding-right: 7rem!important;border-radius: 9999px!important;padding-top: .75rem!important;padding-bottom: .75rem!important;">LOAD MORE</button>
    </div>
  </div>
  <?php
  $footerbgcolor = '#191920';
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
    let allPosts = <?= $interviewPostsObject->posts_count ?>;
    let currentPosts = 8;
    let postsPerPage = 8;
    let loadMoreBtn = $("#loadmore");

    if (allPosts > currentPosts)
      loadMoreBtn.show();
    else
      loadMoreBtn.hide();

    loadMoreBtn.click(() => {
      loadMoreBtn.hide();
      getPostInterviews(true);
      if (allPosts > currentPosts) {
        loadMoreBtn.show();
      }
    });

    const getPostInterviews = (append) => {
      var request = {
        'action': 'get_posts_by_cat_json_ajax',
        'postType': 'interviews',
        'postsPerPage': postsPerPage,
        'offset': currentPosts,
      };

      $.ajax({
        type: "POST",
        url: ajaxurl,
        data: request,
        async: false,
        dataType: "json",
        success: function(postsObject) {
          currentPosts += postsObject.posts.length;
          allPosts = postsObject.posts_count;
          const posts = postsObject.posts;
          if (!append) {
            $("#interview-list").html('');
          }
          if (posts.length > 0) {
            posts.map((interview, i) => {
              $("#interview-list").append(`
              <div class="relative cursor-pointer" onclick="window.open('${ interview.link }','_self')">
                <div class="interview-card">
                  <img class="object-cover w-full h-full rounded-xl" src="${ interview.featuredImage }" onerror="this.src='<?= $defaultImage ?>'" />
                </div>
                <div class="absolute top-3 left-3" style="width:45px;height:45px;">
                  ${(interview.intervieweeBusinessLogo) ? 
                    `<img class="object-cover w-full h-full rounded-full" src="${ interview.intervieweeBusinessLogo }" onerror="this.src='<?= $defaultImage ?>'" />`
                  :''}
                </div>
                <div class="absolute left-0 bottom-0 w-full rounded-b-xl" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.8));">
                  <div class="ml-6 mb-6 mr-6">
                    <p class="font-bold text-white text-base mb-2">${ interview.intervieweeBusiness ? interview.intervieweeBusiness : interview.interviewee }</p>
                    <p class="text-white text-sans-serift text-lg font-light leading-relaxed mt-4">${ interview.title }</p>
                  </div>
                </div>
              </div>
                        `);
            })
          }
        }
      })
    }

    const swiper = new Swiper('.swiper-container', {
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