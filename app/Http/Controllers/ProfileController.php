<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;


class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $r = User::where('username',$id)->firstOrFail();
        $data['list'] = Post::orderBy('id','desc')
                    ->paginate(20);
        $data['user'] = $r;
        $data['title'] = $r->name."'s Profile";

        return view('profile', $data);
    }

    public function profile($id)
    {   
        


    }

}
