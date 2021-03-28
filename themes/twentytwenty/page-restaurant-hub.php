<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Hub</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.lazywasabi.net/fonts/NotoSansThai/NotoSansThai.css" rel="stylesheet">
  <!-- <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="<?= get_theme_file_uri() ?>/assets/css/style.css">
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
  require_once('custom-classes/class-restaurant.php');
  $args = array(
    'taxonomy' => 'restaurant_type',
    'orderby' => 'name',
    'order'   => 'ASC',
  );
  $restaurant_type = get_categories($args);
  $restaurantsObject = Restaurant::getPostsByCategory('restaurants', null, 10, 0, null, null, null, null);
  $restaurants = $restaurantsObject->posts;
  $numberSelection = [
    [
      "id" => "1",
      "text" => "1-5",
      "startNum" => 1,
      "endNum" => 5,
    ],
    [
      "id" => "2",
      "text" => "5-10",
      "startNum" => 5,
      "endNum" => 10,
    ],
    [
      "id" => "3",
      "text" => "10-20",
      "startNum" => 10,
      "endNum" => 20,
    ],
    [
      "id" => "4",
      "text" => ">20",
      "startNum" => 20,
      "endNum" => null,
    ],
  ];
  ?>
  <style>
    #resTable th svg{
      fill: #bababa;
    }
    #resTable th.sorting_asc,
    #resTable th.sorting_desc{
      color: #065FC0;
      font-weight: 600;
    }
    #resTable th.sorting_asc .asc,
    #resTable th.sorting_desc .desc{
      fill: #065FC0;
    }
  </style>
  <!-- Set up your HTML -->
  <section class="pt-32 w-full" style="color: #262145;">
    <div class="flex flex-col items-center justify-center border-b border-gray-300 pb-12">
      <div class="lg:text-2xl md:text-sm text-xs mb-2 font-light">รวมเบอร์ติดต่อ Restaurant สำหรับทำธุรกิจไว้ที่นี่ที่เดียว</div>
      <div class="lg:text-6xl md:text-5xl text-4xl font-bold tracking-tighter mt-2">Restaurant hub</div>
      <div class="flex items-center justify-center flex-wrap mt-4">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink(get_page_by_path('restaurant-hub'))) ?>"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/facebook-blue.svg" alt="" /></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode(get_permalink(get_page_by_path('restaurant-hub'))) ?>"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/twitter-blue.svg" alt="" /></a>
        <div copytoclipboard="<?= get_permalink(get_page_by_path('restaurant-hub')) ?>" class="btn-copytoclipboard"><img class="w-6 h-6 mx-2 cursor-pointer" src="<?= get_theme_file_uri() ?>/assets/images/link-blue.svg" alt="" /></div>
      </div>
    </div>
  </section>

  <section class="w-full py-8" style="color: #262145;">
    <div class="max-w-screen-lg	md:mx-12">
      <div class="flex lg:flex-row flex-col-reverse mx-4 md:mx-0">
        <div class="flex items-center">
          <div class="border border-gray-300 rounded-full px-2 py-1 w-32">
            <select id="selectType" class="bg-transparent w-full">
              <option value="">ประเภทธุรกิจ</option>
              <?php foreach ($restaurant_type as $type) { ?>
                <option value="<?= $type->term_id ?>"><?= $type->cat_name ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="ml-2 border border-gray-300 rounded-full px-2 py-1 w-32">
            <select id="selectNum" class="bg-transparent w-full">
              <option value="">จำนวนสาขา</option>
              <?php foreach ($numberSelection as $num) { ?>
                <option value="<?= $num["id"] ?>"><?= $num["text"] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="lg:ml-auto lg:w-auto lg:my-0 my-4 w-full flex items-center bg-transparent border border-gray-300 rounded-full px-4 py-1">
          <img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/search-blue.svg" alt="">
          <input id="searchName" type="text" class="bg-transparent focus:outline-none" placeholder="ค้นหาชื่อร้านอาหาร">
        </div>
      </div>
      <div class="lg:block hidden px-4 lg:pt-8">
        <table id="resTable" class="w-full restaurant-table">
          <thead>
            <tr>
              <th>
                <div class="flex items-center cursor-pointer">
                  <div>ชื่อ</div>
                  <div class="ml-2">
                    <svg x="0px" y="0px" class="w-2 h-2 asc">
                      <path d="M7.7,4.6L4.1,1L0.5,4.6L0,4.1L4.1,0l4.1,4.1L7.7,4.6z"/>
                    </svg>
                    <svg x="0px" y="0px" class="w-2 h-2 desc">
                      <path d="M0.5,0l3.6,3.6L7.7,0l0.5,0.5L4.1,4.6L0,0.5L0.5,0z"/>
                    </svg>
                  </div>
                </div>
              </th>
              <th>
                <div class="flex items-center cursor-pointer">
                  <div>ประเภทธุรกิจ</div>
                  <div class="ml-2">
                    <svg x="0px" y="0px" class="w-2 h-2 asc">
                      <path d="M7.7,4.6L4.1,1L0.5,4.6L0,4.1L4.1,0l4.1,4.1L7.7,4.6z"/>
                    </svg>
                    <svg x="0px" y="0px" class="w-2 h-2 desc">
                      <path d="M0.5,0l3.6,3.6L7.7,0l0.5,0.5L4.1,4.6L0,0.5L0.5,0z"/>
                    </svg>
                  </div>
                </div>
              </th>
              <th>
                <div class="flex items-center cursor-pointer">
                  <div>จำนวนสาขา</div>
                  <div class="ml-2">
                    <svg x="0px" y="0px" class="w-2 h-2 asc">
                      <path d="M7.7,4.6L4.1,1L0.5,4.6L0,4.1L4.1,0l4.1,4.1L7.7,4.6z"/>
                    </svg>
                    <svg x="0px" y="0px" class="w-2 h-2 desc">
                      <path d="M0.5,0l3.6,3.6L7.7,0l0.5,0.5L4.1,4.6L0,0.5L0.5,0z"/>
                    </svg>
                  </div>
                </div>
              </th>
              <th>
                <div class="flex items-center cursor-pointer">
                  <div>จังหวัด</div>
                  <div class="ml-2">
                    <svg x="0px" y="0px" class="w-2 h-2 asc">
                      <path d="M7.7,4.6L4.1,1L0.5,4.6L0,4.1L4.1,0l4.1,4.1L7.7,4.6z"/>
                    </svg>
                    <svg x="0px" y="0px" class="w-2 h-2 desc">
                      <path d="M0.5,0l3.6,3.6L7.7,0l0.5,0.5L4.1,4.6L0,0.5L0.5,0z"/>
                    </svg>
                  </div>
                </div>
              </th>
              <th>
                <div class="flex items-center cursor-pointer">
                  <div>เบอร์โทรศัพท์</div>
                  <div class="ml-2">
                    <svg x="0px" y="0px" class="w-2 h-2 asc">
                      <path d="M7.7,4.6L4.1,1L0.5,4.6L0,4.1L4.1,0l4.1,4.1L7.7,4.6z"/>
                    </svg>
                    <svg x="0px" y="0px" class="w-2 h-2 desc">
                      <path d="M0.5,0l3.6,3.6L7.7,0l0.5,0.5L4.1,4.6L0,0.5L0.5,0z"/>
                    </svg>
                  </div>
                </div>
              </th>
              <th></th>
            </tr>
          </thead>
          <tbody id="content-table">
            <?php foreach ($restaurants as $res) : ?>
              <tr class="border-b border-gray-300 cursor-pointer">
                <td class="font-bold pb-3 pt-2">
                <a href="<?= $res->link ?>" class="block">
                  <?= $res->ชื่อร้าน ?>
                </a>
                </td>
                <td>
                <a href="<?= $res->link ?>" class="block">
                  <?= $res->ประเภทธุรกิจ ? $res->ประเภทธุรกิจ : '-' ?>
                </a>
                </td>
                <td>
                <a href="<?= $res->link ?>" class="block">
                  <?= $res->จำนวนสาขา ? $res->จำนวนสาขา . ' สาขา' : '-' ?>
                </a>
                </td>
                <td>
                <a href="<?= $res->link ?>" class="block">
                  <?= $res->จังหวัด ? $res->จังหวัด : '-' ?>
                </a>
                </td>
                <td>
                  <a href="tel:<?= $res->เบอร์โทรศัพท์ ?>" class="block">
                    <?= $res->เบอร์โทรศัพท์ ? $res->เบอร์โทรศัพท์ : '-' ?>
                  </a>
                </td>
                <td>
                  <a href="<?= $res->link ?>" class="block">
                    <img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="lg:hidden block px-4" id="content-card">
        <?php foreach ($restaurants as $res) : ?>
          <a href="<?= $res->link ?>" class="flex items-center justify-between py-4 border-b border-gray-300">
            <div class="flex flex-col">
              <p class="text-xl font-semibold"><?= $res->ชื่อร้าน ?></p>
              <p class="text-base my-2"><?= $res->ประเภทธุรกิจ ? 'ธุรกิจ '.$res->ประเภทธุรกิจ.' ' : '' ?><?= $res->จำนวนสาขา ? 'จำนวน '.$res-> จำนวนสาขา . ' สาขา ' : '' ?> <?= $res->จังหวัด ? $res->จังหวัด : '' ?></p>
              <p class="text-xl"><?= $res->เบอร์โทรศัพท์ ? $res->เบอร์โทรศัพท์ : '' ?></p>
            </div>
            <img class="w-4 h-4" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
          </a>
        <?php endforeach; ?>
      </div>
      <div class="flex items-center justify-center py-20">
        <button id="loadmore" class="rounded-full py-3 px-24 text-xs hidden" style="background-color: #262145; color: white;">LOAD MORE</button>
      </div>
    </div>

    <div class="w-full h-72 flex flex-col items-center justify-center" style="background-color: #FEDA52;">
      <span class="text-3xl font-bold">
        ลงทะเบียน Restaurant ฟรี
      </span>
      <a class="rounded-full py-3 px-24 bg-white my-6" href="<?= get_site_url() ?>/restaurant-register">
        ลงทะเบียน
      </a>
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

<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        let type = '';
        let name = '';
        let numId = '';
        let startNum = '';
        let endNum = '';
        var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";
        let allPosts = <?= $restaurantsObject->posts_count; ?>;
        let currentPosts = 10;
        let postsPerPage = 10;
        let loadMoreBtn = $("#loadmore");
        let allNumSelection = <?= json_encode($numberSelection); ?>;

        if (allPosts > currentPosts) {
            loadMoreBtn.show();
        }

        $('#selectType').on('change', function() {
          if (this.value != type) {
                currentPosts = 0;
                type = this.value;
                getRestaurantPost(false);
                if (allPosts > currentPosts) {
                    loadMoreBtn.show();
                } else {
                    loadMoreBtn.hide();
                }
            }
        });

        $('#selectNum').on('change', function() {
          if (this.value != numId) {
              let filterNum = allNumSelection.filter((f)=>{
                return f.id == this.value;
              });
              if(filterNum.length == 1){
                currentPosts = 0;
                numId = this.value;
                startNum = filterNum[0].startNum;
                endNum = filterNum[0].endNum;                
              }else{
                currentPosts = 0;
                numId = '';
                startNum = '';
                endNum = '';
              }
              getRestaurantPost(false);
              if (allPosts > currentPosts) {
                  loadMoreBtn.show();
              } else {
                  loadMoreBtn.hide();
              }
            }
        });

        $('#searchName').on('change', function() {
          if (this.value != name) {
                currentPosts = 0;
                name = this.value;
                getRestaurantPost(false);
                if (allPosts > currentPosts) {
                    loadMoreBtn.show();
                } else {
                    loadMoreBtn.hide();
                }
            }
        });

        loadMoreBtn.click(() => {
            loadMoreBtn.hide();
            getRestaurantPost(true);
            if (allPosts > currentPosts) {
                loadMoreBtn.show();
            }
        });

        const getRestaurantPost = (append) => {
            var request = {
                'action': 'get_restaurant_json_ajax',
                'postType': 'restaurants',
                'postsPerPage': postsPerPage,
                'offset': currentPosts,
                'categoryNo': type,
                'ชื่อร้าน': name,
                'startNum': startNum,
                'endNum': endNum,
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
                        $("#content-table").html('');
                        $("#content-card").html('');
                    }
                    if (posts.length > 0) {
                        posts.map((data, i) => {
                            // mobile mode
                            $("#content-card").append(`
                            <a href="${data.link}" class="flex items-center justify-between py-4 border-b border-gray-300">
                              <div class="flex flex-col">
                                <p class="text-xl font-semibold">${data.ชื่อร้าน}</p>
                                <p class="text-base my-2">
                                ${data.ประเภทธุรกิจ ? 'ธุรกิจ ' + data.ประเภทธุรกิจ +' ' : ''}
                                ${data.จำนวนสาขา ? 'จำนวน '+data.จำนวนสาขา+ ' สาขา ' : ''}
                                ${data.จังหวัด ? data.จังหวัด : ''}
                                </p>
                                <p class="text-xl">${data.เบอร์โทรศัพท์ ? data.เบอร์โทรศัพท์ : ''}</p>
                              </div>
                              <img class="w-4 h-4" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
                            </a>
                          `);

                          // lg mode
                          $("#content-table").append(`
                            <tr class="border-b border-gray-300">
                              <td class="font-bold pb-3 pt-2">
                              ${data.ชื่อร้าน}
                              </td>
                              <td>
                                ${data.ประเภทธุรกิจ ? data.ประเภทธุรกิจ : ''}
                              </td>
                              <td>
                                ${data.จำนวนสาขา ? data.จำนวนสาขา+ ' สาขา ' : ''}
                              </td>
                              <td>
                                ${data.จังหวัด ? data.จังหวัด : ''}
                              </td>
                              <td>
                                <a href="tel: ${data.เบอร์โทรศัพท}">
                                  ${data.เบอร์โทรศัพท์ ? data.เบอร์โทรศัพท์ : ''}
                                </a>
                              </td>
                              <td>
                                <a href="${data.link}">
                                  <img class="w-4 h-4 mr-2" src="<?= get_theme_file_uri() ?>/assets/images/right.svg" alt="">
                                </a>
                              </td>
                            </tr>
                          `);
                        })
                    } else {
                      // mobile mode
                        $("#content-card").html(`<div class="flex justify-center items-center mt-4">ไม่พบข้อมูลในประเภทธุรกิจนี้</div>`);
                        // lg mode
                        $("#content-table").html(`
                          <tr class="border-b border-gray-300">
                            <td class="font-bold pb-3 pt-2" colspan="6">
                            ไม่พบข้อมูลในประเภทธุรกิจนี้
                            </td>
                          </tr>
                        `);
                    }
                }
            })
        }
        $.extend( $.fn.dataTable.defaults, {
            searching: false,
            ordering:  true
        } );
        $('#resTable').DataTable( {
          paging: false,
          info: false,
          columnDefs: [ {
              targets: [ 0 ],
              orderData: [ 0, 1 ]
          }, {
              targets: [ 1 ],
              orderData: [ 1, 0 ]
          }, {
              targets: [ 4 ],
              orderData: [ 4, 0 ]
          } ]
    } );
    });
</script>