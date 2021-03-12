<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// TODO: Use API data instead of this static array, once it is available.
$breakpoints = [
	'mobile' => __( 'Mobile', 'elementor' ),
	'tablet' => __( 'Tablet', 'elementor' ),
	'desktop' => __( 'Desktop', 'elementor' ),
]; ?>

<script type="text/template" id="tmpl-elementor-templates-responsive-bar">
		<div class="e-responsive-bar__col"></div>
		<div class="e-responsive-bar__col">
			<div class="e-responsive-bar-switcher">
				<?php foreach ( $breakpoints as $name => $label ) {
					printf( '<input
							type="radio"
							name="breakpoint"
							class="e-responsive-bar-switcher__option e-responsive-bar-switcher__option-%1$s"
							id="e-responsive-bar-switch-%1$s"
							value="%1$s">
					<label class="e-responsive-bar-switcher__label" for="e-responsive-bar-switch-%1$s" data-tooltip="%2$s">
						<i class="eicon-device-%1$s" aria-hidden="true"></i>
						<span class="screen-reader-text">%2$s</span>
					</label>', $name, $label ); } ?>
			</div>
		</div>
		<div class="e-responsive-bar__col">
			<button class="e-responsive-bar__settings-button e-responsive-bar__button">
				<span class="elementor-screen-only"><?php echo __( 'Settings', 'elementor' ); ?></span>
				<i class="eicon-cog" aria-hidden="true"></i>
			</button>
			<button class="e-responsive-bar__close-button e-responsive-bar__button">
				<span class="elementor-screen-only"><?php echo __( 'Close', 'elementor' ); ?></span>
				<i class="eicon-close" aria-hidden="true"></i>
			</button>
		</div>
</script>
