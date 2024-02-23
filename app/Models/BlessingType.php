<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlessingType extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'position'];

    // BlessingType has many UserFormBlessings
    public function userFormBlessings()
    {
        return $this->hasMany(UserFormBlessing::class);
    }
}
