<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChecklistController extends Controller
{
    public function index(Request $request)
    {
        $checklists = $request->user()->checklists;

        return inertia('Home', ['checklists' => $checklists]);
    }

    public function edit(Checklist $checklist)
    {
        $checklist->load('items');

        return inertia('checklists/EditChecklist', [
            'checklist' => $checklist,
        ]);
    }

    public function store(Request $request)
    {
        $checklist = new Checklist();
        DB::transaction(function() use ($checklist, $request) {
            $checklist->fill(['owner_id' => $request->user()->id]);
            $checklist->save();
        });

        return to_route('checklists.edit', ['checklist' => $checklist->id]);
    }

    public function update(Checklist $checklist, Request $request)
    {
        DB::transaction(function() use ($checklist, $request) {
            $checklist->fill($request->input());
            $checklist->save();
        });

        return to_route('checklists.edit', ['checklist' => $checklist->id]);
    }
}
