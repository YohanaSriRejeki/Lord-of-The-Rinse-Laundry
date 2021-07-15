<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Paket extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idPaket'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'paket'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'harga' => [
				'type' => 'INT',
				'unsigned' => true,
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('paket');
	}

	public function down()
	{
		$this->forge->dropTable('paket');
	}
}
