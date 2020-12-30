<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\Dtktp;
use App\Models\Users;

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
        
        $data = Dtktp::where('user_id','=',Auth::user()->id)->first();
        $params = [
            'title'=>'Data KTP',
            'data'=>$data,
            
            
        ];
        
        return view('user.data_ktp')->with($params);
    }

    public function adminHome()
    {
        $data = Dtktp::latest()->paginate(5);
        $params = [
            'title'=>'Data KTP',
            'data'=>$data,
            
            
        ];
        return view('admin/Home')->with($params);

       // $users = User::latest()->paginate(5);
        return view('users.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function editData()
    {
        return view('user/edit');
    }
}
