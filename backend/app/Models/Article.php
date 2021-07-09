<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    //fillableの利用
    protected $fillable = [
        'title',
        'body',
    ];

    //リレーション
    public function user(): BelongsTo{
        return $this->belongsTo('App\Models\User');
    }
}
