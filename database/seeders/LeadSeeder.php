<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\Project;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 50; $i++) {
            
            $project = Project::inRandomOrder()->first();
            
            $lead = new Lead();
            $lead->name = fake()->name;
            $lead->email = fake()->email();
            $lead->content = fake()->text();
            $lead->project_id = $project->id;
            $lead->save();
        }
    }
}
