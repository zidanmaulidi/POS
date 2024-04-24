<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class UserModel extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'm_user';
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(levelModel::class, 'level_id', 'level_id');
    }
}
