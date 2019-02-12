<?php
App::uses('RevisadosAliado', 'Model');

/**
 * RevisadosAliado Test Case
 *
 */
class RevisadosAliadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.revisados_aliado',
		'app.user',
		'app.resultado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RevisadosAliado = ClassRegistry::init('RevisadosAliado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RevisadosAliado);

		parent::tearDown();
	}

}
