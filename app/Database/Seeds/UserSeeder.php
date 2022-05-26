<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nik' => '1099929938810012',
                'fullname'  => 'Administrator',
                'email'  =>  "admin@admin.com",
                'level'  => 'admin',
                'phone_number' => '081336473785',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT)
            ],
            [
                'nik' => '1099929938810013',
                'fullname'  => 'Employee',
                'email'  =>  "employee@employee.com",
                'level'  => 'employee',
                'phone_number' => '081336473755',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT)
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
