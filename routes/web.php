<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\StatistikController::class, 'index']);
Route::get('/incidenttype', [App\Http\Controllers\IncidenttypeController::class, 'index']);
Route::get('/subincidenttype', [App\Http\Controllers\SubincidenttypeController::class, 'index']);
Route::get('/socialconflict', [App\Http\Controllers\SocialconflictController::class, 'index']);
Route::get('/weapontype', [App\Http\Controllers\WeapontypeController::class, 'index']);
Route::get('/actor', [App\Http\Controllers\ActorController::class, 'index']);
// Route::get('/actortype', [App\Http\Controllers\ActortypeController::class, 'index']);
Route::get('/target', [App\Http\Controllers\TargetController::class, 'index']);
Route::get('/targettype', [App\Http\Controllers\TargettypeController::class, 'index']);
Route::get('/tanggal', [App\Http\Controllers\TanggalController::class, 'index']);
Route::get('/subactortype', [App\Http\Controllers\SubactortypeController::class, 'index']);
Route::get('/explosivetype', [App\Http\Controllers\ExplosivetypeController::class, 'index']);
Route::get('/violence', [App\Http\Controllers\ViolenceController::class, 'index']);
Route::get('/articlelink', [App\Http\Controllers\ArticlelinkController::class, 'index']);
Route::get('/businessentity', [App\Http\Controllers\BusinessentityController::class, 'index']);
Route::get('/civiliantype', [App\Http\Controllers\CiviliantypeController::class, 'index']);
Route::get('/community', [App\Http\Controllers\ComunitygroupController::class, 'index']);
Route::get('/goverment', [App\Http\Controllers\GovermentController::class, 'index']);
Route::get('/military', [App\Http\Controllers\MilitarytypeController::class, 'index']);
Route::get('/police', [App\Http\Controllers\PolicetypeController::class, 'index']);
Route::get('/separatist', [App\Http\Controllers\SeparatistgroupController::class, 'index']);
Route::get('/terorist', [App\Http\Controllers\TeroristgroupController::class, 'index']);
Route::get('/vested', [App\Http\Controllers\VestedController::class, 'index']);
Route::get('/time', [App\Http\Controllers\TimeController::class, 'index']);
Route::get('/numberprotest', [App\Http\Controllers\NumberprotestController::class, 'index']);
Route::get('/issue', [App\Http\Controllers\IssueController::class, 'index']);
Route::get('/tanggalstart', [App\Http\Controllers\TanggalstartController::class, 'index']);
Route::get('/timeend', [App\Http\Controllers\TimeendController::class, 'index']);
Route::get('/stance', [App\Http\Controllers\StanceController::class, 'index']);
Route::get('/activistactor', [App\Http\Controllers\ActivistactorController::class, 'index']);
Route::get('/actorage', [App\Http\Controllers\ActorageController::class, 'index']);
Route::get('/actorgender', [App\Http\Controllers\ActorgenderController::class, 'index']);
Route::get('/centralgovactor', [App\Http\Controllers\CentralgovactorController::class, 'index']);
Route::get('/firearm', [App\Http\Controllers\FirearmtypeController::class, 'index']);
Route::get('/foreignactor', [App\Http\Controllers\ForeignactorController::class, 'index']);
Route::get('/groupnumber', [App\Http\Controllers\GroupnumberController::class, 'index']);
Route::get('/grouporgan', [App\Http\Controllers\GrouporganController::class, 'index']);
Route::get('/intelactor', [App\Http\Controllers\IntelactorController::class, 'index']);
Route::get('/localgovactor', [App\Http\Controllers\LocalgovactorController::class, 'index']);
Route::get('/promotor', [App\Http\Controllers\PromotorController::class, 'index']);
Route::get('/reggovactor', [App\Http\Controllers\ReggovactorController::class, 'index']);
Route::get('/targetactivist', [App\Http\Controllers\TargetactivistController::class, 'index']);
Route::get('/targetage', [App\Http\Controllers\TargetageController::class, 'index']);
Route::get('/targetbusiness', [App\Http\Controllers\TargetbusinessController::class, 'index']);
Route::get('/targetcentralgov', [App\Http\Controllers\TargetcentralgovController::class, 'index']);
Route::get('/targetcommunity', [App\Http\Controllers\TargetcommunityController::class, 'index']);
Route::get('/targetforeigngov', [App\Http\Controllers\TargetforeigngovController::class, 'index']);
Route::get('/targetgender', [App\Http\Controllers\TargetgenderController::class, 'index']);
Route::get('/targetgov', [App\Http\Controllers\TargetgovController::class, 'index']);
Route::get('/targetintel', [App\Http\Controllers\TargetintelController::class, 'index']);
Route::get('/targetlocalgov', [App\Http\Controllers\TargetlocalgovController::class, 'index']);
Route::get('/targetmil', [App\Http\Controllers\TargetmilController::class, 'index']);
Route::get('/targetpolice', [App\Http\Controllers\TargetpoliceController::class, 'index']);
Route::get('/targetreggov', [App\Http\Controllers\TargetreggovController::class, 'index']);
Route::get('/targetseparatist', [App\Http\Controllers\TargetseparatistController::class, 'index']);
Route::get('/targetterorist', [App\Http\Controllers\TargetteroristController::class, 'index']);
Route::get('/targettypefacility', [App\Http\Controllers\TargettypefacilityController::class, 'index']);
