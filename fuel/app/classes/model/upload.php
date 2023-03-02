<?php
use Orm\Model;

class Model_Upload extends \Orm\Model
{
	protected static $_properties = [
		'id',
		'origin_name',
		'file_name',
		'created_at',
		'updated_at',
		'photos_id',
		'path',
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
		return $val;
	}

}