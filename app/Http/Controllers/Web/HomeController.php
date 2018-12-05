<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Tag;
use App\Post;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    // ============================================================

    public function index()
    {
    	$posts = Post::orderBy('id', 'DESC')
                        ->where('status', 'PUBLISHED')
                        ->where('publish_in', '<', \Carbon\Carbon::now())
                        /*->whereTime('publish_in', '<', date('H:i:s', strtotime(now())))*/
                        ->paginate(4);
        return view('Web.home', compact('posts'));
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->pluck('id')->first();

        $posts = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function tag($slug){ 
        $posts = Post::whereHas('tags', function($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function post($slug){
    	$post = Post::where('slug', $slug)->first();
        $category = Post::where('slug', $slug)->pluck('category_id')->first();

        $relacionados = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(6);

    	return view('web.post', compact('post', 'relacionados'));
    }

    
}
