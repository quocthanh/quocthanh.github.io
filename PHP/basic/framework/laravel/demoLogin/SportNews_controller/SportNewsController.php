<?php

namespace App\Http\Controllers\SportNews;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Session;
use App\Http\Requests\UserRequest;
use DB;

class SportNewsController extends Controller
{
    /**
     * check if user log in, if not then return message
     * else return page content
     */
    public function show(Request $request)
    {
        //check if user log in
        //$request->session()->regenerate();
        //Session::regenerate();

        if (!Session::has('logUser')) {
            return view('SportNews.notLogIn');
        }

        return view('SportNews/index');
    }
    /**
     * check if user has submit right information
     *
     */
    public function checkLogIn(UserRequest $request)
    {
        echo 'This is a handsome man.';

        echo '<br>';
        $userDB = DB::table('user_infor')->get();
        echo '<pre>';
        print_r($userDB);
        echo '</pre>';
        echo '<br>';

        foreach ($userDB as $user) {
            if ($user->name !== $request->userName) {
                continue;
            }
            if ($user->password !== $request->userPass) {
                return redirect()->back()->with([
                    'message' => 'Wrong password'
                ]);
            }
            //Session::regenerate();
            session(['logUser' => $request->userName]);
            return redirect('SportNews');
        }
        return redirect()->back()->with([
            'message' => 'This account doesn\'t exist.<br>
                          Please sign up first.'
        ]);
    }
    /**
     * log out user
     *
     */
    public function logOut()
    {
        //Session::regenerate();
        Session::forget('logUser');
        return redirect('SportNews');
    }
}
























































































