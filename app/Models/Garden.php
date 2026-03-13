<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "address",
        "user_id",
    ];

    public function plants()
    {
        return $this->hasMany(Plant::class, "garden_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
