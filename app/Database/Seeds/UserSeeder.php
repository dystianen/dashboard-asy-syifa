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
                'position' => 'Admin',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time()),
            ],
            [
                'nik' => '1099929938810013',
                'fullname'  => 'Employee',
                'email'  =>  "employee@employee.com",
                'level'  => 'employee',
                'phone_number' => '081336473755',
                'position' => 'Employee',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time()),
            ],
            [
                'nik' => '1099929938810013',
                'fullname'  => 'Ridho',
                'email'  =>  "ridho@employee.com",
                'level'  => 'employee',
                'phone_number' => '081336473755',
                'position' => 'Programmer',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d", time()),
                'updated_at' => date("Y-m-d", time()),
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}