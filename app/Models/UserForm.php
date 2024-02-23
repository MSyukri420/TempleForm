<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'surname', 'givenName','address','email','contact','amount'];

    // UserForm belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // UserForm has many UserFormBlessings
    public function userFormBlessings()
    {
        return $this->hasMany(UserFormBlessing::class);
    }
}
