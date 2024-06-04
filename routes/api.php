<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/technologies', [ProjectController::class, 'getTechnologies']);
Route::get('/types', [ProjectController::class, 'getTypes']);
//in Laravel il parametro dinamico lo passo con /{slug} in router.vue lo passo con /:slug
Route::get('/project-by-slug/{slug}', [ProjectController::class, 'getProjectBySlug']);
