<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags = Tag::all();
        return view('admin.posts.index', compact('posts','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'content'=>'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags'=> 'exists:tags,id'
        ]);

        $form_data = $request->all();

        $slugTmp = Str::slug($form_data['title']);
 
        $count = 1;
        while (Post::where('slug', $slugTmp)->first()){
           $slugTmp = Str::slug($form_data['title'])."-".$count;
           $count ++; 
        };

        $form_data['slug'] = $slugTmp;

        $new_post = Post::create($form_data);
        
        $new_post->fill($form_data);
        $new_post->save();
        $new_post->tags()->sync($form_data['tags']);
        return redirect()->route('admin.posts.index', $new_post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Tag $tag)
    {
        return view('admin.posts.show', compact('post', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags'=> 'exists:tags,id'
        ]);

        $data = $request->all();

        if ($post->title == $data['title']) {
            $tempSlug = $post->slug;
        } else {
            $tempSlug = Str::of($data['title'])->slug("-");
            $count = 1;
            while (Post::where('slug', $tempSlug)->where('id', '!=', $post->id)->first()) {
                $tempSlug = Str::of($data['title'])->slug("-") . '-' . $count;
                $count ++;
            }
        }

        $data['slug'] = $tempSlug;

        $post->update($data);
        $post->tags()->sync(isset($data['tags'])?$data['tags']:[]);


        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
