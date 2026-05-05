<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $item = new Item();

        DB::transaction(function() use ($item, $request) {
            $item->fill([
                'checklist_id' => $request->str('checklist_id'),
                'position' => $request->integer('position'),
            ]);
        });

        $item->save();
    }
}
