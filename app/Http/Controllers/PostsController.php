<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = Category::all();
        $tags = Tag::all();


        if ($categories->count() == 0 || $tags->count() == 0) {
            Session::flash('info', 'You must have some categories and tags before attempting to create some posts.');
            return redirect()->back();
        }

        return view("admin.posts.create")->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'post_content' => 'required',
            'category_id' => 'required',

        ]);


        $featured = $request->featured;

        $featured_new_name = time() . $featured->getClientOriginalName();

        $featured->move('upload/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'content' => $request->post_content,
            'featured' => 'upload/posts/' . $featured_new_name,
            'tags' => $request->tags,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id(),
        ]);


        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();


        return view('admin.posts.edit')->with('post', $post)
            ->with('categories', $categories)
            ->with('tags', $tags);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'post_content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',


        ]);

        $post = Post::find($id);


        if ($request->hasFile('featured')) {
            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('upload/posts', $featured_new_name);
            $post->featured = 'upload/posts/' . $featured_new_name;


        }

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->content = $request->post_content;
        $post->tags()->sync($request->tags);
        $post->save();



        Session::flash('success', 'Post updated successfully.');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();
        Session::flash('success', 'Post deleted permanantly.');

        return redirect()->back();
    }

    public function trash($id)
    {
        //

        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'Post trashed successfully.');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post restored back.');

        return redirect()->back();

    }

    public function trashed()
    {
        //

        $posts = Post::onlyTrashed()->get();


        return view('admin.posts.trashed', ['posts' => $posts]);
    }


}
