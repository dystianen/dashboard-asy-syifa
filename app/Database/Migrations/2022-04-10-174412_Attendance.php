<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attendance extends Migration
{
    public function up()
    {
        $forge = \Config\Database::forge();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'users_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],



            'is_logged_in' => [
                'type' => 'BOOLEAN',
                'default' => false
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'file' => [
                'type' => 'TEXT',
                'null' => true
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
        $this->forge->addKey('id', true);

        // Added Relation
        $forge->addForeignKey('users_id', 'users', 'id');

        // Create Table Attendance
        $this->forge->createTable('attendance');
    }

    public function down()
    {
        // Drop Table Attendance
        $forge = \Config\Database::forge();
        $this->forge->dropTable('attendance');
    }
}
