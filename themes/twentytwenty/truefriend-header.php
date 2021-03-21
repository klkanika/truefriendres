<?php 
	wp_head();
	$defaultImage = get_theme_file_uri()."/assets/images/img-default.jpg";
	$is_admin = current_user_can('manage_options'); 
?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
<!-- drawer.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
<!-- jquery & iScroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
<!-- drawer.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
<style>
	*:focus {
		outline: unset !important;
	}

	.fourthSliderClass {
		height: 30vh;
	}

	.tab-button-active {
		background-color: #062241;
		color: white;
	}

	.tab-button:hover {
		background-color: #062241;
		color: white;
	}

	.tab-button {
		min-height: 2rem;
		min-width: 5rem;
		padding: 0 1rem;
	}

	.gallery-thumbnail {
		height: 30vh
	}

	.screen-reader-text {
		display: none;
	}

	@media (min-width:1024px) {
		.fourthSliderClass {
			height: 40vh;
		}

		.tab-button {
			min-height: 2.5rem;
			min-width: 7rem;
		}

		.gallery-thumbnail {
			height: 60vh
		}
	}

	#headder {
		background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0));
		width: 100vw;
		color: #fff;
	}

	.burger-bar,
	.balloon-chat {
		fill: #fff;
	}

	.logo {
		color: inherit;
		font-weight: 600;
		line-height: 1.2em;
		font-size: 1.05rem;
		letter-spacing: 0.05em;
		/* margin-left: 60px; */
	}

	html:not([data-scroll="0"]) #headder {
		background: #262145;
	}

	html:not([data-scroll="0"]) .burger-bar,
	html:not([data-scroll="0"]) .balloon-chat {
		fill: #fff !important;
	}

	html:not([data-scroll="0"]) .logo {
		color: #fff !important;
	}

	img {
		max-width: 100%;
		max-height: 100%;
	}

	.scrollto-item {
		cursor: pointer;
	}

	.btn-copytoclipboard {
		cursor: pointer;
	}

	.copy-notification {
		color: #ffffff;
		background-color: rgba(0, 0, 0, 0.8);
		padding: 20px;
		border-radius: 30px;
		position: fixed;
		top: 50%;
		left: 50%;
		width: 150px;
		margin-top: -30px;
		margin-left: -85px;
		display: none;
		text-align: center;
		z-index: 40;
	}

	#burger-menu {
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		z-index: 999;
		background-color: #fff;
		color: var(--primary);
		height: 100vh;
		padding: 3% 0;
	}

	#burger-menu a:hover {
		font-weight: 600;
		font-size: 1.5rem;
	}
</style>
<script>
	// The debounce function receives our function as a parameter
	const debounce = (fn) => {
		// This holds the requestAnimationFrame reference, so we can cancel it if we wish
		let frame;

		// The debounce function returns a new function that can receive a variable number of arguments
		return (...params) => {

			// If the frame variable has been defined, clear it now, and queue for next frame
			if (frame) {
				cancelAnimationFrame(frame);
			}

			// Queue our function call for the next frame
			frame = requestAnimationFrame(() => {

				// Call our function and pass any params we received
				fn(...params);
			});

		}
	};
	// Reads out the scroll position and stores it in the data attribute
	// so we can use it in our stylesheets
	const storeScroll = () => {
		document.documentElement.dataset.scroll = window.scrollY;
	}

	// Listen for new scroll events, here we debounce our `storeScroll` function
	document.addEventListener('scroll', debounce(storeScroll), {
		passive: true
	});

	// Update scroll position for first time
	storeScroll();

	$(document).on('click', '.scrollto-item', function() {
		console.log(`#${$(this).attr('scrollto')}`)
		$('html, body').animate({
			scrollTop: $(`#${$(this).attr('scrollto')}`).offset().top - 80
		}, 1000);
	});

	$(document).on('click', '.btn-copytoclipboard', function(event) {
		event.preventDefault();
		CopyToClipboard($(this).attr('copytoclipboard'), true, "คัดลอก");
	});

	function CopyToClipboard(value, showNotification, notificationText) {
		var $temp = $("<input>");
		$("body").append($temp);
		$temp.val(value).select();
		document.execCommand("copy");
		$temp.remove();

		if (typeof showNotification === 'undefined') {
			showNotification = true;
		}
		if (typeof notificationText === 'undefined') {
			notificationText = "Copied to clipboard";
		}

		var notificationTag = $("div.copy-notification");
		if (showNotification && notificationTag.length == 0) {
			notificationTag = $("<div/>", {
				"class": "copy-notification",
				text: notificationText
			});
			$("body").append(notificationTag);

			notificationTag.fadeIn("slow", function() {
				setTimeout(function() {
					notificationTag.fadeOut("slow", function() {
						notificationTag.remove();
					});
				}, 1000);
			});
		}
	}

	function burger() {
		$('#burger-menu').toggle();
	}
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<?php $menus = [
					['link'=> '', 'label'=>'Home'],
					['link'=> 'services', 'label'=>'Service'],
					['link'=> 'knowledge', 'label'=>'Knowledge'],
					['link'=> 'restaurant-101', 'label'=>'Restaurant 101'],
					['link'=> 'interviews', 'label'=>'Interview'],
					['link'=> 'vdo', 'label'=>'Video'],
					['link'=> 'infohub', 'label'=>'Info hub'],
					['link'=> 'courses', 'label'=>'Courses'],
					['link'=> 'documents', 'label'=>'Documents'],
					['link'=> 'contact-us', 'label'=>'Contact us'],
	];
	$menus_desktop = [
					['link'=> 'knowledge', 'label'=>'Knowledge'],
					['link'=> 'restaurant-101', 'label'=>'Restaurant 101'],
					['link'=> 'interviews', 'label'=>'Interview'],
					['link'=> 'vdo', 'label'=>'Video'],
					['link'=> 'infohub', 'label'=>'Info hub'],
					['link'=> 'courses', 'label'=>'Courses'],					
	];
	?>
