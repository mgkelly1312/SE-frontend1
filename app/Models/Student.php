<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['id','person_id','student_number'];

    public function person(){
        return $this->belongsTo(Person::class);
    }
}
