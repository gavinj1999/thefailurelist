<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    use HasFactory;

    function member(){
        return $this->belongsTo(Member::class, 'currentRepresentationId', 'member_id');
    }

    function geometry(){
        return $this->hasOne(Geometry::class,'constituency_id','constituency_id');
    }
    protected $guarded = [];
}
