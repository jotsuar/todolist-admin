<?php
/**
 * PreguntasAliadaFixture
 *
 */
class PreguntasAliadaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'numero' => array('type' => 'integer', 'null' => false, 'default' => null),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'date', 'null' => false, 'default' => null),
		'modified' => array('type' => 'date', 'null' => false, 'default' => null),
		'estado' => array('type' => 'integer', 'null' => false, 'default' => null),
		'categoria_id' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'numero' => 1,
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-02-13',
			'modified' => '2017-02-13',
			'estado' => 1,
			'categoria_id' => 1
		),
	);

}
