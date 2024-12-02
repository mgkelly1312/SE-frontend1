<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['id','person_id','barangay_id','street','city'];

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function barangay(){
        return $this->belongsTo(Barangay::class);
    }
}
