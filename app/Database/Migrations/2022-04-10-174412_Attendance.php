<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attendance extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'attendanceId' => [
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
            'category_id' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => true,
                'null' => true,
            ],
            'qr_id' => [
                'type' => 'INT',
                'constraint' => 12,
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
            'user_proof_file' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'status' => [
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
        $this->forge->addKey('attendanceId', true);

        // Added Relation
        $this->forge->addForeignKey('user_id', 'users', 'userId');
        $this->forge->addForeignKey('category_id', 'categories', 'categoryId');
        $this->forge->addForeignKey('qr_id', 'qr', 'qrId');

        // Create Table Attendance
        $this->forge->createTable('attendances');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        // Drop Table Attendance
        $forge = \Config\Database::forge();
        $this->forge->dropTable('attendances');
    }
}
