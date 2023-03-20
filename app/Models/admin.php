<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
        protected $fillable = [
        'fname',
        'lname',
        'username',
        'password',
    ];

        public function attendance(){
        return $this->hasMany(attendance::class);
    }
}
