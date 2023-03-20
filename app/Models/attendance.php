<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
        protected $fillable = [
        'description',
        'admin_id',
        'student_id',
        'section_id',
    ];

        public function admin(){
        return $this->BelongsTo(admin::class);
    }
        public function student(){
        return $this->BelongsTo(student::class);
    }
        public function section(){
        return $this->belongsTo(section::class);
    }
}
