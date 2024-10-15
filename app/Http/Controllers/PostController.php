<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::query();

        $posts = (clone $query)->latest()->paginate();
        $active_posts = Post::where('active', 1)->count();
        $inactive_posts = Post::where('active', 0)->count();

        $lang = $request->lang ?? 'en';

        return view('pages.posts.index')->with([
            'postList' => $posts,
            'lang' => $lang,
            'active_posts' => $active_posts,
            'inactive_posts' => $inactive_posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $getSize = Storage::disk('premium')->size('books/v5cH4UolXivikoo4PECyzrXI9uSvmmEFZsUzD9bj.jpg');
        // $type = Storage::disk('premium')->mimeType('books/v5cH4UolXivikoo4PECyzrXI9uSvmmEFZsUzD9bj.jpg');
        // $size = ($getSize / 1024) / 1024 . ' MB';
        // dd($type);
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        // if ($request->hasFile('thumbnail')) {
        //     $file = $request->file('thumbnail')->store('books', 'premium');
        //     dd($file);
        // }
        // form validation
        $data = $request->validated();
        $titles = $request->title;
        unset($data['title']);

        foreach($titles as $key => $title) {
            $data['title_' . $key] = $title;
        }

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('posts', ['disk' => 'public']);
        }
        // input customization
        $data['slug'] = str($data['slug'])->slug();

        // Data save to database
        Post::create($data);

        // redirect to targeted page
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
