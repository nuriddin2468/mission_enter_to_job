<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLockerRequest;
use App\Models\LockerModel;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    public function index(){
        $lockers = LockerModel::all();
        return view('locker/index', [
            'lockers' => $lockers
        ]);
    }

    public function create_form(){
        return view('locker/create');
    }

    public function create_req(CreateLockerRequest $request){
        $locker = new LockerModel();
        $locker->title = $request->input('title');
        $locker->save();
        return redirect()->route('lockers');
    }
}
