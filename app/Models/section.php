<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
        protected $fillable = [
        'sectionname',
        'grade_id',
    ];
        public function students(){
        return $this->hasMany(student::class);
}
        public function grade(){
        return $this->BelongsTo(grade::class);
    }
        public function attendance(){
        return $this->hasOne(attendance::class);
    }
}
