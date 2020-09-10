<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CellModel extends Model
{
    use HasFactory;

    public function locker(){
        return $this->belongsTo('App\Models\LockerModel');
    }

    public function folders(){
        return $this->hasMany('App\Models\FolderModel');
    }
}
