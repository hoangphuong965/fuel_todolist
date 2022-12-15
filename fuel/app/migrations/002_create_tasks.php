<?php

namespace Fuel\Migrations;

class Create_tasks
{
	public function up()
	{
		\DBUtil::create_table('tasks', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'name' => array('constraint' => 255, 'null' => false, 'type' => 'varchar'),
			'status' => array('null' => false, 'type' => 'boolean'),
			'rank' => array('constraint' => 11, 'null' => false, 'type' => 'int'),
			'project_id' => array('constraint' => 11, 'null' => false, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
			'updated_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tasks');
	}
}