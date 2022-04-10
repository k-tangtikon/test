<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select()
    {
        $data['posts'] = Post::orderBy('id', 'desc')->paginate(5);

        return view('profile/detail/post_test', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request)
    {

        $post   =   Post::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'title' => $request->title,
                'des' => $request->des,

            ]
        );

        return response()->json(['success' => true]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $where = array('id' => $request->id);
        $post  = Post::where($where)->first();

        return response()->json($post);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $post = Post::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
