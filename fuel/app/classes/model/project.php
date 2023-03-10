<?php
use Orm\Model;

class Model_Project extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');

		return $val;
	}

	protected static $_has_many = array(
		'tasks' => array(
			'model_to' => 'Model_Task',
			'key_from' => 'id',
			'key_to' => 'project_id',
			'cascade_save' => true,
			'cascade_delete' => false
		)
	);

}
