<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'Front End',
            'Back End',
            'API',
            'Front Office',
            'Back Office',
        ];
        
        foreach ($types as $type) {
            Type::create(['name' => $type]);
        }
    }
}