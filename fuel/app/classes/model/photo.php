<?php
use Orm\Model;

class Model_Photo extends \Orm\Model_Soft
{
	protected static $_properties = array(
		'id',
		'place',
		'comment',
		'created_at',
		'updated_at',
		'deleted_at',
		'user_id',
	);

	protected static $_soft_delete = array(
		'deleted_field' => 'deleted_at',
	 );

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('place', 'Place', 'required|max_length[500]');

		return $val;
	}

}
