<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search()
    {
        return view('search');
    }

    public function searchFullText(Request $request)
    {
        if ($request->search != '') {
            $data = User::FullTextSearch('na
            me', $request->search);
            dd(@$data);
            foreach ($data as $key => $value) {
                echo $value->name;
                echo '<br>'; // mình viết vầy cho nhanh các bạn tùy chỉnh cho đẹp nhé
            }
        }
    }
}
