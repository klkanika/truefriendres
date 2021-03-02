<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
  <style>
    .loadmore:hover {
      background-color: white;
      color: #19181F;
    }
  </style>
</head>

<body class="w-full">
  <?php
  include 'truefriend-header.php';
  require_once('custom-classes/class-posts.php');
  $videoPosts = null;
  if (!empty(get_category_by_slug('video'))) {
    $videoPostsObject = Post::getPostsByCategory('post', get_category_by_slug('video')->cat_ID, 6, 0, null);
    $videoPosts = $videoPostsObject->posts;
  }
  ?>
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
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('vdo'))) ?>" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/facebook-icon.png" alt=""></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('vdo'))) ?>" class="mr-4"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/twitter-icon.png" alt=""></a>
        <div copytoclipboard="<?= get_permalink(get_page_by_path('documents')) ?>" class="btn-copytoclipboard"><img class="w-5 h-5" src="<?= get_theme_file_uri() ?>/assets/images/link-icon.png" alt=""></div>
      </div>
    </section>
    <section class="lg:pl-32 lg:pr-32 pl-6 pr-6 -mx-4" id="card-list">
      <div class="w-full flex flex-wrap" id="posts">
        <?php foreach ($videoPosts as $thePost) { ?>
          <a href="<?= $thePost->link ?>" class="w-full lg:w-1/2 px-4">
            <div class="w-full lg:h-80 h-56 bg-cover bg-center rounded-xl relative" style="background-image:url('<?= $thePost->featuredImage ?>">
              <img class="absolute right-0 bottom-0 mr-4 mb-4 w-10 h-10 lg:w-12 lg:h-12" src="<?= get_theme_file_uri() ?>/assets/images/play-btn.svg" />
            </div>
            <p class="mt-6 mb-8 text-base"><?= $thePost->title ?></p>
          </a>
        <?php
        }
        ?>
      </div>
    </section>
    <div class="flex w-full justify-center mt-8 ">
      <div class="lg:text-base text-xs rounded-3xl border-white border text-center py-2 w-1/2 lg:w-1/5 select-none cursor-pointer loadmore hidden" id="loadmore">LOAD MORE</div>
    </div>
  </section>
  <?php include 'truefriend-footer.php'; ?>
</body>

</html>

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function() {
    var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
    let allPosts = <?= $videoPostsObject->posts_count ?>;
    let currentPosts = 6;
    let postsPerPage = 6;
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
        'categoryNo': <?= get_category_by_slug('video')->cat_ID ?>,
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
            $("#posts").append(`
            <a href="${thePost.link}" class="w-full lg:w-1/2 px-4">
              <div class="w-full lg:h-80 h-56 bg-cover bg-center rounded-xl relative" style="background-image:url('${thePost.featuredImage}">
                <img class="absolute right-0 bottom-0 mr-4 mb-4 w-10 h-10 lg:w-12 lg:h-12" src="<?= get_theme_file_uri() ?>/assets/images/play-btn.svg" />
              </div>
              <p class="mt-6 mb-8 text-base">${thePost.title}</p>
            </a>
            `);
          })
        }
      })
    }
  });
</script>