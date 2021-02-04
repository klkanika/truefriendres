<style>
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
		height: 3rem;
		width: 6rem;
	}

	.gallery-thumbnail {
		height: 30vh
	}
	.screen-reader-text{
		display: none;
	}

	@media (min-width:1024px) {
		.fourthSliderClass {
			height: 40vh;
		}

		.tab-button {
			min-height: 3rem;
			min-width: 10rem;
		}

		.gallery-thumbnail {
			height: 60vh
		}
	}
	#headder{
		background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0));
		width: 100vw;
	}
	.burger-bar,.balloon-chat{
		fill: #fff;
	}
	.logo{
		color: #fff;
		font-weight: 600;
    line-height: 1.2em;
		font-size: 1.05rem;
		letter-spacing: 0.05em;
		/* margin-left: 60px; */
	}
	html:not([data-scroll="0"]) #headder{
		background: #262145;
	}
	html:not([data-scroll="0"]) .burger-bar,html:not([data-scroll="0"]) .balloon-chat{
		fill: #fff !important;
	}
	html:not([data-scroll="0"]) .logo{
		color: #fff !important;
	}
	img{
		max-width: 100%;
		max-height: 100%;
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
	document.addEventListener('scroll', debounce(storeScroll), { passive: true });

	// Update scroll position for first time
	storeScroll();

</script>
<div id="headder" class="fixed flex items-center justify-between left-0 top-0 w-full lg:pr-8 lg:pl-8 lg:pt-4 lg:pb-4 p-4 z-40">
	<svg x="0px" y="0px" width="18.3px" height="13.4px" viewBox="0 0 18.3 13.4" class="cursor-pointer burger-bar">
	<path class="st0" d="M18.2,12.4c0.1,0.1,0.2,0.3,0.2,0.4s-0.1,0.3-0.2,0.4c-0.1,0.1-0.3,0.2-0.4,0.2H0.6c-0.2,0-0.3-0.1-0.4-0.2
		C0.1,13.2,0,13,0,12.8s0.1-0.3,0.2-0.4c0.1-0.1,0.3-0.2,0.4-0.2h17.1C17.9,12.2,18,12.3,18.2,12.4z M17.7,6.1H0.6
		c-0.2,0-0.3,0.1-0.4,0.2C0.1,6.4,0,6.6,0,6.7C0,6.9,0.1,7,0.2,7.2c0.1,0.1,0.3,0.2,0.4,0.2h17.1c0.2,0,0.3-0.1,0.4-0.2
		c0.1-0.1,0.2-0.3,0.2-0.4c0-0.2-0.1-0.3-0.2-0.4C18,6.2,17.9,6.1,17.7,6.1z M0.6,1.2h17.1c0.2,0,0.3-0.1,0.4-0.2
		c0.1-0.1,0.2-0.3,0.2-0.4c0-0.2-0.1-0.3-0.2-0.4C18,0.1,17.9,0,17.7,0H0.6C0.4,0,0.3,0.1,0.2,0.2C0.1,0.3,0,0.4,0,0.6
		C0,0.8,0.1,0.9,0.2,1C0.3,1.2,0.4,1.2,0.6,1.2z"/>
	</svg>
	<div class="logo flex items-center lg:ml-8">
		<div style="width: 35px;"><?php twentytwenty_site_logo(); ?></div>
		<a href="/"><div class="ml-2">เพื่อนแท้<br/>ร้านอาหาร</div></a>
	</div>
	<!-- <div class="" style="width: 120px;margin-left: 60px;"></div> -->
	<div class="flex items-center">
		<svg x="0px" y="0px" width="20.9px" height="20px" viewBox="0 0 20.9 20" class="lg:mr-6 mr-4 cursor-pointer balloon-chat">
		<path class="st0" d="M0,2.6c0-0.7,0.3-1.4,0.8-1.8C1.3,0.3,1.9,0,2.6,0h15.7c0.7,0,1.4,0.3,1.8,0.8c0.5,0.5,0.8,1.2,0.8,1.8v10.5
			c0,0.7-0.3,1.4-0.8,1.8c-0.5,0.5-1.2,0.8-1.8,0.8H5.8c-0.3,0-0.7,0.1-0.9,0.4l-3.7,3.7C1,19.9,0.9,20,0.8,20c-0.1,0-0.3,0-0.4,0
			s-0.2-0.1-0.3-0.2C0,19.6,0,19.5,0,19.3V2.6z M4.6,3.9C4.4,3.9,4.2,4,4.1,4.1C4,4.2,3.9,4.4,3.9,4.6C3.9,4.8,4,4.9,4.1,5
			c0.1,0.1,0.3,0.2,0.5,0.2h11.8c0.2,0,0.3-0.1,0.5-0.2C16.9,4.9,17,4.8,17,4.6c0-0.2-0.1-0.3-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H4.6z
			M4.6,7.2c-0.2,0-0.3,0.1-0.5,0.2C4,7.5,3.9,7.7,3.9,7.8C3.9,8,4,8.2,4.1,8.3c0.1,0.1,0.3,0.2,0.5,0.2h11.8c0.2,0,0.3-0.1,0.5-0.2
			C16.9,8.2,17,8,17,7.8c0-0.2-0.1-0.3-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H4.6z M4.6,10.5c-0.2,0-0.3,0.1-0.5,0.2
			c-0.1,0.1-0.2,0.3-0.2,0.5c0,0.2,0.1,0.3,0.2,0.5c0.1,0.1,0.3,0.2,0.5,0.2h6.5c0.2,0,0.3-0.1,0.5-0.2c0.1-0.1,0.2-0.3,0.2-0.5
			c0-0.2-0.1-0.3-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2H4.6z"/>
		</svg>

		<div class="lg:w-10 lg:h-10 w-8 h-8 rounded-full flex justify-center items-center cursor-pointer" style="background-color:#FFD950;">
			<img src="<?= get_theme_file_uri() ?>/assets/images/magnifier.svg" />
		</div>
	</div>
</div>