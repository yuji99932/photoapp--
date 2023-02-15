<?php
use Orm\Model;

class Model_Upload extends Model
{
	protected static $_properties = array(
		'id',
		'origin_name',
		'file_name',
		'created_at',
		'updated_at',
          'photos_id',
          'path',
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
		// $val->add_field('place', 'Place', 'required|max_length[500]');

		return $val;
	}

}