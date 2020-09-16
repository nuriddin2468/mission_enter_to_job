<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLockerRequest;
use App\Models\LockerModel;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lockers = LockerModel::all();

        return view('locker/index', [
            'lockers' => $lockers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locker/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLockerRequest $request)
    {
        $locker = new LockerModel();
        $locker->title = $request->input('title');
        $locker->save();
        return redirect()->route('lockers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locker = LockerModel::findOrFail($id);
        return view('locker/show', [
            'locker' => $locker,
            'cells' => $locker->cells->all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locker = LockerModel::findOrFail($id);
        return view('locker/edit', [
            'locker' => $locker,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateLockerRequest $request, $id)
    {
        $locker = LockerModel::findOrFail($id);
        $locker->title = $request->title;
        $locker->save();
        return redirect()->route('lockers.show', $locker->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LockerModel::destroy($id);
        return redirect()->route('lockers.index');
    }


    // Для поиска
    public function search(Request $req)
    {
        $stype = $req->input('stype');
        $sval = $req->input('sval');
        $data = null;
        if($stype == '1'){
            $data = LockerModel::find($sval);
            if($data){
                return redirect()->route('lockers.show', $data->id);
            }else{
                return redirect()->route('lockers.index');
            }
        }else{
            $data = LockerModel::where('title', 'LIKE' , '%'.$sval.'%')->get();
        }
        return view('locker/index', [
            'lockers' => $data
        ]);
    }

}
