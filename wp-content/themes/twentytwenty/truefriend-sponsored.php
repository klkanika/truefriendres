<div class="mb-8">
  <div class="border-b pb-2 mb-4 font-semibold tracking-wide">Sponsored by</div>
  <img class="rounded w-full" src="<?= get_theme_file_uri() ?>/assets/images/ads-ex.png" alt="">
</div>
<div class="mb-8">
  <div class="border-b pb-2 mb-4 font-semibold tracking-wide">Related Category</div>
  <div class="flex flex-col gap-4">
    <?php foreach(get_categories() as $key => $category):
      if($category->count > 0 && $key < 5):?>
        <a href="/category/<?= $category->slug ?>" class="flex justify-between items-center font-thin">
          <span><?= $category->name ?></span>
          <img src="<?= get_theme_file_uri() ?>/assets/images/right.png" class="cursor-pointer w-2" />
        </a>
    <?php endif;endforeach;?>
  </div>
</div>
<div class="mb-8">
  <div class="border-b pb-2 mb-2 font-semibold tracking-wide">Read next</div>
  <div class="flex flex-col">
    <?php $nextcontent = Array('1','1','2','3','4','5','6');?>
    <?php foreach($nextcontent as $key => $thePost):?>
    <a href="" class="border-b py-4 <?= $key > 2 ? 'flex gap-5 items-center':''?>">
      <img class="object-cover rounded <?= $key > 2 ? 'w-20 h-20':'w-full h-40'?> " src="/wp-content/themes/twentytwenty/assets/images/img-default.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
      <div>
        <div class="mt-2 mb-1">สูตรบริหารต้นทุนให้ร้านอาหารทำกำไร</div>
        <div class="text-gray-500 text-xs" style="color: rgba(6, 34, 65, 0.5);">22/11/2020</div>
      </div>
    </a>
    <?php endforeach;?>
  </div>
</div>