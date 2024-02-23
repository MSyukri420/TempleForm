<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFormBlessing extends Model
{
    use HasFactory;

    protected $fillable = ['user_form_id', 'blessing_type_id', 'answer'];

    // UserFormBlessing belongs to a UserForm
    public function userForm()
    {
        return $this->belongsTo(UserForm::class);
    }

    // UserFormBlessing belongs to a BlessingType
    public function blessingType()
    {
        return $this->belongsTo(BlessingType::class);
    }
}
