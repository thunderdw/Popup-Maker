<?php
/**
 * Integration handler for Abstract.
 *
 * @package   PUM
 * @copyright Copyright (c) 2022, Code Atlantic LLC
 */

abstract class PUM_Abstract_Integration implements PUM_Interface_Integration {

	/**
	 * @var string
	 */
	public $key;

	/**
	 * @var string
	 */
	public $type;

	/**
	 * @return string
	 */
	abstract public function label();

	/**
	 * @return bool
	 */
	abstract public function enabled();

}
