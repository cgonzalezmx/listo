<?php

use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PublicRegistration;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/', [ChecklistController::class, 'index']);
    Route::post('/checklists', [ChecklistController::class, 'store'])->name('checklists.post');
    Route::patch('/checklists/{checklist}', [ChecklistController::class, 'update'])->name('checklists.update');
    Route::get('/checklists/edit/{checklist}', [ChecklistController::class, 'edit'])->name('checklists.edit');
    Route::post('/checklists/{checklist}/items', [ItemController::class, 'store']);
    Route::patch('/items/{item}', [ItemController::class, 'update']);
    Route::get('/invite', [UserController::class, 'invite']);
});

Route::middleware([PublicRegistration::class])->group(function() {
    Route::get('/register',[RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});
