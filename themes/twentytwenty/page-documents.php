<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

</head>

<?php
require_once('custom-classes/class-posts.php');
$documentsObject = Post::getPostsByCategory('documents', null, 12, 0, null);
$documents = $documentsObject->posts;
?>

<body style="font-family: 'Noto Sans Thai', sans-serif;" class="w-full">
  <?php include 'truefriend-header.php'; ?>
  <style>
    #headder {
      background: transparent;
    }

    .burger-bar,
    .balloon-chat {
      fill: #262145;
    }

    .logo {
      color: #262145;
    }

    #documents {
      background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-b.svg');
      background-repeat: no-repeat;
      background-position: center;
      background-size: 100%;
    }

    @media (max-width: 992px) {
      #documents {
        background-image: url('<?= get_theme_file_uri() ?>/assets/images/bg-b-mobile.svg');
      }
    }
    
  </style>

  <section id="documents" class="text-white pt-32 w-full flex items-center flex-col" style="background-color: #F2F2F2; color:#262145;">
    <div class="flex text-base md:text-2xl pb-2">
      <div class="text-base md:text-xl font-light pr-2">คลังแสงของคนอยากเปิดร้านอาหาร</div>
    </div>
    <p class="text-4xl md:text-6xl font-bold pb-2">Document</p>
    <p class="text-sm md:text-base">รวมข้อมูลต่างๆที่เป็นประโยชน์ในการทำธุรกิจร้านอาหาร</p>
    <div class="flex mt-10 z-20">
      <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('documents'))) ?>"><img class="mr-4 w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
      <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('documents'))) ?>"><img class="mr-4 w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
      <div copytoclipboard="<?= get_permalink(get_page_by_path('documents')) ?>" class="btn-copytoclipboard"><img class="w-6 h-6 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
    </div>
    <div class="flex justify-center flex-wrap w-full md:w-3/4 mt-16 mb-12 px-4 md:px-0 md:grid md:grid-cols-3 md:gap-y-4 md:gap-x-8" id="posts">
      <?php foreach ($documents as $key => $thePost) :
        $path_info = pathinfo($thePost->file);
        $extension = $path_info['extension'];
        if ($extension === 'xls' || $extension === 'xlsx') {
          $extension = 'Excel';
        } else if ($extension === 'pdf') {
          $extension = 'PDF';
        } else if ($extension === '.doc' || $extension === '.docx') {
          $extension = 'Word';
        }
      ?>
        <div class="w-full flex items-center lg:justify-center flex-col lg:h-72 h-40 relative md:mb-0 mb-4 rounded-md shadow bg-white">
          <?= $thePost->pictureUrl ? '<img class="object-cover h-full w-full opacity-30 rounded-md" src="' . $thePost->pictureUrl . '" />' : '' ?>
          <div class="absolute text-center px-4 pt-6 lg:pt-4 lg:pb-10">
            <h1 class="text-xl lg:text-3xl font-black tracking-tighter lg:mb-3 mb-2"><?= $thePost->ชื่อ ?></h1>
            <h2 class="text-xs lg:text-sm lg:text-center"><?= $thePost->รายละเอียด ?></h2>
          </div>
          <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
            <?php if(!empty($thePost->file)):?>
              <a href="<?= $thePost->file ?>" download>Download <?= $extension ?></a>
            <?php else:?>
              <p>No File</p>
            <?php endif;?>
            <div class="flex items-center">
              <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $thePost->file ?>"><img class="mr-3 w-5 h-5 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
              <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= $thePost->file ?>"><img class="mr-3 w-5 h-5 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
              <a copytoclipboard="<?= $thePost->file ?>" class="btn-copytoclipboard"><img class="w-5 h-5 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="bg-transparent text-center text-xs py-12">
      <button class="rounded-full text-white px-8 py-3 px-28 hidden" style="background-color: #262145;" id="loadmore">LOAD MORE</button>
    </div>
  </section>
  <?php
  $footerbgcolor = '#f2f2f2';
  $footercolor = '#19181F';
  $footerheadercolor = 'rgba(0,0,0,0.5)';
  $footerlogo = get_theme_file_uri() . '/assets/images/logo-blue.svg';
  ?>
  <?php include 'truefriend-footer.php'; ?>


</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
    let allPosts = <?= $documentsObject->posts_count ?>;
    let currentPosts = 12;
    let postsPerPage = 12;
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
        'postType': 'documents',
        'postsPerPage': postsPerPage,
        'offset': currentPosts,
        // 'categoryNo': <?= get_category_by_slug('knowledge')->cat_ID ?>,
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
            var re = /(?:\.([^.]+))?$/;
            let extension = re.exec(thePost.file)[1]; 
            if(extension){
              if (extension === 'xls' || extension === 'xlsx') {
                extension = 'Excel';
              } else if (extension === 'pdf') {
                extension = 'PDF';
              } else if (extension === '.doc' || extension === '.docx') {
                extension = 'Word';
              }
            }else{
              extension = '';
            }
            $("#posts").append(`
            <div class="w-full flex items-center lg:justify-center flex-col lg:h-72 h-40 relative md:mb-0 mb-4 rounded-md shadow bg-white">
              ${thePost.pictureUrl ? '<img class="object-cover h-full w-full opacity-30 rounded-md" src="' + thePost.pictureUrl + '" />' : '' }
              <div class="absolute text-center px-4 pt-6 lg:pt-4 lg:pb-10">
                <h1 class="text-xl lg:text-3xl font-black tracking-tighter lg:mb-3 mb-2">${thePost.ชื่อ}</h1>
                <h2 class="text-xs lg:text-sm lg:text-center">${thePost.รายละเอียด}</h2>
              </div>
              <div class="w-full text-sm absolute flex justify-between bottom-0 px-4 py-4 font-black">
                ${
                  thePost.file ? `<a href="${thePost.file}" download>Download ${extension}</a>` : '<p>No File</p>'
                }
                <div class="flex items-center">
                  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=${thePost.file}"><img class="mr-3 w-5 h-5 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
                  <a target="_blank" href="https://twitter.com/intent/tweet?url=${thePost.file}"><img class="mr-3 w-5 h-5 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
                  <a copytoclipboard="${thePost.file}" class="btn-copytoclipboard"><img class="w-5 h-5 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></a>
                </div>
              </div>
            </div>
            `);
          })
        }
      });
    }
  });
</script>