<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function constituency(){
        return $this->belongsTo(Constituency::class,'constituency_id', 'constituency_id');
    }
    public function opposition(){
        return $this->belongsTo(Opposition::class,'member_id','member_id');
    }

    public function government(){
        return $this->belongsTo(Government::class,'member_id','member_id');
    }

    public function election(){
        return $this->hasOne(Election::class,'member_id','member_id');
    }
    public function party(){
        return $this->belongsTo(Party::class, 'party_id', 'party_id');
    }
    protected $guarded = [];
}

