<?php
/**
 * RevisadosAliadoFixture
 *
 */
class RevisadosAliadoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'date', 'null' => false, 'default' => null),
		'modified' => array('type' => 'date', 'null' => false, 'default' => null),
		'puntaje_deshabilitado' => array('type' => 'float', 'null' => true, 'default' => null),
		'controller' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'comment' => 'propieas, aliadas', 'charset' => 'latin1'),
		'resultado_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'resultado' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => 255),
		'resultado_html' => array('type' => 'binary', 'null' => false, 'default' => null),
		'planta' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'interpretacion' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'user_id' => 1,
			'created' => '2017-02-16',
			'modified' => '2017-02-16',
			'puntaje_deshabilitado' => 1,
			'controller' => 'Lorem ipsum dolor sit amet',
			'tipo' => 'Lorem ipsum dolor sit amet',
			'resultado_id' => 1,
			'resultado' => 1,
			'resultado_html' => 'Lorem ipsum dolor sit amet',
			'planta' => 'Lorem ipsum dolor sit amet',
			'interpretacion' => 'Lorem ipsum dolor sit amet'
		),
	);

}
