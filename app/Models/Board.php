<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    public function boardGroup(): BelongsTo
    {
        return $this->belongsTo(BoardGroup::class);
    }

    public function group(): BelongsTo
    {
        return $this->boardGroup();
    }

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    public function getUrlAttribute(): string
    {
        return route('board.index', [
            'board' => $this,
        ]);
    }

}
