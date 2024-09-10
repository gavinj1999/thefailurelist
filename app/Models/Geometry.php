<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geometry extends Model
{
    use HasFactory;

    public function constituency(){
        return $this->belongsTo(Constituency::class,'constituency_id', 'constituency_id');
    }

    protected $guarded = [];
}
