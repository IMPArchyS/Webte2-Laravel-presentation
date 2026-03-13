<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "latin_name",
        "planted_at",
        "garden_id",
    ];

    public function garden()
    {
        return $this->belongsTo(Garden::class, "garden_id");
    }
}
