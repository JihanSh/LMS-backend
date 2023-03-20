<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
            protected $fillable = [
        'fname',
        'lname',
        'email',
        'dateofbirth',
        'image',
        'section_id',
    ];
    public function attendance(){
        return $this->hasOne(attendance::class);
    }    
    public function section(){
        return $this->belongsTo(section::class);
    }
}
