<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilesStoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use App\File;
use App\Lids;
use App\Mail\mailLeads;

class FilesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index($slug)
    {
    	$file = File::where('slug', $slug)->first();
        return view('Web.file', compact('file'));
    }

    public function create()
    {
        // return view('Web.file.index');
    }

    public function store(FilesStoreRequest $request)
    {
        $file = Lids::create($request->all());
        $image = $request->get('file');
        Mail::to('gabriellcamello@hotmail.com')->send(new mailLeads());
        return view('Web.msg', compact('image'))->with('info', 'E-mail enviado');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(FileUpdateRequest $request, $id)
    {
		//
    }

    public function destroy($id)
    {
        //
    }

}
