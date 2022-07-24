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
                'date_of_birth' => date("Y-m-d"),
                'phone_number' => '081336473785',
                'position' => 'Admin',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nik' => '1099929938810013',
                'fullname'  => 'Employee',
                'email'  =>  "employee@employee.com",
                'level'  => 'employee',
                'date_of_birth' => date("Y-m-d"),
                'phone_number' => '081336473755',
                'position' => 'Employee',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nik' => '1099929938810013',
                'fullname'  => 'Ridho',
                'email'  =>  "ridho@employee.com",
                'level'  => 'employee',
                'date_of_birth' => date("Y-m-d"),
                'phone_number' => '081336473755',
                'position' => 'Programmer',
                'password'  =>  password_hash("123", PASSWORD_DEFAULT),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ];
        $this->db->table('users')->insertBatch($data);
    }
}