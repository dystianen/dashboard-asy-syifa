<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Performance extends Migration
{
    public function up()
    {
        $forge = \Config\Database::forge();
        $this->forge->addField([
            'performanceId' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => true,
                'null' => true,
            ],
            'description' => [
                'type' => 'INT',
                'type' => 'TEXT',
                'null' => true,
            ],
            'score' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Primary Key Table ID
        $this->forge->addKey('performanceId', true);

        // Relations
        $this->forge->addForeignKey('user_id', 'users', 'userId');

        // Create Table Categories
        $this->forge->createTable('performances');
    }

    public function down()
    {
        // Drop Table Categories
        $forge = \Config\Database::forge();
        $this->forge->dropTable('performances');
    }
}