<div id="headder" class="fixed  dark-theme left-0 top-0 w-full lg:pr-8 lg:pl-8 <?=$is_admin ? 'pt-12' : 'lg:pt-2'?> lg:pb-2 p-4 z-40">
	<div class="flex items-center justify-between bro-max-width">
		<div class="flex items-center">			
			<div
				x-data="{}"
				@click="$dispatch('open-menu', { open: true })"
				class="button_ghost b-nav_item flex items-center justify-center"
			>
				<svg x="0px" y="0px" width="18.3px" height="13.4px" viewBox="0 0 18.3 13.4" class="cursor-pointer burger-bar " >
					<path class="st0" d="M18.2,12.4c0.1,0.1,0.2,0.3,0.2,0.4s-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.2-0.4,0.2H0.6c-0.2,0-0.3-0.1-0.4-0.2
					C0.1,13.2,0,13,0,12.8s0.1-0.3,0.2-0.4c0.1-0.1,0.3-0.2,0.4-0.2h17.1C17.9,12.2,18,12.3,18.2,12.4z M17.7,6.1H0.6
					c-0.2,0-0.3,0.1-0.4,0.2C0.1,6.4,0,6.6,0,6.7C0,6.9,0.1,7,0.2,7.2c0.1,0.1,0.3,0.2,0.4,0.2h17.1c0.2,0,0.3-0.1,0.4-0.2
					c0.1-0.1,0.2-0.3,0.2-0.4c0-0.2-0.1-0.3-0.2-0.4C18,6.2,17.9,6.1,17.7,6.1z M0.6,1.2h17.1c0.2,0,0.3-0.1,0.4-0.2
					c0.1-0.1,0.2-0.3,0.2-0.4c0-0.2-0.1-0.3-0.2-0.4C18,0.1,17.9,0,17.7,0H0.6C0.4,0,0.3,0.1,0.2,0.2C0.1,0.3,0,0.4,0,0.6
					C0,0.8,0.1,0.9,0.2,1C0.3,1.2,0.4,1.2,0.6,1.2z" />
				</svg>
			</div>
			<div class="logo   flex items-center mr-4">
				<a href="<?= get_site_url() ?>/"><div class="b-nav_item" style="height:5rem;width: auto;"><img src="<?= get_theme_file_uri() ?>/assets/images/favicon.png"/></div></a>
				<a href="<?= get_site_url() ?>/">
					<div style="letter-spacing:0rem;font-size:1.5rem;line-height:1.5rem;" class="ml-2 font-bold">เพื่อนแท้<br />ร้านอาหาร</div>
				</a>
			</div>
			<?php foreach($menus_desktop as $menu):?>
					<a class="button_ghost b-nav_item flex items-center text-en mr-2 text-sm" href="<?= $menu['link'] === '' ? get_site_url() : get_permalink(get_page_by_path($menu['link']))?>" ><?= $menu['label']?></a>
			<?php endforeach;?>
		</div>
		<div class="flex items-center">
			
			<!-- <div class="" style="width: 120px;margin-left: 60px;"></div> -->
			<div class="flex items-center">
				<div class="flex button_ghost b-nav_item items-center mr-2">
					<a class="mr-3" href="https://www.facebook.com/RestaurantBuddy/" target="_blank">
						<svg style="height:1.25rem;width:2rem;" x="0px" y="0px" width="20.9px" height="20px" viewBox="0 0 20.9 20" class=" cursor-pointer balloon-chat">
							<path class="st0" d="M0,2.6c0-0.7,0.3-1.4,0.8-1.8C1.3,0.3,1.9,0,2.6,0h15.7c0.7,0,1.4,0.3,1.8,0.8c0.5,0.5,0.8,1.2,0.8,1.8v10.5
							c0,0.7-0.3,1.4-0.8,1.8c-0.5,0.5-1.2,0.8-1.8,0.8H5.8c-0.3,0-0.7,0.1-0.9,0.4l-3.7,3.7C1,19.9,0.9,20,0.8,20c-0.1,0-0.3,0-0.4,0
							s-0.2-0.1-0.3-0.2C0,19.6,0,19.5,0,19.3V2.6z M4.6,3.9C4.4,3.9,4.2,4,4.1,4.1C4,4.2,3.9,4.4,3.9,4.6C3.9,4.8,4,4.9,4.1,5
							c0.1,0.1,0.3,0.2,0.5,0.2h11.8c0.2,0,0.3-0.1,0.5-0.2C16.9,4.9,17,4.8,17,4.6c0-0.2-0.1-0.3-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H4.6z
							M4.6,7.2c-0.2,0-0.3,0.1-0.5,0.2C4,7.5,3.9,7.7,3.9,7.8C3.9,8,4,8.2,4.1,8.3c0.1,0.1,0.3,0.2,0.5,0.2h11.8c0.2,0,0.3-0.1,0.5-0.2
							C16.9,8.2,17,8,17,7.8c0-0.2-0.1-0.3-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H4.6z M4.6,10.5c-0.2,0-0.3,0.1-0.5,0.2
							c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.2,0.1,0.3,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2h6.5c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5
							c0-0.2-0.1-0.3-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H4.6z" />
						</svg>
					</a>
					<div class="text-en  text-sm">
						Contact
					</div>
				</div>
				<div
					x-data="{}"
					@click="$dispatch('open-search', { open: true })"
				class="flex button_ghost b-nav_item hilight items-center">
					<div id="searchbox" class="rounded-full flex items-center top-4 right-4">
						<button type="button" class="lg:w-10 lg:h-10 w-8 h-8 flex justify-center items-center cursor-pointer" id="magni">
							<img style="height:1.25rem;" src="<?= get_theme_file_uri() ?>/assets/images/magnifier_light.svg" />
						</button>
					</div>
					<div class="text-en mr-4 text-sm">
						Search
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
<section
	x-data="slideout()"
	x-cloak
	@open-search.window="open = $event.detail.open"	
	@keydown.escape="open = false"
	x-init="init()">
	<div
		x-show.transition.opacity.duration.500="open"
		@click="open = false"
		style="z-index:999;"
		class="fixed  inset-0 bg-black bg-opacity-25"></div>
	<div
		style="z-index:999;"
		class="light_theme fixed transition duration-300 left-0 top-0 transform w-full  overflow-hidden pt-10"
		:class="{'-translate-y-full': !open}">
			<form class="w-full max-w-4xl mx-auto " method="get" action="<?= get_site_url() ?>">
				<div id="searchbox" class="rounded-xl flex items-center p-4" style="background-color:white;">
					<div type="button" class="lg:w-10 lg:h-10 w-10 h-10 mr-2 flex justify-center items-center cursor-pointer opacity-50" >
						<img class="w-6 h-6" src="<?= get_theme_file_uri() ?>/assets/images/magnifier.svg" />
					</div>
					<input x-ref="focus" class="m-0 border-0 h-12 font-light flex-1 text-3xl" type="text" style="background-color:white;color:#262145;" placeholder="ค้นหา..." id="searchInput" name="s" />
					<div
						@click="open = false"
						x-ref="closeButton"			
						class="button_ghost ">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x w-8 h-8"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
					</div>		
				</div>
			</form>		
	</div>
