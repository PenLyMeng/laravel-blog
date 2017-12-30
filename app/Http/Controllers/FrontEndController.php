<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $settings = Setting::first();
        $categories = Category::take(4)->get();
        $first_post = Post::orderBy('created_at', 'desc')->first();
        $second_post = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $web_development = Category::find(2);
        $android_development = Category::find(3);
        $ios_development = Category::find(4);


        return view('index')
            ->with('settings', $settings)
            ->with('categories', $categories)
            ->with('first_post', $first_post)
            ->with('second_post', $second_post)
            ->with('third_post', $third_post)
            ->with('web_development', $web_development)
            ->with('android_development', $android_development)
            ->with('ios_development', $ios_development);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
    }


    public function singlePost($slug)
    {
        //


        $settings = Setting::first();
        $post = Post::where('slug', $slug)->first();
        $categories = Category::take(4)->get();

        $next_post = Post::find(Post::where('id', '>', $post->id)->min('id'));
        $previous_post = Post::find(Post::where('id', '<', $post->id)->max('id'));

        $tags = Tag::all();

        return view('single')->with('post', $post)
            ->with('settings', $settings)
            ->with('title', $post->title)
            ->with('tags', $tags)
            ->with('categories', $categories)
            ->with('next_post', $next_post)
            ->with('previous_post', $previous_post);

    }

    public function category($id)
    {
        //


        $settings = Setting::first();
        $category = Category::find($id);
        $categories = Category::take(4)->get();



        return view('category')
            ->with('settings', $settings)
            ->with('title', $category->name)
            ->with('category', $category)
            ->with('categories', $categories);


    }

    public function tag($id)
    {
        //


        $settings = Setting::first();
        $tag = Tag::find($id);
        $categories = Category::take(4)->get();



        return view('tag')
            ->with('settings', $settings)
            ->with('title', $tag->tag)
            ->with('tag', $tag)
            ->with('categories', $categories);


    }

}
