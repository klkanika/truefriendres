<div class="flex flex-wrap justify-center text-white lg:pb-32 pb-16" style="color:<?= isset($footercolor) ? $footercolor : 'white' ?>;background-color:<?= isset($footerbgcolor) ? $footerbgcolor : '#262145' ?>;">
	<div class="flex justify-between w-full">
		<div class="ml-8 mt-10 mb-10 lg:block hidden">
			<a href="<?= get_site_url() ?>/" class="flex items-center justify-start mb-6">
				<img src="<?= isset($footerlogo) ? $footerlogo : get_theme_file_uri() . '/assets/images/logo-white.svg' ?>" class="cursor-pointer w-32" />
				<!-- <div class="text-sm leading-tight font-bold">
					<p>เพื่อนแท้</p>
					<p>ร้านอาหาร</p>
				</div> -->
			</a>
			<p class="text-base"><a href="mailto:restaurantbuddysme@gmail.com">restaurantbuddysme@gmail.com</a></p>
			<p class="text-base"><a href="tel:0917804724">091 780 4724</a></p>
		</div>

		<div class="flex justify-between lg:w-1/4 w-full mr-8 ml-8 lg:ml-0 mt-14 lg:mt-10 text-xs">
			<ul class="lg:mr-6">
				<li class="mb-4"><span style="color:<?= $footerheadercolor ? $footerheadercolor : 'rgba(255,255,255,0.5)' ?>">Article</span></li>
				<li class="mb-1"><a href="<?= get_permalink(get_page_by_path('restaurant-101')) ?>">Restaurant 101</a></li>
				<li class="mb-1"><a href="<?= get_permalink(get_page_by_path('knowledge')) ?>">Knowledge</a></li>
				<li class="mb-1"><a href="#">News</a></li>
				<li class="mb-1"><a href="<?= get_permalink(get_page_by_path('vdo')) ?>">Video</a></li>
				<li class="mb-1"><a href="<?= get_permalink(get_page_by_path('restaurant-101')) ?>">File</a></li>
			</ul>
			<ul class="lg:ml-6 lg:mr-6">
				<li class="mb-4"><span style="color:<?= $footerheadercolor ? $footerheadercolor : 'rgba(255,255,255,0.5)' ?>" class="mb-4">Interview & Review</span></li>
				<li class="mb-1"><a href="#">Brand Story</a></li>
				<li class="mb-1"><a href="#">Review</a></li>
				<li class="mb-1"><a href="<?= get_permalink(get_page_by_path('franchise-hub')) ?>">Franchise</a></li>
			</ul>
			<ul class="lg:ml-6">
				<li class="mb-4"><span style="color:<?= $footerheadercolor ? $footerheadercolor : 'rgba(255,255,255,0.5)' ?>" class="mb-4">SupplierHub</span></li>
				<li class="mb-1"><a href="#">Profile List</a></li>
				<li class="mb-1"><a href="#">Product</a></li>
			</ul>
		</div>
	</div>
	<div class="mt-10 lg:hidden text-center">
		<div class="flex items-center justify-center mb-4">
			<a href="<?= get_site_url() ?>/" class="w-full">
				<img src="<?= isset($footerlogo) ? $footerlogo : get_theme_file_uri() . '/assets/images/logo-white.svg' ?>" class="cursor-pointer mr-2" />
			</a>
		</div>
		<p class="lg:text-base text-xs"><a href="mailto:restaurantbuddysme@gmail.com">restaurantbuddysme@gmail.com</a></p>
		<p class="lg:text-base text-xs"><a href="tel:0917804724">091 780 4724</a></p>
	</div>
</div>

<?php wp_footer(); ?>