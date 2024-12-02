<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['id','person_id','salary'];

    public function person(){
        return $this->belongsTo(Person::class);
    }
}
