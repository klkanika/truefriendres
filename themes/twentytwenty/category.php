<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>
<?php
$catTitle = single_cat_title( '', false );
require_once('custom-classes/class-posts.php');
$category = get_queried_object();
$catId = $category->term_id;
$PostsObject = Post::getPostsByCategory('post', $category->term_id, 9, 0, null);
$Posts = $PostsObject->posts;
?>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full text-en" style="background-color: #262145;">
    <div class="flex flex-col my-8 lg:px-40 px-8">
      <span class="text-xl mb-2 font-thin">Category</span>
      <span class="text-5xl font-extrabold"><?=$catTitle?></span>
    </div>
    <div class="bg-white justify-items-center">
      <div class="bro-max-width light_theme">
      <?php if(!empty($catId)) :?>
        <div class="lg:px-8 px-4 grid lg:grid-cols-3 gap-x-4 gap-y-10 py-10" style="color: #062241;" id="posts">
          <?php foreach ($Posts as $thePost) : ?>
            <a href="<?= $thePost->link ?>" class="flex flex-col gap-4 button_ghost" style="padding: 0!important;">
              <div class="lg:h-72 h-56">
                <img class="rounded-lg object-cover w-full h-full" src="<?= $thePost->featuredImage ?>" onerror="this.src='<?= $defaultImage ?>'" alt="">
              </div>
              <div class="px-4 pb-4">
                <div class="text-sans-serift text-lg leading-relaxed"><?= $thePost->title ?></div>
                <div class="" style="color: rgba(6, 34, 65, 0.4)"><?= $thePost->date ?></div>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
        <div class="bg-white text-center text-xs py-12">
          <button class="rounded-full text-white hidden button_ghost hover:text-black" style="background-color: #262145;padding-left: 7rem!important;padding-right: 7rem!important;border-radius: 9999px!important;padding-top: .75rem!important;padding-bottom: .75rem!important;" id="loadmore">LOAD MORE</button>
        </div>
      <?php else: ?>
        <p class="text-center w-full">ไม่พบข้อมูล</p>
      <?php endif; ?>
      </div>
    </div>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function() {
    var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
    let allPosts = <?= $PostsObject->posts_count ?>;
    let currentPosts = 9;
    let postsPerPage = 9;
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
        'categoryNo': <?= $catId ?>,
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
		      const defaultImage = "<?= $defaultImage ?>";
          posts.map((thePost, i) => {
            $("#posts").append(`
            <a href="${thePost.link}" class="flex flex-col gap-4 button_ghost" style="padding: 0!important;">
              <div class="lg:h-72 h-56">
			      	  <img class="rounded-lg object-cover w-full h-full" src="${thePost.featuredImage}" alt="" onerror="this.src = '${defaultImage}'">
              </div>
              <div class="px-4 pb-4">
                <div class="font-semibold text-lg">${thePost.title}</div>
                <div class="" style="color: rgba(6, 34, 65, 0.4)">${thePost.date}</div>
              </div>
            </a>
            `);
          })
        }
      })
    }
  });
</script>