</section>
<section
	x-data="slideout()"
	x-cloak
	@open-menu.window="open = $event.detail.open"	
	@keydown.escape="open = false"
	x-init="init()">
	<div
		x-show.transition.opacity.duration.500="open"
		@click="open = false"
		style="z-index:999;"
		class="fixed  inset-0 bg-black bg-opacity-25"></div>
	<div
		style="z-index:999;"
		class="light_theme fixed transition duration-300 left-0 top-0 transform w-full max-w-xs h-screen bg-gray-100 overflow-hidden"
		:class="{'-translate-x-full': !open}">
		<button
			@click="open = false"
			x-ref="closeButton"			
			class="fixed top-0 right-0 mr-4 mt-2 z-50 button_ghost">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
		</button>
		<div class="py-16  px-4 absolute w-full top-0 h-full overflow-y-scroll">		
			<?php foreach($menus as $menu):?>
				<a href="<?= $menu['link'] === '' ? get_site_url() : get_permalink(get_page_by_path($menu['link']))?>" class=" button_ghost mb-2 block w-full text-left text-en p-4  leading-loose" style="color: #062241;"><?= $menu['label']?></a>
			<?php endforeach;?>
		</div>
	</div>
</section>
<script>
	function slideout() {
		return {
			open: false,			
			init() {
				this.$watch('open', value => {
					value && this.$refs.closeButton.focus()
					value && this.$refs.focus && this.$refs.focus.focus()
					this.toggleOverlay()
				})
				this.toggleOverlay()
			},
			toggleOverlay() {
				document.body.classList[this.open ? 'add' : 'remove']('h-screen', 'overflow-hidden')
			}
		}
	}
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
	var ismobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
	$("#magni").click(() => {
		let searchInput = $("#searchInput");
		searchInput.show();
		if (ismobile) {
			$('#searchbox').css({
				position: 'absolute'
			});
		}
		searchInput.focus();
		if (searchInput.val()) {
			$("#magni").attr('type', 'submit')
		}
	});
	
</script>

<div>
<?php
	wp_body_open();
?>	
</div>