<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request) {

        $data = $request->validate([
            "name" => "required|string|max:80",
            "email" => "required|string",
            "content" => "required|string",
            "project_id" => "integer|exists:projects,id"
        ]);

        $lead = new Lead();
        $lead->name = $data["name"];
        $lead->email = $data["email"];
        $lead->content = $data["content"];
        $lead->project_id = $data["project_id"];
        $lead->save();

        Mail::to("roytest@projects.it")->send(new NewLead($lead));

        return $lead;
    }
}
