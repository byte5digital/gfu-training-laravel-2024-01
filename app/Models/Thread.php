<?php

namespace App\Models;

use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

class Thread extends Model
{
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
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return Collection
     */
    function getContentAsParagraphs(): Collection
    {
        return collect(preg_split('#[\r\n]+#', $this->content));
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
