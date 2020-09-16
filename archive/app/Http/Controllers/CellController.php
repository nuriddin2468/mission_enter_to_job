<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCellRequest;
use App\Http\Requests\CreateLockerRequest;
use App\Models\CellModel;
use App\Models\LockerModel;
use Illuminate\Http\Request;

class CellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cells = CellModel::all();

        return view('cell/index', [
            'cells' => $cells
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lockers = LockerModel::all();
        return view('cell/create', [
            'lockers' => $lockers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCellRequest $request)
    {
        $cell = new CellModel();
        $cell->title = $request->input('title');
        $cell->locker_id = $request->input('locker_id');
        $cell->save();
        return redirect()->route('cells.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cell = CellModel::findOrFail($id);
        return view('cell/show', [
            'cell' => $cell,
            'folders' => $cell->folders->all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cell = CellModel::findOrFail($id);
        $lockers = LockerModel::all();
        return view('cell/edit', [
            'cell' => $cell,
            'lockers' => $lockers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateCellRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCellRequest $request, $id)
    {
        $cell = CellModel::findOrFail($id);
        $cell->title = $request->title;
        $cell->locker_id = $request->locker_id;
        $cell->save();
        return redirect()->route('cells.show', $cell->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CellModel::destroy($id);
        return redirect()->route('cells.index');
    }


    // Для Ajax
    public function cellsByLocker($id){
        $locker = LockerModel::findOrFail($id);
        $cells = $locker->cells->all();
        return response()->json($cells);
    }


    public function search(Request $req)
    {
        $stype = $req->input('stype');
        $sval = $req->input('sval');
        $data = null;
        if($stype == '1'){
            $data = CellModel::find($sval);
            if($data){
                return redirect()->route('cells.show', $data->id);
            }else{
                return redirect()->route('cells.index');
            }
        }else{
            $data = CellModel::where('title', 'LIKE' , '%'.$sval.'%')->get();
        }
        return view('cell/index', [
            'cells' => $data
        ]);
    }
}
