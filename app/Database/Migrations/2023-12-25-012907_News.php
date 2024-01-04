<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'news_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->addKey('news_id', true);

        // Create Table Categories
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
