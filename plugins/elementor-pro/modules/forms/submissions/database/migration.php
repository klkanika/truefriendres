<?php
namespace ElementorPro\Modules\Forms\Submissions\Database;

use Elementor\Core\Base\Base_Object;

class Migration extends Base_Object {
	const OPTION_DB_VERSION = 'elementor_submissions_db_version';

	public static function install() {
		if ( ! get_option( self::OPTION_DB_VERSION ) ) {
			self::migration_initial();

			update_option( self::OPTION_DB_VERSION, ELEMENTOR_PRO_VERSION );
		}
	}

	public static function upgrade() {}

	public static function migration_initial() {
		global $wpdb;

		new Migration\Initial( $wpdb );
	}
}
