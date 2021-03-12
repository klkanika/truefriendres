<?php
namespace ElementorPro\Modules\Forms\Submissions\Data\Endpoints;

use Elementor\Data\Base\Endpoint;
use ElementorPro\Core\Utils\Collection;
use ElementorPro\Modules\Forms\Submissions\Export\Csv_Export;
use ElementorPro\Modules\Forms\Submissions\Database\Query;
use ElementorPro\Modules\Forms\Submissions\Export\Export_Exception;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * This logic should be under index.php::get_items method, but for now
 * the Data JS API does not support sending Headers like `Accept: text/csv`.
 */
class Export extends Endpoint {
	const EXPORT_BY_IDS = 'ids';
	const EXPORT_BY_FILTER = 'filter';

	public function get_name() {
		return 'export';
	}

	protected function register() {
		$this->register_route(
			'',
			\WP_REST_Server::READABLE,
			function ( $request ) {
				return $this->base_callback( \WP_REST_Server::READABLE, $request, true );
			},
			array_merge( $this->controller->get_collection_params(), [
				'ids' => [
					'description' => 'Unique identifiers for the objects.',
					'type' => 'array',
					'items' => [
						'type' => 'integer',
					],
					'required' => false,
					'additionalProperties' => [
						'context' => 'filter',
					],
				],
				'format' => [
					'description' => 'The format of the export (for now only csv).',
					'types' => 'string',
					'enum' => [
						'csv',
					],
					'default' => 'csv',
					'required' => false,
				],
				'per_page' => [
					'description' => 'Maximum number of items to be returned in result set.',
					'type' => 'integer',
					'default' => 10,
					'minimum' => 1,
					'maximum' => 10000,
					'sanitize_callback' => 'absint',
					'validate_callback' => 'rest_validate_request_arg',
				],
			] )
		);
	}

	/**
	 * @param \WP_REST_Request $request
	 *
	 * @return \WP_Error|\WP_REST_Response
	 */
	public function get_items( $request ) {
		wp_raise_memory_limit( 'admin' );

		$date = gmdate( 'Y-m-d' );

		$submissions = new Collection(
			$this->get_submissions_by_filter( $request )
		);

		if ( 0 === $submissions->count() ) {
			return new \WP_Error(
				'nothing_to_export',
				__( 'There is nothing to export.', 'elementor-pro' ),
				[ 'status' => 400 ]
			);
		}

		$form_ids = $submissions->pluck( 'element_id' )->unique();

		if ( 1 < $form_ids->count() ) {
			return new \WP_Error(
				'more_then_one_form_to_export',
				__( 'You are trying to export submissions from various forms, please select one form only.', 'elementor-pro' ),
				[ 'status' => 400 ]
			);
		}

		$exporter = new Csv_Export( $submissions );

		try {
			return new \WP_REST_Response(
				$exporter->get_as_json_response(
					"elementor-submissions-export-{$form_ids->first()}-{$date}.csv"
				)
			);
		} catch ( Export_Exception $exception ) {
			return new \WP_Error(
				'error',
				$exception->getMessage(),
				[ 'status' => 500 ]
			);
		}
	}

	/**
	 * Get submissions by filter.
	 *
	 * @param $request
	 *
	 * @return array|mixed
	 */
	private function get_submissions_by_filter( $request ) {
		$args = $request->get_attributes()['args'];

		$filters = ( new Collection( $request->get_query_params() ) )
			->filter(function ( $value, $key ) use ( $args ) {
				return isset( $args[ $key ]['additionalProperties']['context'] ) &&
					'filter' === $args[ $key ]['additionalProperties']['context'];
			})
			->map( function ( $value ) use ( $request ) {
				return [ 'value' => $value ];
			} )
			->all();

		return Query::get_instance()->get_submissions(
			[
				'page' => $request->get_param( 'page' ),
				'per_page' => $request->get_param( 'per_page' ),
				'filters' => $filters,
				'order' => [
					'order' => $request->get_param( 'order' ),
					'by' => $request->get_param( 'order_by' ),
				],
				'with_meta' => true,
			]
		)['data'];
	}
}
