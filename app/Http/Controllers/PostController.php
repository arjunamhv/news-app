<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->post->get();
        return view('news.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::all();
        $category = Category::all();
        $user = User::all();
        return view('news.formadd', compact('post', 'category', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validate = $request->validated();
        $data = new Post();
        $data->title = $validate['txttitle'];
        $data->user_id = $validate['txtuser'];
        $data->category_id = $validate['txtcategory'];
        $data->slug = $validate['txtslug'];
        $data->content = $validate['txtcontent'];
        $data->save();

        return redirect()->route('posts.index')->with('success', 'Post create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        $data = $post->find($post->id);
        return view('news.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $data = $post->find($post->id);
        $category = Category::all();
        $user = User::all();
        return view('news.formedit', compact('data', 'category', 'user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, post $post)
    {
        $validate = $request->validated();
        $data = $post->find($post->id);
        $data->title = $validate['txttitle'];
        $data->user_id = $validate['txtuser'];
        $data->category_id = $validate['txtcategory'];
        $data->slug = $validate['txtslug'];
        $data->content = $validate['txtcontent'];
        $data->save();

        return redirect()->route('posts.index')->with('success', 'Post update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        $data = $post->find($post->id);
        $data->delete();
        return redirect()->route('posts.index')->with('success', 'Todo delete successfully.');
    }
}
