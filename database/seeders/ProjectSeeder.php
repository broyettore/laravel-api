<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();
        
        for($i = 0; $i < 30; $i++) {
            
            $newProject = new Project();
            
            $type = Type::inRandomOrder()->first();
            $newProject->name = $faker->sentence(3);
            $newProject->description = $faker->text();
            $newProject->client = $faker->company();
            $newProject->start = $faker->dateTimeBetween('-5 months', '-3 months');
            $newProject->end = $faker->dateTimeBetween('-1 month', '-3 days');
            $newProject->progress_status = $faker->randomElement(["Done", "On going"]);
            $newProject->slug = Str::slug($newProject->name, '-');
            $newProject->type_id = $type->id;
            $newProject->save();
        }
    }
}
