<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function goods(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'goods')->withTimestamps();
    }

    public function isGoodedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->goods->where('id', $user->id)->count()
            : false;
    }

    public function getCountGoodsAttribute(): int
    {
        return $this->goods->count();
    }
}
