<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    public function students(){
        return $this->belongsToMany(Student::class);
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email'
    ];
}
