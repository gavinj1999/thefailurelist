<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    public function member(){
        return $this->hasOne(Member::class, 'member_id', 'member_id');
    }

    public function party(){
        return $this->belongsTo(Party::class, 'party_id',' party_id');
    }
    protected $guarded = [];
}
