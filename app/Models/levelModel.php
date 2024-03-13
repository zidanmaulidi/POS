<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class levelModel extends Model
{
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    public function user(): BelongsTo
    {
        return $this->belongsTo(userModel::class);
    }
}
