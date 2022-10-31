<?php

use App\Http\Controllers\DashController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\SparePartProductionController;
use App\Models\SparePart;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/', [DashController::class, "index"])->name('dashboard');
  /* 
      sparepart routes
     */
  Route::get("/sparepart", [SparePartController::class, "index"])->name("sparepart");
  Route::post("/sparepart", [SparePartController::class, "store"])->name("sparepart_store");
  Route::get("/sparepart/create", [SparePartController::class, "create"])->name("sparepart_create");
  Route::put("/sparepart/{sparepart}", [SparePartController::class, "update"])->name("sparepart_update");
  Route::get("/sparepart/{sparepart}", [SparePartController::class, "edit"])->name("sparepart_edit");
  Route::delete("/sparepart/{sparepart}", [SparePartController::class, "destroy"])->name("sparepart_destroy");
  /* 
      production sparepart route
     */
  Route::post("/sparepart/generate/{sparepart}", [SparePartController::class, "generate"])->name("sparepart_generate");
  Route::get("/sparepart/production/{sparepart}", [SparePartProductionController::class, "index"])->name("sprt_production");
  Route::delete("/sparepart/production/{sparepartproduction}", [SparePartProductionController::class, "destroy"])->name("sprt_production_delete");
});
