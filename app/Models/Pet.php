<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
//    use HasFactory;

    protected $fillable = [
        'name',
        'age_month',
        'species',
        'sex',
        'breed',
        'color',
        'sterilization',
        'vaccination',
        'city',
        'phone_number',
        'story',
        'peculiarities',
        'wishes',
        'photo',
        'patrons',
        'adopted',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
