<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('admin.posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());

        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = $this->generateSlugFromTitle($post->title);
        $post->save();

        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getValidationRules());

        $data = $request->all();

        $post = Post::findOrFail($id);
        $post->fill($data);
        $post->slug = $this->generateSlugFromTitle($post->title);
        $post->save();

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_updated = Post::findOrFail($id);
        $post_updated->delete();

        return redirect()->route('admin.posts.index', compact('post_updated'));
    }

    private function generateSlugFromTitle($title)
    {
        //generate base slug
        //while slug already is in the db
        //add a progressive number until it is not in the db 
        //then save the slug in the model

        $base_slug = Str::slug($title, '-');
        $slug = $base_slug;
        $count = 1;
        $post_found = Post::where('slug', '=', $slug)->first();
        while ($post_found) {
            $slug = $base_slug . '-' . $count;
            $post_found = Post::where('slug', '=', $slug)->first();
            $count++;
        }
        return $slug;
    }

    private function getValidationRules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:30000'
        ];
    }
}
