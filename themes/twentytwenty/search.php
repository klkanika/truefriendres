<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
</head>
<?php
require_once('custom-classes/class-posts.php');
$PostsObject = Post::searchPosts(get_search_query(), 9, 0);
$Posts = $PostsObject->posts;
?>

<body class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <!-- Set up your HTML -->
  <section class="text-white pt-32 w-full" style="background-color: #262145;">
    <div class="flex flex-col my-8 lg:px-40 px-8">
      <span class="text-xl mb-2 font-thin">Search</span>
      <span class="text-5xl font-extrabold"><?=get_search_query()?></span>
    </div>
    <div class="bg-white">
      <?php if(!empty(get_search_query()) && !empty($PostsObject->posts_count)) :?>
        <div class="lg:px-8 px-4 grid lg:grid-cols-3 gap-x-4 gap-y-10 py-10" style="color: #062241;" id="posts">
          <?php foreach ($Posts as $thePost) : ?>
            <a href="<?= $thePost->link ?>" class="flex flex-col gap-4">
            <div class="lg:h-72 h-56">
              <img class="rounded-lg object-cover w-full h-full" src="<?= $thePost->featuredImage ?>" alt="">
            </div>
            <div class="font-semibold text-lg"><?= $thePost->title ?></div>
            <div class="" style="color: rgba(6, 34, 65, 0.4)"><?= $thePost->date ?></div>
            </a>
          <?php endforeach; ?>
        </div>
        <div class="bg-white text-center text-xs py-12">
          <button class="rounded-full text-white px-8 py-3 px-28 hidden" style="background-color: #262145;" id="loadmore">LOAD MORE</button>
        </div>
     	 <?php else: ?>
        	<p class="text-center w-full text-black py-24">ไม่พบข้อมูล</p>
      	<?php endif; ?>
    </div>
  </section>
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
        'action': 'search_posts_json_ajax',
        'postsPerPage': postsPerPage,
        'keyword': '<?= get_search_query() ?>',
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
          const posts = postsObject.posts;
		  const defaultImage = "<?= $defaultImage ?>";
          posts.map((thePost, i) => {
            $("#posts").append(`
            <a href="${thePost.link}" class="flex flex-col gap-4">
              <div class="lg:h-72 h-56">
			  	      <img id="img-${thePost.id}" class="rounded-lg object-cover w-full h-full" src="${thePost.featuredImage}" alt="" onerror="document.getElementById('img-'+${thePost.id}).src = '${defaultImage}'">
              </div>
              <div class="font-semibold text-lg">${thePost.title}</div>
              <div class="" style="color: rgba(6, 34, 65, 0.4)">${thePost.date}</div>
            </a>
            `);
          })
        }
      })
    }
  });
</script>