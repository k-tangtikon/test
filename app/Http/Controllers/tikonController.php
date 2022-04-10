<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Models\Profile;


class tikonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //select===========================================================================
    public function select()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);
        $data2['posts'] = Post::orderBy('id', 'desc')->paginate(100);
        return view('profile/1profile', $data, $data2);
    }

    public function select_about()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/detail/about', $data);
    }
    public function select_edu()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/detail/edu', $data);
    }
    public function select_work()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/detail/work', $data);
    }
    public function select_skills()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/detail/skills', $data);
    }

    public function select_contact()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/detail/contact', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //insert===========================================================================    
    public function insert(Request $request)
    {

        $profile   =   Profile::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name_surname' => $request->name_surname,
            ]
        );

        return response()->json(['success' => true]);
    }
    public function insert_about(Request $request)
    {

        $profile   =   Profile::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'about' => $request->about,
                'link' => $request->link,
            ]
        );

        return response()->json(['success' => true]);
    }
    public function insert_edu(Request $request)
    {

        $profile   =   Profile::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'edu1' => $request->edu1,
                'edu2' => $request->edu2,
            ]
        );

        return response()->json(['success' => true]);
    }
    public function insert_work(Request $request)
    {

        $profile   =   Profile::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'exp' => $request->work,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function insert_skills(Request $request)
    {

        $profile   =   Profile::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'skills' => $request->skills,
            ]
        );

        return response()->json(['success' => true]);
    }

    public function insert_contact(Request $request)
    {

        $profile   =   Profile::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
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
    //edit===========================================================================
    public function edit(Request $request)
    {

        $where = array('id' => $request->id);
        $profile  = Profile::where($where)->first();

        return response()->json($profile);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    //delete===========================================================================
    public function destroy(Request $request)
    {
        $profile = Profile::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
