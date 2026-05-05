<?php

use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/', [ChecklistController::class, 'index']);
    Route::post('/checklists', [ChecklistController::class, 'store'])->name('checklists.post');
    Route::patch('/checklists/{checklist}', [ChecklistController::class, 'update'])->name('checklists.update');
    Route::get('/checklists/edit/{checklist}', [ChecklistController::class, 'edit'])->name('checklists.edit');
    Route::post('/checklists/{checklist}/items', [ItemController::class, 'store']);
    Route::patch('/checklists/{checklist}/items/{item}', [ItemController::class, 'update']);
});
