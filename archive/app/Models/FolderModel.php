<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderModel extends Model
{
    use HasFactory;

    public function cell(){
        return $this->belongsTo('App\Models\CellModel');
    }

    public function files(){
        return $this->hasMany('App\Models\FileModel');
    }
}
