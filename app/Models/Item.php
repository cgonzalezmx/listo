<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['is_checked', 'checked_at', 'position'])]
class Item extends Model
{
    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
}
