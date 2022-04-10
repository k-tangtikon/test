<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use App\Models\Profile;

class MyprofileController extends Controller
{
    public function select()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);
        $data2['posts'] = Post::orderBy('id', 'desc')->paginate(100);
        return view('profile/pub_profile/myprofile', $data, $data2);
    }
    public function select_about()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/pub_profile/about', $data);
    }
    public function select_edu()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/pub_profile/edu', $data);
    }
    public function select_work()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/pub_profile/work', $data);
    }
    public function select_skills()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/pub_profile/skills', $data);
    }

    public function select_contact()
    {
        $data['profiles'] = Profile::orderBy('id', 'desc')->paginate(5);

        return view('profile/pub_profile/contact', $data);
    }

}
