<?php
/**
 * RespuestasAliadaFixture
 *
 */
class RespuestasAliadaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'pregunta_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => false, 'default' => null),
		'modified' => array('type' => 'integer', 'null' => false, 'default' => null),
		'estado' => array('type' => 'integer', 'null' => false, 'default' => null),
		'puntaje' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'pregunta_id' => 1,
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-02-14',
			'modified' => 1,
			'estado' => 1,
			'puntaje' => 1
		),
	);

}
