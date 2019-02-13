<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(7);
        return view('Admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('Admin.tags.create');
    }

    public function store(TagUpdateRequest $request)
    {
        $tag = Tag::create($request->all());
        return redirect()->route('tags.edit', $tag->id)->with('info', 'Etiqueta creada com sucesso');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('Admin.tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('Admin.tags.edit', compact('tag'));
    }

    public function update(TagUpdateRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->fill($request->all())->save();
        return redirect()->route('tags.edit', $tag->id)->with('info', 'Etiqueta atualizada com sucesso');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id)->delete();
        return back()->with('info', 'Etiqueta deletada');
    }
}
