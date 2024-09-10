<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    public function member(){
        return $this->belongsTo(Member::class, 'member_id', 'member_id');
    }

    public function party(){
        return $this->belongsTo(Party::class,'party_id', 'party_id');
    }
    use HasFactory;
}
