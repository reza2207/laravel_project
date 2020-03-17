<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;


class ProductController extends Controller
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

    public function paginate()
    {
        $users = User::orderBy('name', 'ASC')
            ->paginate(request('limit', 20));
        if (request()->all()) {
            $users->appends(request()->all());
        }
        return response()->json($users);
    }
    public function view()
    {
        return view('product');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
        ]);
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt(str_random()),
        ]);
        return response()->json($user);
    }
    public function show($id)
    {
        $user = User::whereId($id)->first();
        if (empty($user)) {
            return response()->json([
                'message' => 'User not found.',
            ], 404);
        }
        return response()->json($user);
    }

}
