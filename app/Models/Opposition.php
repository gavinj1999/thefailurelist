<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Opposition extends Model
{
    use HasFactory;
    public function member(){
        return $this->hasOne(Member::class,'member_id','member_id');
    }
    protected $guarded = [];
}
