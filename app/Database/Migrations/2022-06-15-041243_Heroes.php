<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Heroes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'heroes_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'file_name' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'file_type' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'file_path' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        // Primary Key Table ID
        $this->forge->addKey('heroes_id', true);

        // Create Table Categories
        $this->forge->createTable('heroes');
    }

    public function down()
    {
        $this->forge->dropTable('heroes');
    }
}
