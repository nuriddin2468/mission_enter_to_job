<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use App\Models\FileModel;
use App\Models\FolderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = FileModel::all();
        return view('file/index', [
            'files' => $files
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('file/create', [
            'folder_id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, CreateFileRequest $request)
    {
        FolderModel::findOrFail($id);
        $file = new FileModel();
        $request->file('path')->storeAs('public/files/'.$id.'/', $request->path->getClientOriginalName());
        $file->title = $request->title;
        $file->description = $request->description;
        $file->path = 'public/files/'.$id.'/'.$request->path->getClientOriginalName();
        $file->folder_id = $id;
        $file->save();
        return redirect()->route('folders.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = FileModel::findOrFail($id);
        $doc = Storage::url($file->path);
        return view('file/show', [
            'file' => $file,
            'doc' => $doc
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
        $file = FileModel::findOrFail($id);
        $doc = Storage::url($file->path);
        return view('file/edit', [
            'file' => $file,
            'doc' => $doc
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateFileRequest $request, $id)
    {
        $file = FileModel::findOrFail($id);
        $folder_id = $file->folder_id;
        $request->file('path')->storeAs('public/files/'.$id.'/', $request->path->getClientOriginalName());
        $file->title = $request->title;
        $file->description = $request->description;
        $file->path = 'public/files/'.$id.'/'.$request->path->getClientOriginalName();
        $file->save();
        return redirect()->route('folders.show', $folder_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = FileModel::destroy($id);
        return redirect()->route('folders.index');
    }

    public function search(Request $req)
    {
        $stype = $req->input('stype');
        $sval = $req->input('sval');
        $data = null;
        if($stype == '1'){
            $data = FileModel::find($sval);
            if($data){
                return redirect()->route('files.show', $data->id);
            }else{
                return redirect()->route('folders.files.index', 'all');
            }
        }else{
            $data = FileModel::where('title', 'LIKE' , '%'.$sval.'%')->get();
        }
        return view('file/index', [
            'files' => $data
        ]);
    }
}
