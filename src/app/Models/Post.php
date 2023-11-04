<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
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

    public function getTimeAgoAttribute()
    {
        $postDate = $this->created_at;
        $now = Carbon::now();
        $diff = $postDate->diff($now);

        if ($diff->y > 0) {
            return $diff->y . "年前";
        } elseif ($diff->m > 0) {
            return $diff->m . "ヶ月前";
        } elseif ($diff->d > 0) {
            return $diff->d . "日前";
        } elseif ($diff->h > 0) {
            return $diff->h . "時間前";
        } elseif ($diff->i > 0) {
            return $diff->i . "分前";
        } else {
            return "たった今";
        }
    }
}
