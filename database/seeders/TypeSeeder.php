<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Facades\Schema;
use illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ["Startups", "Investment Banking", "AI", "Finance", "Government", "Blockchain"];

        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        foreach($types as $type) {

            $newType = new Type();

            $newType->name = $type;
            $newType->slug = Str::slug($newType->name);
            $newType->save();
        }
    }
}
