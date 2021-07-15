<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idRole'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'level'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('role');
	}

	public function down()
	{
		$this->forge->dropTable('role');
	}
}
