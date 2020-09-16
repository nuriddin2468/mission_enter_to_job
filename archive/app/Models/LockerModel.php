<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LockerModel extends Model
{
    use HasFactory;

    public function cells(){
        return $this->hasMany(CellModel::class, 'locker_id');
    }
}
