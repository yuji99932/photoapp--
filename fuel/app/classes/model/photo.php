<?php
use Orm\Model;

class Model_Photo extends \Orm\Model_Soft
{
	protected static $_properties = [
		'id',
		'place',
		'comment',
		'created_at',
		'updated_at',
		'deleted_at',
		'user_id',
	];

	protected static $_soft_delete = [
		'deleted_field' => 'deleted_at',
	];

	protected static $_observers = [
		'Orm\Observer_CreatedAt' => [
			'events' => ['before_insert'],
			'mysql_timestamp' => true,
		],
		'Orm\Observer_UpdatedAt' => [
			'events' => ['before_save'],
			'mysql_timestamp' => true,
		],
	];

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('place', 'Place', 'required|max_length[500]');

		return $val;
	}

}
