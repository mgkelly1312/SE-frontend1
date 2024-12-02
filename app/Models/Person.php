<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['id','first_name','middle_name','last_name','phone_no','email'];

    public function address(){
        return $this->hasMany(Address::class);  
    }
}
