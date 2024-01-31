<?php

namespace App\Models;

use App\Models\Traits\HasContentAsParagraphs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasContentAsParagraphs;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'content',
    ];

    /**
     * @return BelongsTo
     */
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
