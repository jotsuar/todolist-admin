<?php
App::uses('ResultadosAliado', 'Model');

/**
 * ResultadosAliado Test Case
 *
 */
class ResultadosAliadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.resultados_aliado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ResultadosAliado = ClassRegistry::init('ResultadosAliado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ResultadosAliado);

		parent::tearDown();
	}

}
