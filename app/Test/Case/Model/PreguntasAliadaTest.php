<?php
App::uses('PreguntasAliada', 'Model');

/**
 * PreguntasAliada Test Case
 *
 */
class PreguntasAliadaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.preguntas_aliada',
		'app.categoria',
		'app.pregunta',
		'app.respuesta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PreguntasAliada = ClassRegistry::init('PreguntasAliada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PreguntasAliada);

		parent::tearDown();
	}

}
