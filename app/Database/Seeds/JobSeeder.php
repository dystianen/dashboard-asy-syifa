<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JobSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id' => 7,
                'type_of_work'  => 'Administrator',
                'description'  =>  "admin@admin.com",
                'point'  => 600,
            ],
            [
                'user_id' => 8,
                'type_of_work'  => 'Programmer',
                'description'  =>  "Membuat sebuah database yang ramah dilihat user",
                'point'  => 7000,
            ],
        ];
        $this->db->table('jobs')->insertBatch($data);
    }
}
