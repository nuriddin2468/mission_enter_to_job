<?php

namespace App\Http\Controllers;

use App\Models\CellModel;
use App\Models\FileModel;
use App\Models\FolderModel;
use App\Models\LockerModel;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){

        return view('home', [
            'lockers' => LockerModel::count(),
            'cells' => CellModel::count(),
            'folders' => FolderModel::count(),
            'files' => FileModel::count()
        ]);
    }
}
