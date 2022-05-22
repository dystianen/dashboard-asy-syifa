<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'fullname'  => 'Administrator',
                'email'  =>  "admin@admin.com",
                'level'  => 'Admin',
                'password'  =>  password_hash("admin123", PASSWORD_DEFAULT)
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
