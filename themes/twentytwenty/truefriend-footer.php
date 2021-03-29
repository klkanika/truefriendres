<div class="flex flex-wrap justify-center text-white lg:pb-10" style="color:<?= isset($footercolor) ? $footercolor : 'white' ?>;background-color:<?= isset($footerbgcolor) ? $footerbgcolor : '#262145;' ?>;">
	<div class="bro-max-width w-full">	
		<div class="flex justify-between w-full mt-14 lg:mt-10 mx-auto max-w-3xl text-xs md:text-base">
			<ul class="lg:mr-6">
				<li class="text-en leading-loose mb-4 "><span style="color:<?= $footerheadercolor ? $footerheadercolor : 'rgba(255,255,255,1)' ?>">Article</span></li>
				<li class="text-en leading-loose mb-1"><a href="<?= get_permalink(get_page_by_path('restaurant-101')) ?>">Restaurant 101</a></li>
				<li class="text-en leading-loose mb-1"><a href="<?= get_permalink(get_page_by_path('knowledge')) ?>">Knowledge</a></li>
				<li class="text-en leading-loose mb-1"><a href="#">News</a></li>
				<li class="text-en leading-loose mb-1"><a href="<?= get_permalink(get_page_by_path('vdo')) ?>">Video</a></li>
				<li class="text-en leading-loose mb-1"><a href="<?= get_permalink(get_page_by_path('documents')) ?>">File</a></li>
			</ul>
			<ul class="lg:ml-6 lg:mr-6">
				<li class="text-en leading-loose mb-4 "><span style="color:<?= $footerheadercolor ? $footerheadercolor : 'rgba(255,255,255,1)' ?>" class="text-en mb-4">Interview & Review</span></li>
				<li class="text-en leading-loose mb-1"><a href="#">Brand Story</a></li>
				<li class="text-en leading-loose mb-1"><a href="#">Review</a></li>
				<li class="text-en leading-loose mb-1"><a href="<?= get_permalink(get_page_by_path('franchise-hub')) ?>">Franchise</a></li>
			</ul>
			<ul class="lg:ml-6">
				<li class="text-en leading-loose mb-4 "><span style="color:<?= $footerheadercolor ? $footerheadercolor : 'rgba(255,255,255,1)' ?>" class="text-en mb-4">SupplierHub</span></li>
				<li class="text-en leading-loose mb-1"><a href="#">Profile List</a></li>
				<li class="text-en leading-loose mb-1"><a href="#">Product</a></li>
			</ul>
		</div>
		<div class="w-full mt-10" style="border-top:1px solid rgba(255,255,255,0.1);">
			<div class="mt-10 mb-10  items-center text-center" >
				<a href="<?= get_site_url() ?>/" class="flex items-center text-center justify-start mx-auto">
					<img src="<?= isset($footerlogo) ? $footerlogo : get_theme_file_uri() . '/assets/images/logo-white.svg' ?>" class="cursor-pointer w-auto h-16 mx-auto" />
				</a>
				<div>
					<p class="text-en mt-10 md:text-base text-sm"><a href="mailto:restaurantbuddysme@gmail.com">restaurantbuddysme@gmail.com</a></p>
					<p class="text-en text-2xl mt-2 md:text-base text-sm"><a href="tel:0917804724">091 780 4724</a></p>
				</div>					
			</div>
		</div>			
	</div>
</div>

<?php wp_footer(); ?>