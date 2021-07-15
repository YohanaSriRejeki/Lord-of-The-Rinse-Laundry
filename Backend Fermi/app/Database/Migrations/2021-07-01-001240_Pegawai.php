<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pegawai extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'username'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '225',
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'alamat'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'level'       => [
				'type'       => 'INT',
				'constraint' => 1,
				'unsigned'       => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pegawai');
	}

	public function down()
	{
		$this->forge->dropTable('pegawai');
	}
}
