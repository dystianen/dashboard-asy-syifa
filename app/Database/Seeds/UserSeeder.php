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
                'level'  => 'admin',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT)
            ],
            [
                'fullname'  => 'Employee',
                'email'  =>  "employee@employee.com",
                'level'  => 'employee',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT)
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
