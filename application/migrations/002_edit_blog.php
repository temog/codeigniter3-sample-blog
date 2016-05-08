<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Edit_blog extends CI_Migration {

	public function up()
	{

		$fields = [
			/*
			'created_at' => [
				'type' => 'TIMESTAMP',
			],
			'updated_at' => [
				'type' => 'TIMESTAMP',
			],
			 */
			'created_at TIMESTAMP NOT NULL DEFAULT 0',
			'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
		];

		$this->dbforge->add_column('blog', $fields);
	}

	public function down()
	{
		$this->dbforge->drop_column('blog', 'created_at');
		$this->dbforge->drop_column('blog', 'updated_at');
	}
}

