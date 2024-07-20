<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData =[
            [
                'name'=>'admin1',
                'username'=>'admin1'
            ],
            [
                'name'=>'admin2',
                'username'=>'admin2'
            ]
        ];
        foreach($userData as $key=>$val){
            User::create($val);
        }
    }
}
