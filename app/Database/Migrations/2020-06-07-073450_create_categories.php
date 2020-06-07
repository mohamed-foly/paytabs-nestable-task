<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategories extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'name'=>[
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'parent_id'=>[
				'type' => 'INT',
				'unsigned' => TRUE,
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('categories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('categories');
	}
}
