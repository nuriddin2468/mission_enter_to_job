<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    use HasFactory;

    public function folder(){
        return $this->belongsTo('App\Models\FolderModel', 'folder_id');
    }
}
