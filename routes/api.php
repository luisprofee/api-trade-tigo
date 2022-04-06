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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/login',[App\Http\Controllers\AuthController::class, 'login']);

Route::post('/nuevo_plan',[App\Http\Controllers\ActionPlanController::class, 'newPlan']);
Route::get('/planes',[App\Http\Controllers\ActionPlanController::class, 'index']);
Route::get('/update/plan/{id}/{state}',[App\Http\Controllers\ActionPlanController::class, 'updateState']);

Route::post('/create/type/budget',[App\Http\Controllers\BudgetTypeController::class, 'createTypeBudget']);
Route::get('/type/budgets',[App\Http\Controllers\BudgetTypeController::class, 'index']);
Route::get('/update/type/budget/{id}/{state}',[App\Http\Controllers\BudgetTypeController::class, 'updateState']);
Route::get('/countries',[App\Http\Controllers\CountryController::class, 'index']);

Route::get('/channels',[App\Http\Controllers\ChannelController::class, 'index']);
Route::get('/regionals',[App\Http\Controllers\RegionalController::class, 'index']);


Route::post('/create/budget',[App\Http\Controllers\BudgetController::class, 'create']);
Route::get('/budgets',[App\Http\Controllers\BudgetController::class, 'index']);
Route::post('/allocate/regional',[App\Http\Controllers\BudgetChannelRegionalController::class, 'create']);
Route::post('/update_budget/regional',[App\Http\Controllers\BudgetChannelRegionalController::class, 'updateBudget']);
Route::get('/budget_regional/{id}',[App\Http\Controllers\BudgetChannelRegionalController::class, 'index']);
Route::get('/search_budget/{id}',[App\Http\Controllers\BudgetChannelRegionalController::class, 'searchBudget']);
Route::get('/list/budget_type',[App\Http\Controllers\TestsController::class, 'index']);
Route::post('/allocate/territory',[App\Http\Controllers\BudgetTerritoryController::class, 'create']);

Route::post('/test',[App\Http\Controllers\TestsController::class, 'import']);


Route::post('/regionals_channels',[App\Http\Controllers\BudgetChannelRegionalController::class, 'budgetsRegionlasChannels']);

Route::get('/accumulated/budget/{id}',[App\Http\Controllers\BudgetChannelRegionalController::class, 'opcupationBudget']);

//distribucion x peso
Route::get('/weights/verticals/{id}',[App\Http\Controllers\VerticalController::class, 'index']);
Route::get('/verticals',[App\Http\Controllers\VerticalController::class, 'listVerticals']);
Route::post('/save/verticals',[App\Http\Controllers\VerticalController::class, 'saveVertical']);
Route::get('/weights/regionals/channels/{id}/{value}',[App\Http\Controllers\VerticalController::class, 'dealer']);
Route::get('/channel_verticals/{id}/{value}',[App\Http\Controllers\VerticalController::class, 'channelVerticals']);
Route::get('/update_vertical/{id}/{weight}',[App\Http\Controllers\VerticalController::class, 'updateWeightVertical']);
Route::get('/update_channel/{id}/{weight}',[App\Http\Controllers\VerticalController::class, 'updateWeightChannel']);
Route::get('/update_regional/{id}/{weight}',[App\Http\Controllers\VerticalController::class, 'updateWeightRegional']);

//configuración de pesos
Route::get('/channnel_vertical/{vertical_id}',[App\Http\Controllers\ChannelController::class, 'channels']);
Route::get('/regional_channel/vertical/{vertical_id}/{channel_id}',[App\Http\Controllers\RegionalController::class, 'regionals']);

