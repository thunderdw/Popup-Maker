<?php
/**
 * VisualComposer Builder for Integration
 *
 * @package   PUM
 * @copyright Copyright (c) 2022, Code Atlantic LLC
 */

class PUM_Integration_Builder_VisualComposer extends PUM_Abstract_Integration {

	/**
	 * @var string
	 */
	public $key = 'visualcomposer';

	/**
	 * @var string
	 */
	public $type = 'builder';

	/**
	 * @return string
	 */
	public function label() {
		return 'Visual Composer';
	}

	/**
	 * @return bool
	 */
	public function enabled() {
		return defined( 'WPB_VC_VERSION' ) || defined( 'FL_BUILDER_VERSION' );
	}

}
