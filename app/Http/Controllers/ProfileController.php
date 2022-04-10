<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('manage/index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $profile   =   Profile::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'name_surname' => $request->name_surname,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'about' => $request->about,
                'link' => $request->link,
                'edu1' => $request->edu1,
                'edu2' => $request->edu2,
                'exp' => $request->exp,
                'skills' => $request->skills,
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
        $profile  = Profile::where($where)->first();

        return response()->json($profile);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $profile = Profile::where('id', $request->id)->delete();

        return response()->json(['success' => true]);
    }
}
