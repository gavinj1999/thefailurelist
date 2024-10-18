<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ConstituencyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GovernmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OppositionController;
use App\Http\Controllers\ElectionController;
Use App\Http\Controllers\PartyController;
Use App\Http\Controllers\PromiseController;

use App\Models\Opposition;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/constituencies', [ConstituencyController::class, 'index'])->name('constituencies.index');
Route::get('/constituency/{slug}', [ConstituencyController::class, 'show'])->name('constituency.show');

Route::get('/members',[MemberController::class, 'index'])->name('members.index');
Route::get('/member/{slug}',[MemberController::class, 'show'])->name('member.show');

Route::get('/parties',[PartyController::class, 'index'])->name('parties.index');
Route::get('/party/{slug}',[PartyController::class, 'show'])->name('party.show');

Route::get('/departments',[DepartmentController::class, 'index'])->name('departments.index');
Route::get('/department/{slug}',[DepartmentController::class, 'show'])->name('department.show');

Route::get('/government', [GovernmentController::class, 'index']);
Route::get('/government/{slug}',[GovernmentController::class, 'show']);

Route::get('/opposition', [OppositionController::class, 'index']);
Route::get('/opposition /{slug}',[OppositionController::class, 'show']);

Route::get('/promises', [PromiseController::class, 'index']);
Route::get('/promise/{slug}',[PromiseController::class, 'show']);

Route::get('/elections', [ElectionController::class, 'index']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
