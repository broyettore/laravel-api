<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function destroy(Lead $lead)
    {
        $project = $lead->project;
        
        $lead->delete();
        return to_route("admin.projects.show", $project);
    }
}
