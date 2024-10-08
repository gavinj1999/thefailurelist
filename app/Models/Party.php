<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    public function members(){
        return $this->hasMany(Member::class, 'party_id', 'party_id');
    }


    protected $guarded = [];
}
