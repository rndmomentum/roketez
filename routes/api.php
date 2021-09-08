<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('report/sales', 'RoketezApi@getReportCollection');
Route::get('report/transaction', 'RoketezApi@getReportTransaction');

Route::get('course/{id}', 'RoketezApi@getCourse');
Route::get('lesson/{id}', 'RoketezApi@getLesson');
Route::get('lessons/{id}', 'RoketezApi@getLessons');
Route::get('courses', 'RoketezApi@getCourses');

Route::post('login', 'RoketezApi@login');