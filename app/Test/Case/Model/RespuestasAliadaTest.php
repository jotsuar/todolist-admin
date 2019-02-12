<?php
App::uses('RespuestasAliada', 'Model');

/**
 * RespuestasAliada Test Case
 *
 */
class RespuestasAliadaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.respuestas_aliada',
		'app.pregunta',
		'app.categoria',
		'app.respuesta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RespuestasAliada = ClassRegistry::init('RespuestasAliada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RespuestasAliada);

		parent::tearDown();
	}

}
