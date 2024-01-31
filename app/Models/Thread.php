<?php

namespace App\Models;

use App\Models\Traits\HasContentAsParagraphs;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Thread extends Model
{
    use HasContentAsParagraphs;
    use HasFactory;
    use HasSlug;
    use SoftDeletes;

    protected string $generateSlugsFrom = 'title';

    /**
     * @return BelongsTo
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    protected $fillable = [
        'title',
        'content',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('board.thread.view', [
            'board'     => $this->board,
            'thread'    => $this,
        ]);
    }

}
