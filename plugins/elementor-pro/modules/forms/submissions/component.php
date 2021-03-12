<?php
namespace ElementorPro\Modules\Forms\Submissions;

use Elementor\Settings;
use ElementorPro\Plugin;
use ElementorPro\Base\Module_Base;
use ElementorPro\Modules\Forms\Module as FormsModule;
use ElementorPro\Modules\Forms\Submissions\Data\Controller;
use ElementorPro\Modules\Forms\Submissions\Database\Migration;
use ElementorPro\Modules\Forms\Submissions\Data\Forms_Controller;
use ElementorPro\Modules\Forms\Submissions\Actions\Save_To_Database;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Component extends Module_Base {
	const NAME = 'form-submissions';
	const PAGE_ID = 'e-form-submissions';

	/**
	 * @return string
	 */
	public function get_name() {
		return static::NAME;
	}


	protected function get_assets_base_url() {
		return ELEMENTOR_PRO_URL;
	}

	/**
	 * Check if the current admin page is the component page.
	 *
	 * @return bool
	 */
	private function is_current() {
		// Nonce verification not required here.
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return ( ! empty( $_GET['page'] ) && self::PAGE_ID === $_GET['page'] );
	}

	/**
	 * Register admin menu
	 */
	private function register_admin_menu() {
		$title = $this->get_title();

		add_submenu_page(
			Settings::PAGE_ID,
			$title,
			$title,
			'manage_options',
			self::PAGE_ID,
			function () {
				echo '<div id="e-form-submissions"></div>';
			}
		);
	}

	/**
	 * Enqueue admin scripts
	 */
	private function enqueue_scripts() {
		wp_enqueue_style(
			'elementor-app-base',
			$this->get_css_assets_url( 'modules/forms/submissions/admin', null, 'default', true ),
			[],
			ELEMENTOR_PRO_VERSION
		);

		wp_enqueue_script(
			'form-submission-admin',
			$this->get_js_assets_url( 'form-submission-admin' ),
			[
				'wp-url',
				'wp-i18n',
				'wp-date',
				'react',
				'react-dom',
			],
			ELEMENTOR_PRO_VERSION,
			true
		);

		wp_set_script_translations(
			'form-submission-admin',
			'elementor-pro',
			ELEMENTOR_PRO_PATH . 'languages'
		);
	}

	private function get_title() {
		return __( 'Submissions', 'elementor-pro' );
	}

	/**
	 * Component constructor.
	 */
	public function __construct() {
		parent::__construct();

		Migration::install();
		Plugin::elementor()->data_manager->register_controller( Controller::class );
		Plugin::elementor()->data_manager->register_controller( Forms_Controller::class );

		new Personal_Data();

		add_action( 'elementor_pro/forms/register_action', function ( FormsModule $forms_module ) {
			$forms_module->add_form_action( 'save-to-database', new Save_To_Database() );
		}, 0 /* Before all the actions */ );

		add_filter( 'elementor_pro/forms/default_submit_actions', function ( $actions ) {
			return array_merge( $actions, [ 'save-to-database' ] );
		} );

		add_action( 'admin_menu', function () {
			$this->register_admin_menu();
		}, 21 /* after Elementor page */ );

		if ( $this->is_current() ) {
			add_action( 'admin_enqueue_scripts', function () {
				$this->enqueue_scripts();
			} );
		}
	}
}
