<?php
namespace ElementorPro\Modules\Forms\Submissions\Export;

use Elementor\Core\Base\Base_Object;
use ElementorPro\Core\Utils\Collection;
use ElementorPro\Modules\Forms\Submissions\Database\Repositories\Form_Snapshot_Repository;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Csv_Export extends Base_Object {
	/**
	 * @var Collection
	 */
	private $submissions;

	/**
	 * Csv_Export constructor.
	 *
	 * @param Collection $submissions
	 */
	public function __construct( Collection $submissions ) {
		$this->submissions = $submissions;
	}

	/**
	 * @param $filename
	 *
	 * @return array
	 * @throws Export_Exception
	 */
	public function get_as_json_response( $filename ) {
		$headers = $this->get_headers();
		$rows = $this->get_rows();

		return [
			'data' => array_merge( $headers, $rows ),
			'meta' => [
				'mimetype' => 'text/csv;charset:utf8',
				'filename' => $filename,
			],
		];
	}

	/**
	 * @return array
	 * @throws Export_Exception
	 */
	private function get_headers() {
		$headers = [
			'1_form_name' => __( 'Form Name (ID)', 'elementor-pro' ),
			'2_id' => __( 'Submission ID', 'elementor-pro' ),
			'3_created_at' => __( 'Created At', 'elementor-pro' ),
			'4_user_id' => __( 'User ID', 'elementor-pro' ),
			'5_user_agent' => __( 'User Agent', 'elementor-pro' ),
			'6_user_ip' => __( 'User IP', 'elementor-pro' ),
			'7_referrer' => __( 'Referrer', 'elementor-pro' ),
		];

		$first_submission = $this->submissions->first();

		$form = Form_Snapshot_Repository::instance()
			->find( $first_submission['post']['id'], $first_submission['element_id'] );

		if ( ! $form ) {
			throw new Export_Exception( __( 'Something went wrong, please try again later.', 'elementor-pro' ) );
		}

		foreach ( $form->fields as $field ) {
			$headers[ $field['id'] ] = $field['label'];
		}

		ksort( $headers );

		return [ implode( ',', $headers ) ];
	}

	/**
	 * @return array
	 */
	private function get_rows() {
		return $this->submissions->map( function ( $submission ) {
			$values = [];

			foreach ( $submission['values'] as $value ) {
				$values[ $value['key'] ] = wp_json_encode( $value['value'] );
			}

			$result = [
				'1_form_name' => wp_json_encode( "{$submission['form']['name']} ({$submission['form']['element_id']})" ),
				'2_id' => wp_json_encode( $submission['id'] ),
				'3_created_at' => wp_json_encode( $submission['created_at'] ),
				'4_user_id' => wp_json_encode( $submission['user_id'] ),
				'5_user_agent' => wp_json_encode( $submission['user_agent'] ),
				'6_user_ip' => wp_json_encode( $submission['user_ip'] ),
				'7_referrer' => wp_json_encode( $submission['referer'] ),
			] + $values;

			ksort( $result );

			return implode( ',', $result );
		} )->all();
	}
}
