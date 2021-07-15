<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
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
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'berat' => [
				'type' => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
			],
			'idPaket'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'tglMasuk'          => [
				'type'           => 'DATE',
			],
			'tglKeluar'          => [
				'type'           => 'DATE',
			],
			'status'          => [
				'type'           => 'BOOLEAN',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('pelanggan');
	}

	public function down()
	{
		$this->forge->dropTable('pelanggan');
	}
}
