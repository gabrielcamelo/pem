<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileStoreRequest;
use App\Http\Requests\FileUpdateRequest;
use Illuminate\Support\Facades\Storage;

use App\File;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $files = File::orderBy('id', 'DESC')->paginate(7);
        return view('Admin.files.index', compact('files'));
    }

    public function create()
    {
        return view('Admin.files.create');
    }

    public function store(FileStoreRequest $request)
    {
        $file = File::create($request->all());

        //IMAGE 
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $file->fill(['image' => asset($path)])->save();
        }

        return redirect()->route('files.edit', $file->id)->with('info', 'File creado com sucesso');
    }

    public function show($id)
    {
        $file = File::find($id);
        return view('Admin.files.show', compact('file'));
    }

    public function edit($id)
    {
        $file = File::find($id);
        return view('Admin.files.edit', compact('file'));
    }

    public function update(FileUpdateRequest $request, $id)
    {
        $file = File::find($id);
        $file->fill($request->all())->save();

        //IMAGE
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $file->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('files.edit', $file->id)->with('info', 'File atualizado com sucesso');
    }

    public function destroy($id)
    {
        $file = File::find($id)->delete();
        return back()->with('info', 'File deletado');
    }
}
