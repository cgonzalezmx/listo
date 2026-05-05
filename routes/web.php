<?php

use App\Http\Controllers\ChecklistController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/', [ChecklistController::class, 'index']);
    Route::post('/checklists', [ChecklistController::class, 'store'])->name('checklists.post');
    Route::get('/checklists/edit/{checklist}', [ChecklistController::class, 'edit'])->name('checklists.edit');
});
