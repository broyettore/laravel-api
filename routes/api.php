<?php

use App\Http\Controllers\Api\LeadController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TechnologyController;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// route api projects
Route::get("projects", [ProjectController::class, "index"]);
Route::get("projects/{slug}", [ProjectController::class, "show"]);

// route api types
Route::get('types', [TypeController::class, 'index']);
Route::get('types/{slug}', [TypeController::class, 'show']);

//route api technologies
Route::get('technologies', [TechnologyController::class, 'index']);
Route::get('technologies/{slug}', [TechnologyController::class, 'show']);

//route api Leads
Route::post("leads", [LeadController::class, "store"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
