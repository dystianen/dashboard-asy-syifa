<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 1,
                'type_of_work'  => 'Administrator',
                'description'  =>  "admin@admin.com",
                'point'  => 600,
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time()),
            ],
            [
                'user_id' => 3,
                'type_of_work'  => 'Programmer',
                'description'  =>  "Membuat sebuah database yang ramah dilihat user",
                'point'  => 7000,
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time()),
            ],
        ];
        $this->db->table('jobs')->insertBatch($data);
    }
}