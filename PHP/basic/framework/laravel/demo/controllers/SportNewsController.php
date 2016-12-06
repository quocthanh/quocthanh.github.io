<?php

namespace App\Http\Controllers\SportNews;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\Http\Requests\UserRequest;
use App\Http\Requests\RegisterRequest;
use DB;
use App\User_Infor_Model;

class SportNewsController extends Controller
{
    /**
     * check if user loged in, if not then return message
     * else return page content
     *
     * @return view
     */
    public function show()
    {
        //check if user log in
        if (!Session::has('logUser')) {
            return view('SportNews.notLogIn');
        }

        return view('SportNews/index');
    }
    /**
     * check if user has submit right log in information
     * if true, redirect to main page
     * if not, send back a message
     *
     * use UserRequest class to validate
     */
    public function checkLogIn(UserRequest $request)
    {
        $data = User_Infor_Model::where('name', $request->userName)
                                ->where('password', $request->userPass)
                                ->get();

        if ($data->isEmpty()) {
            return redirect()->back()->with([
                'message' => "This information isn't right.<br>
                              Don't have an account? Please sign up first."
            ]);
        }
        session(['logUser' => $request->userName]);
        return redirect('SportNews');
    }
    /**
     * log out user
     */
    public function logOut()
    {
        Session::forget('logUser');
        return redirect('SportNews');
    }
    /**
     * check registered information use RegisterRequest class
     * if can register, then insert to db
     */
    public function register(RegisterRequest $request)
    {
        $user = new User_Infor_Model;
        $user->name = $request->userName;
        $user->password = $request->userPass;
        $user->email = $request->userEmail;
        $user->save();

        return redirect()->back()->with([
            'message' => 'Sign up successfully! Huray'
        ]);
    }
}
