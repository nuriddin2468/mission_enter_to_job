<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellModel extends Model
{
    use HasFactory;

    public function locker(){
        return $this->belongsTo(LockerModel::class, 'locker_id');
    }

    public function folders(){
        return $this->hasMany(FolderModel::class, 'cell_id');
    }
}
