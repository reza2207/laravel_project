<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MarketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set("Asia/Bangkok");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['list'] = $this->get_list();
        $data['title'] = 'Market Place';

        return view('sell_list', $data);
    }

    public function profile($id)
    {
        $title = ucwords($id). ' Profile';

        return view('profile', ['title'=>$title]);
    }

    private function get_list()
    {

    }
}
