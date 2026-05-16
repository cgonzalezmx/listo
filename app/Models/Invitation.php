<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Invitation extends Model
{
    use HasUuids;

    #[Scope]
    public function isStillValid(Builder $query)
    {
        $query->where('is_valid', true)
            ->where('expires_at', '>', now());
    }
}
