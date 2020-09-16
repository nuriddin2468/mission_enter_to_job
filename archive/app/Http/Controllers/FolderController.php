<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFolderRequest;
use App\Models\CellModel;
use App\Models\FolderModel;
use App\Models\LockerModel;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = FolderModel::all();

        return view('folder/index', [
            'folders' => $folders
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
        return view('folder/create', [
            'lockers' => $lockers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $folder = new FolderModel();
        $folder->title = $request->input('title');
        $folder->cell_id = $request->input('cell_id');
        $folder->save();
        return redirect()->route('folders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $folder = FolderModel::findOrFail($id);
        return view('folder/show', [
            'folder' => $folder,
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
        $folder = FolderModel::findOrFail($id);
        $lockers = LockerModel::all();
        $cells = CellModel::all();
        return view('folder/edit', [
            'folder' => $folder,
            'lockers' => $lockers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFolderRequest $request, $id)
    {
        $folder = FolderModel::findOrFail($id);
        $folder->title = $request->input('title');
        $folder->cell_id = $request->input('cell_id');
        $folder->save();
        return redirect()->route('folders.show', $folder->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FolderModel::destroy($id);
        return redirect()->route('folders.index');
    }

    // Для поиска
    public function search(Request $req)
    {
        $stype = $req->input('stype');
        $sval = $req->input('sval');
        $data = null;
        if($stype == '1'){
            $data = FolderModel::find($sval);
            if($data){
                return redirect()->route('folders.show', $data->id);
            }else{
                return redirect()->route('folders.index');
            }
        }else{
            $data = FolderModel::where('title', 'LIKE' , '%'.$sval.'%')->get();
        }
        return view('locker/index', [
            'folders' => $data
        ]);
    }
}
