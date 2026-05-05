<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\WithoutTimestamps;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['id', 'is_checked', 'checked_at', 'position', 'checklist_id']), WithoutTimestamps]
class Item extends Model
{
    use HasUlids;

    public function checklist(): BelongsTo
    {
        return $this->belongsTo(Checklist::class);
    }
}
