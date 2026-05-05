<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function store(Checklist $checklist, Request $request)
    {
        DB::transaction(function() use ($checklist, $request) {
            $item = new Item();
            $item->fill([
                'id' => $request->str('id'),
                'checklist_id' => $request->str('checklist_id'),
                'position' => $request->integer('position'),
            ]);
            $checklist->items()->save($item);
        });

        return to_route('checklists.edit', ['checklist' => $checklist->id]);
    }

    public function update(Checklist $checklist, Item $item)
    {
        dd($item);
    }
}
