<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        //$this->middleware('auth');
        $this->post = $post;
    }

    public function index()
    {
        //$posts = Post::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)
        //    ->paginate(7);
        $posts = Post::orderBy('id', 'DESC')->paginate(8);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());
        $this->authorize('pass', $post);

        //IMAGE 
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //TAGS
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Post criado com sucesso');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);

        return view('admin.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post       = Post::find($id);
        //$this->authorize('pass', $post);

        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);

        $post->fill($request->all())->save();

        //IMAGE 
        if($request->file('image')){
            $path = Storage::disk('public')->put('image',  $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //TAGS
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Post atualizado com sucesso');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        //$this->authorize('pass', $post);
        $post = Post::find($id)->delete();

        return back()->with('info', 'Post deletado');
    }
}
